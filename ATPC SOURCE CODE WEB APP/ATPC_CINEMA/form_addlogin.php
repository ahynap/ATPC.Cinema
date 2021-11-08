<?php
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <style>
    body { font-family: 'Varela Round'; }
    </style>

    <style>
    p {
         font-family: 'Varela Round'; 
            text-align: center;}
    </style>
</head>

<body>

    <div class="header">
        <h2>LOG IN</h2>
    </div>

    <form action="login_db.php" method="post">
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
        <a href="index.php">
            <img src="smallPNGlogo.png" width=200>
        </a>
        </p>

        <div class="input-group">
            <label for="RegisterEmail">Email</label>
            <input type="text" name="RegisterEmail">
        </div>

        <div class="input-group">
            <label for="Password">Password</label>
            <input type="password" name="Password">
        </div>

        <div class="input-group">
            <p>
            </br>
                <button type="submit" name="login_user" class="btn" > login </button>
            </br>
            </p>
        </div>
        <p>Not yet a member? <a href="form_addRegister.php">Register</a></p>
    </form>

</body>
</html>











