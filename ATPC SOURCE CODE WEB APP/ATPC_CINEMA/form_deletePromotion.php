<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add theater</title>
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
        <h2>DELETE PROMOTION</h2>
    </div>
    
    <form action="deletePromotion.php" method="post" name="AdminPromotionMovie">
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
        <img src="bin.png" width=200>
        </a>
        </p>

        <?php


                $sqlQuery2 = '
                SELECT SpecialDay 
                FROM  Promotionmovie ;
                ';
                $objQuery2 = mysqli_query($conn, $sqlQuery2) or die("Error Query [" . $sqlQuery2 . "]");

                $sqlQuery3 = '
                SELECT SpecialCode 
                FROM  Promotionmovie ;
                ';
                $objQuery3 = mysqli_query($conn, $sqlQuery3) or die("Error Query [" . $sqlQuery3 . "]");
        ?>

            <div class="input-group">
                <input type="radio" name="deletebankpromotion" value="2">
                <label>Special Day : </label>
                <select name="SpecialDay">
                        <?php
                        while ($objResult2 = mysqli_fetch_array($objQuery2)) {
                        ?>
                            <option value=<?php echo $objResult2["SpecialDay"]; ?>><?php echo $objResult2["SpecialDay"]; ?></option>
                        <?php
                        }
                        ?>
                </select><br>
            </div>

            <div class="input-group">
                <input type="radio" name="deletebankpromotion" value="3">
                <label>Special Code : </label>
                <select name="SpecialCode">
                        <?php
                        while ($objResult3 = mysqli_fetch_array($objQuery3)) {
                        ?>
                            <option value=<?php echo $objResult3["SpecialCode"]; ?>><?php echo $objResult3["SpecialCode"]; ?></option>
                        <?php
                        }
                        ?>
                </select><br>
                </div>



        <div class="input-group">
        <p>
            </br>
                <button type="submit" name="delete_pro" class="btn"> DELETE </button>
            </br>
        </p>
    </form>

</body>
</html>
