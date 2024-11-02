<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'trainer') {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $trainer_id = $_SESSION['user_id'];
    $user_id = $_POST['user_id'];
    $feedback_text = $_POST['feedback_text'];

    $stmt = $conn->prepare("INSERT INTO feedback (user_id, trainer_id, feedback_text) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $user_id, $trainer_id, $feedback_text);

    if ($stmt->execute()) {
        echo "Feedback submitted!";
    } else {
        echo "Error submitting feedback: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
