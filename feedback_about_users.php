<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'trainer') {
    header("Location: login.php");
    exit;
}

$users = $conn->query("SELECT * FROM users WHERE role = 'user'");
?>

<h2>Feedback about Users</h2>
<form action="feedback_action.php" method="POST">
    <label for="user">Choose User:</label>
    <select name="user_id" required>
        <?php while($user = $users->fetch_assoc()): ?>
            <option value="<?= $user['user_id']; ?>"><?= $user['full_name']; ?></option>
        <?php endwhile; ?>
    </select>

    <label for="feedback">Feedback:</label>
    <textarea name="feedback_text" required></textarea>

    <button type="submit">Submit Feedback</button>
</form>

<?php $conn->close(); ?>
