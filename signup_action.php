<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  // Hash the password

    $stmt = $conn->prepare("INSERT INTO users (full_name, username, email, password, role) VALUES (?, ?, ?, ?, 'user')");
    $stmt->bind_param("ssss", $full_name, $username, $email, $password);

    if ($stmt->execute()) {
        echo "Sign-up successful! <a href='login.php'>Login</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
