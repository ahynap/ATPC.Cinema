<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
    <html lang=en>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BOOKING - walkin</title>
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


        <style>
            label{
                display: inline-block;
                width: 100px;
                margin-bottom: 10px;
            }
        </style>
    </head>

    <body>
        <div class="header">
            <h2>BOOKING</h2>
        </div>

        <form action="insertbooking.php" method="post" name="AdminBooking">
                    <?php

                    $sqlQuery = '
                    SELECT BookingClientID
                    FROM BookingClient ;
                    ';
                    $objQuery = mysqli_query($conn, $sqlQuery) or die("Error Query [" . $sqlQuery . "]");

                    $sqlQuery2 = '
                    SELECT ScreeningID 
                    FROM  screening ;
                    ';
                    $objQuery2 = mysqli_query($conn, $sqlQuery2) or die("Error Query [" . $sqlQuery2 . "]");

                    $sqlQuery3 = '
                    SELECT RegisterID
                    FROM register;
                    ';
                    $objQuery3 = mysqli_query($conn, $sqlQuery3) or die("Error Query [" . $sqlQuery3 . "]");

                    $sqlQuery4 = '
                    SELECT PromotionMovieID
                    FROM promotionmovie;
                    ';
                    $objQuery4 = mysqli_query($conn, $sqlQuery4) or die("Error Query [" . $sqlQuery4 . "]");

                    ?>
                    

                    <p>
                    <a href="adminFunction.php">
                    <img src="bookadmin.png" width=300>
                    </a>
                    </p>

                    <div class="input-group">
                        <label>BookingClientID</label>
                        <select name="BookingClientID">
                                <?php
                                while ($objResult = mysqli_fetch_array($objQuery)) {
                                ?>
                                    <option value=<?php echo $objResult["BookingClientID"]; ?>><?php echo $objResult["BookingClientID"]; ?></option>
                                <?php
                                }
                                ?>
                            </select><br>

                    <label>ScreeningID </label>
                    <select name="ScreeningID"> 
                    <?php
                            while ($objResult2 = mysqli_fetch_array($objQuery2)) {
                            ?>
                                <option value=<?php echo $objResult2["ScreeningID"]; ?>><?php echo $objResult2["ScreeningID"]; ?></option>
                            <?php
                            }
                            ?>
                        </select><br>
                    <label>RegisterID</label>
                    <select name="RegisterID"> 
                    <?php
                            while ($objResult3 = mysqli_fetch_array($objQuery3)) {
                            ?>
                                <option value=<?php echo $objResult3["RegisterID"]; ?>><?php echo $objResult3["RegisterID"]; ?></option>
                            <?php
                            }
                            ?>
                </select><br>

                    <label>PromotionMovieID</label>
                    <select name="PromotionMovieID"> 
                    <?php
                            while ($objResult4 = mysqli_fetch_array($objQuery4)) {
                            ?>
                                <option value=<?php echo $objResult4["PromotionMovieID"]; ?>><?php echo $objResult4["PromotionMovieID"]; ?></option>
                            <?php
                            }
                            ?>
                </select><br>
                    
                
                <label>ReserveStatus</label>
                    <input type="text" name="ReserveStatus">
            </div>


            <div class="input-group">
            <p>
            </br>
                <button type="submit" name="add_promotion" class="btn"> BOOKING </button>
            </br>
            </p>

        </form>
        
    </body>

</html>