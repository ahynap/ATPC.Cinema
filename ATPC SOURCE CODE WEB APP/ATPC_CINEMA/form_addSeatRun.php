<?php 
    session_start();
    include('server.php'); 
?>
<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>SEAT RUN</title>
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
        <h2>SEAT RUN</h2>
    </div>
    <form action="insertSeatRun.php" method="post" name="AdminSeatRun">
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
            <img src="seat.png" width=200>
        </a>
        </p>    


        <div class="input-group">
            <label for="SeatNo">SEAT NO :</label>
                </div>    
                    <?php
                        $sqlQuery = 'SELECT SeatNo FROM Seat;';
                        $objQuery = mysqli_query($conn, $sqlQuery) or die("Error Query [" . $sqlQuery . "]");
                        while ($objResult = mysqli_fetch_array($objQuery)) 
                        {?>&nbsp;&nbsp;
                            <input type="checkbox" id="checkme" 
                            style="width: 20px; height: 20px; margin-right: 10px; margin-left: 4px;"
                            name="SeatNo[]" value=<?php echo $objResult["SeatNo"]; ?>><?php echo $objResult["SeatNo"]; ?><br><?php
                        }
                    ?>
                <div> 
        </div> 


        <div class="input-group">
            <label for="ScreeningID">Screening ID :</label>
            <select id="ScreeningID" name="ScreeningID">
                </div>   
                    <?php
                        $sqlQuery2 = 'SELECT ScreeningID FROM  screening ;';
                        $objQuery2 = mysqli_query($conn, $sqlQuery2) or die("Error Query [" . $sqlQuery2 . "]");
                        while ($objResult2 = mysqli_fetch_array($objQuery2)) 
                        {?>
                            <option value=<?php echo $objResult2["ScreeningID"]; ?>><?php echo $objResult2["ScreeningID"]; ?></option><?php
                        }
                    ?>
                <div> 
            </select>
        </div> 
              
        <div class="input-group">
        <p>
            </br>
                <button type="submit" name="seat_run" class="btn"> SUBMIT </button>
            </br>
        </p>
        </div>
    </form>
    
    </br>
    </br>


    

</body>
</html>