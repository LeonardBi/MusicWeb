<?php
$servername = "localhost"; 
$username = "root"; 
$password = "bqy040222";
$dbname = "musicweb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_name = $_POST['admin_name'];
    $admin_password = $_POST['admin_password'];
    $sql = "SELECT * FROM admin WHERE admin_name = '$admin_name' AND admin_password = '$admin_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    	$successMessage = "Admin login successfully";
        echo "<script>alert('" . $successMessage . "');";
        echo "window.location.href='adminMainPage.php';";
        echo "</script>";
    } else {
        echo "admin_name or admin_password incorrect";
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
            flex-direction: column; /* 将容器设置为垂直方向的 Flex 容器 */
            align-items: center;
            height: 100vh;
        }

        form {
            width: 40%;
        }

        /* 样式管理员登录按钮 */
        .admin-link {
            display: inline-block; /* 或者使用 display: inline; */
            text-align: center;
            margin-top: 20px; /* 距离上方间距 */
        }

        /* 鼠标悬停时改变按钮颜色 */
        .admin-link:hover {
            color: #ff0000; /* 改变文字颜色 */
        }
    </style>
</head>
<body>
<header>
        <h1>Welcome! Administrator</h1>
    </header>
    <div class="container">
        <form action="adminMainPage.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="admin_name">Admin Name:</label>
                <input type="text" name="admin_name" placeholder="Enter admin name" required>
            </div>
            <div>
                <label for="admin_password">Admin Password:</label>
                <input type="admin_password" name="admin_password" placeholder="Enter admin password" required>
            </div>
            <div>
                <input type="submit" value="Enter">
            </div>
            <div>
            	<a href="login.php" class="admin-link">Back to Login</a>
            </div>
        </form>
    </div>
</body>
</html>
