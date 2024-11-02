<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $trainer_id = $_POST['trainer_id'];
    $rating = $_POST['rating'];

    // Insert rating into ratings table
    $stmt = $conn->prepare("INSERT INTO ratings (user_id, trainer_id, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $user_id, $trainer_id, $rating);

    if ($stmt->execute()) {
        echo "Rating submitted!";
    } else {
        echo "Error submitting rating: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
