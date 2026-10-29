<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Homepage</title>
    <link rel="stylesheet" href="css/mainpage.css" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <header>
    	<h1 class="header-title">WELCOME TO THE MUSIC WORLD!</h1>
    	<a href="login.php" class="right-corner-link">Log out</a>
        <nav>
            <form class="search" method="get" action="#">
                <input type="search" name="query" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </nav>

        <div class="container">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "bqy040222";
            $dbname = "musicweb";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            if (isset($_GET['query'])) {
                $search_query = $_GET['query'];
                $sql = "SELECT music_poster, music_name, music_artist, music_id FROM music WHERE 
                        music_name LIKE '%$search_query%' OR 
                        music_artist LIKE '%$search_query%'";
            } else {
                $sql = "SELECT music_poster, music_name, music_artist, music_id FROM music";
            }

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='card'>";
                    echo "<a href='PlayMusic.php?music_id=" . $row['music_id'] . "'>";
                    echo "<img class='music-image' src='" . $row['music_poster'] . "' alt='music_poster'>";
                    echo "<p class='music-title'>" . $row['music_name'] . "</p>";
                    echo "<p class='music-artist'>" . $row['music_artist'] . "</p>";
                    echo "</a>";
                    echo "</div>";
                }
            } else {
                echo "<p class='no-music'>No music found</p>";
            }

            mysqli_close($conn);
            ?>
        </div>
		<footer>
			<p>
				<a>Terms of Service</a><span>|</span>
				<a>Privacy Policy</a><span>|</span>
				<a>Advertising Service</a><span>|</span>
				<a>Customer Service</a>
			</p>
			<p>"Listen to what I want"</p>
		</footer>
    </header>

    <footer class="clearfix">
    </footer>
</body>

</html>
