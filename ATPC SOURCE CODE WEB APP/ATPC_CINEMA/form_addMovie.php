<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add movie</title>
    <link rel="stylesheet" href="style_admin_form.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

    <style>
    body { font-family: 'Varela Round'; }
    </style>

    <style>
    p {text-align: center;}
    </style>

    <style>
    img:hover {
    -webkit-transform: scaleX(-1);
    transform: scaleX(-1);
    transition: all .5s;
    }

    .input-group select {
    height: 40px;
    width: 97.5%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;
    }
    </style>
</head>

<body>
    <div class="header">
        <h2>ADD MOVIE</h2>
    </div>

    <form action="insertMovie.php" method="post" enctype="multipart/form-data">
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="error">
                <h3>
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <p>
        <a href="adminFunction.php">
        <img src="movie.png" width=200>
        </a>
        </p>

        
        <div class="input-group">
            <label for="MovieTitle">Title</label>
            <input type="text" name="MovieTitle">
        </div>

        <div class="input-group">
            <label for="Genre">Genre</label>
            <input type="text" name="Genre">
        </div>

        <div class="input-group">
            <label for="Rate">Rate</label>
            <select id="Rate" name="Rate">
                <option value="normal">normal</option>
                <option value="above 13">13+</option>
                <option value="above 16">16+</option>
                <option value="above 18">18+</option>
                <option value="above 20">20+</option>
            </select>
        </div>

        <div class="input-group">
            <label for="Detail">Detail</label>
            <input type="text" name="Detail">
        </div>

        <div class="input-group">
            <label for="Cast">Cast</label>
            <input type="text" name="Cast">
        </div>

        <div class="input-group">
            <label for="MovieLong">Movie lenght</label>
            <input type="time" name="MovieLong">
        </div>

        <div class="input-group">
            <label for="MovieIn">Movie releases date</label>
            <input type="date" name="MovieIn">
        </div>

        <div class="input-group">
            <label for="MovieOut">Movie out date</label>
			<input type="date" name = 'MovieOut' >
        </div>

        <div class="input-group">
            <label for="Picture">Picture of movie : </label>
            <input type="text" name= 'Picture'>
        </div>

        <div class="input-group">
        <p>
            </br>
                <button type="submit" name="add_movie" class="btn"> ADD </button>
            </br>
        </p>
    </form>

</body>
</html>
