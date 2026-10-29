<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music Player</title>
    <link rel="stylesheet" href="css/PlayMusicStyle.css">
</head>
<body>
    <div class="music-player">
        <div class="current-track">
        <a href="mainpage.php" class="left-corner-link">Back to Main Page</a>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "bqy040222";
            $dbname = "musicweb";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("connect_error: " . $conn->connect_error);
            }

            $id = $_GET['music_id'];
            $sql = "SELECT music_name, music_poster, music_path FROM music WHERE music_id = $id";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)){
                	$music_name = $row['music_name'];
                	$music_poster = $row['music_poster'];
                	$music_path = $row['music_path'];
                }
            } else {
                echo "connect_error";
            }

            $conn->close();
            ?>
            <p id="currentTrack">Current music：<?php echo $music_name; ?></p>
            <img src="<?php echo $music_poster; ?>" alt="music_poster">
        </div>
        <audio controls>
            <source src="<?php echo $music_path; ?>" type="audio/mp3">
            Your browser does not support the audio element.
        </audio>
    </div>

    <script src="js/music-player.js"></script>
</body>
</html>
