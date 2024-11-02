<!-- login.php -->
<?php include 'header.php'; ?>
<form action="login_action.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    
    <button type="submit">Login</button>
</form>
<?php include 'footer.php'; ?>
