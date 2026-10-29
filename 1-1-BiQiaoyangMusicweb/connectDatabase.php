<?php
$servername = "localhost";
$username = "root";
$password = "bqy040222";
$dbname = "musicweb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $telephone = mysqli_real_escape_string($conn, $telephone);
    $email = mysqli_real_escape_string($conn, $email);

    $check_username_sql = "SELECT * FROM user WHERE name = '$name'";
    $result = $conn->query($check_username_sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Username already exists. Please choose a different username.');";
        echo "window.location.href='signup.php';";
        echo "</script>";
        exit();
    }

    $sql = "INSERT INTO user (username, password, email, telephone) VALUES ('$username', '$password','$email', '$telephone')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "user already exists";

        echo "<script>alert('" . $successMessage . "');";
        echo "window.location.href='login.php';";
        echo "</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

?>