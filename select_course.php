<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$query = "SELECT * FROM courses";
$courses = $conn->query($query);
?>

<h2>Select a Course</h2>
<div class="course-grid">
    <?php while($course = $courses->fetch_assoc()): ?>
        <div class="course-item">
            <h3><?= $course['course_name']; ?></h3>
            <p>Duration: <?= $course['duration']; ?></p>
            <p>Price: $<?= $course['price']; ?></p>
            <form action="select_course_action.php" method="POST">
                <input type="hidden" name="course_id" value="<?= $course['course_id']; ?>">
                <button type="submit">Select Course</button>
            </form>
        </div>
    <?php endwhile; ?>
</div>

<?php
$conn->close();
?>
