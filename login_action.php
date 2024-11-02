<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user from database
    $stmt = $conn->prepare("SELECT user_id, password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];
            
            // Redirect based on role
            switch ($user['role']) {
                case 'admin':
                    header("Location: manage_users.php");
                    break;
                case 'user':
                    header("Location: select_course.php");
                    break;
                case 'trainer':
                    header("Location: feedback_about_users.php");
                    break;
            }
            exit;
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Invalid username!";
    }
    $stmt->close();
}
$conn->close();
?>
