<!-- signup.php -->
<?php include 'header.php'; ?>
<form action="signup_action.php" method="POST">
    <label for="full_name">Full Name:</label>
    <input type="text" name="full_name" required>
    
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    
    <button type="submit">Sign Up</button>
</form>
<?php include 'footer.php'; ?>
