<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add promotion</title>
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
            <h2>ADD PROMOTION</h2>
    </div>

    <form action="insertPromotion.php" method="post" name="AdminPromotionMovie">
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
        <img src="promotion.png" width=300>
        </a>
        </p>

        <div class="input-group">
            <input type="radio" name="insertpromotion" value="2">
            <label>Special Day : </label>
            <input type="text" name="SpecialDay">
        </div>

        <div class="input-group">
            <input type="radio" name="insertpromotion" value="3">
            <label>Special Code : </label>
            <input type="text" name="SpecialCode">
        </div>
     

        <div class="input-group">
        <p>
            </br>
                <button type="submit" name="add_promotion" class="btn"> ADD </button>
            </br>
        </p>
    </form>

</body>
</html>
