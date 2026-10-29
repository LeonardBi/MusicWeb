<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/signupstyle.css" type="text/css"> 
<head>
    <meta charset="UTF-8">
    <title>Sign Up For Us!</title>
    <link rel="stylesheet" href="css/style.css" type="text/css"> 
</head>
<body>
    <div class="container">
        <form action="connectDatabase.php" method="post">
            <h2>Sign Up For Us!</h2>
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="Enter a username" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="Enter your email" required>
            </div>
            <div>
                <label for="telephone">Telephone:</label>
                <input type="tel" name="telephone" placeholder="Enter your telephone" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Enter a password" required>
            </div>
            <div>
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" placeholder="Confirm your password" required>
            </div>
            <div>
                <input type="submit" value="Sign Up">
            </div>
            <div>
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </div>
        </form>
    </div>
</body>
</html>