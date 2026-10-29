<?php
$servername = "localhost"; 
$username = "root"; 
$password = "bqy040222";
$dbname = "teams";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("connect_error: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE name = '$name' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "login sucessfully";
    } else {
        echo "username or password incorrect";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="css/loginstyle.css" type="text/css"> 
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        header {
            background-color: white;
            color: #F5C6CB; 
            text-align: center; 
            padding: 20px; 
            font-weight: bold;
            text-shadow: 2px 2px 2px #000;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        form {
            width: 40%;
        }

        .admin-link {
            display: inline-block; 
            text-align: center;
            margin-top: 20px; 
        }

        .admin-link:hover {
            color: #ff0000; 
        }
    </style>
</head>
<body>
<header>
        <h1>Welcome to Elementary School Calculation Test System</h1>
    </header>
    <div class="container">
        <form action="user_mainpage.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="username">Username:</label>
                <input type="text" name="name" placeholder="Enter a username" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="Enter a password" required>
            </div>
            <div>
                <input type="submit" value="Enter">
            </div>
            <div>
            	<p>Don't have an account yet?<a href="user_signup.php">Click Here</a></p> 
            	<a href="admin_login.php" class="admin-link">Admin Login</a>
            </div>
        </form>
    </div>
</body>
</html>
