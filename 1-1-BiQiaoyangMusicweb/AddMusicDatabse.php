<?php
$servername = "localhost";
$username = "root";
$password = "bqy040222";
$dbname = "musicweb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])){
  
  $music_name = $_POST['music_name'];
  $music_artist = $_POST['music_artist'];

  $music_path = $_FILES['music_path']['name'];
  $music_path_tmp = $_FILES['music_path']['tmp_name'];

  $music_poster = $_FILES['music_poster']['name'];
  $music_poster_tmp = $_FILES['music_poster']['tmp_name'];
    
  $upload_music = "web_music/";
	$final_music = $upload_music . $music_path;
	
  $upload_directory = "web_img/";  
	$final_poster = $upload_directory . $music_poster;
	
	move_uploaded_file($music_path_tmp, $final_music);	
	move_uploaded_file($music_poster_tmp, $final_poster);

    $sql = "INSERT INTO music (music_name, music_artist, music_path, music_poster)
            VALUES ('$music_name', '$music_artist', '$final_music', '$final_poster')";

    if (mysqli_query($conn, $sql)) {
        $successMessage = "Music added successfully";
        echo "<script>alert('" . $successMessage . "');";
        echo "window.location.href='adminMainPage.php';";
        echo "</script>";
    } else {
        echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>

