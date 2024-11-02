<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $course_id = $_POST['course_id'];

    $stmt = $conn->prepare("INSERT INTO user_courses (user_id, course_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $user_id, $course_id);

    if ($stmt->execute()) {
        echo "Course selected successfully!";
    } else {
        echo "Error selecting course: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
