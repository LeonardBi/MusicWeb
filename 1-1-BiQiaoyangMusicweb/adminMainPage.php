<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Interface</title>
    <link rel="stylesheet" href="css/adminMainStyle.css" type="text/css">
</head>
<body>
    <header>
        <h1>Add Music Page</h1>
    </header>
    <div class="container">
        <form action="AddMusicDatabse.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <label for="text">Song Name:</label>
                <input type="text" name="music_name" placeholder="Enter song name" required>
            </div>
            <div class="form-row">
                <label for="name">Artist Name:</label>
                <input type="text" name="music_artist" placeholder="Enter artist name" required>
            </div>
            <div class="form-row">
                <label for="music_path">Music File:</label>
                <input type="file" name="music_path" id="music_path">
            </div>
            <div class="form-row">
                <label for="music_poster">Image File:</label>
                <input type="file" name="music_poster" id="music_poster">
            </div>
            <div class="form-row">
                <input type="submit" name= "submit" value="Add Song">
            </div>
            <div>
                <p> <a href="login.php">Back to login page</a></p>
            </div>
        </form>
    </div>
</body>
</html>
