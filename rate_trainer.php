<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$trainers = $conn->query("SELECT * FROM trainers");
?>

<h2>Rate a Trainer</h2>
<form action="rate_trainer_action.php" method="POST">
    <label for="trainer">Choose Trainer:</label>
    <select name="trainer_id" required>
        <?php while($trainer = $trainers->fetch_assoc()): ?>
            <option value="<?= $trainer['trainer_id']; ?>"><?= $trainer['trainer_name']; ?></option>
        <?php endwhile; ?>
    </select>

    <label for="rating">Rating (1-5):</label>
    <input type="number" name="rating" min="1" max="5" required>

    <button type="submit">Submit Rating</button>
</form>

<?php $conn->close(); ?>
