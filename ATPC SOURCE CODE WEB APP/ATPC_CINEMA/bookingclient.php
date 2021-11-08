<!DOCTYPE html>
<html lang="en">
    <head>
        <title>BOOKING</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="booking_style.css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        
        <script src="jquery.js"></script> 
        <script> 
            $(function(){
                $("#includedContent").load("bookingclientseat.php");
            });
        </script> 

        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.83.1">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kanit" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,300&display=swap" rel="stylesheet">
        
        <style>
            body{
                background: #02111d;
            }

            .display-4{
                color: #ffffff;
                font-size: 40px;
                font-family: 'Kanit'; 
            }

            .input-group select {
            height: 40px;
            width: 30%;
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid gray;
            }

            /*--------MANU--------*/

            .btnmanu {
                padding: 10px;
                font-size: 20px;
                width: 150px;
                color: white;
                font-family: 'Varela Round';
                background: #f50057 ;
                border: none;
                border-radius: 60px;
                
                opacity:1.0; 
                filter:alpha(opacity=100);
            }
            .btnmanu::before,
            .btnmanu::after {
                position: absolute;
                display: block;
                content: '';
                transition: all .5s;
            }

            .btnmanu:hover {
                background-color: #d0cde1;
                color: #000;
            }

            

.btn {
    padding: 10px;
    font-size: 20px;
    width: 200px;
    color: white;
    text-align: center;
    font-family: 'Varela Round';
    background: #f50057;
    border: none;
    border-radius: 60px;

    opacity:1.0; 
    filter:alpha(opacity=100);
}
.btn::before,
.btn::after {
    position: absolute;
    display: block;
    text-align: center;
    content: '';
    transition: all .5s;
}

.btn:hover {
    background-color: #d0cde1;
    color: #000;
}

.input-group input{
    width: 20px;
    height: 30px;
    margin-left: 10px;
    margin-right: 5px;
}

.input-group2 input{
    width: 20px;
    height: 20px;
    margin-left: 5px;
}



}

        </style>

    </head>
        
    <body>

        <div class="container py-3">

        <header>
            <div class="logo pb-4 mb-4 border-bottom">
              <div class="loginOut pb-2 mb-2">
                <button type="submit" class="btnontop" 
                  onclick= "document.location = 'index.php' "> log out </button>
              </div>

              <img src="logow.png" width=200>
            </div>

            <div class="logo pb-4">
                <div class="manu pb-2">
                        <button type="submit" class="btnmanu mt-2" 
                        onclick= "document.location = 'movie_login.php' "> MOVIE </button> &nbsp;
                        <button type="submit" class="btnmanu mt-2" 
                        onclick= "document.location = 'Show_ฺbranch.php' "> BRANCH </button> &nbsp;
                        <button type="submit" class="btnmanu mt-2" 
                        onclick= "document.location = 'Show_theatre.php' "> THEATRE </button> &nbsp;

                        <button type="submit" class="btnmanu mt-2" 
                        onclick= "document.location = 'home.php' "> SCREENING </button> &nbsp;
                </div>
            </div>
        </header>


        <div class="header2 pb-2 mt-1">
            <h2 style="font-size: 40px;">BOOKING</h2>
        </div>

        <form action="insertbookingclient.php" method="post" name="BookingClient">
            <?php
                $servername = 'localhost';
                $username = 'root';
                $password = '';
                $databasename = 'atpc';

                $connection = mysqli_connect($servername, $username, $password, $databasename);
                mysqli_query($connection, 'SET CHARACTER SET UTF8');
            ?>

            <?php
                $ScreeningID3  = $_REQUEST['ScreeningID'];
                $sqlQuery = "SELECT MovieTitle FROM movieinfo WHERE MovieID 
                            IN (SELECT MovieID FROM screening WHERE ScreeningID = '$ScreeningID3');";
                $objQuery = mysqli_query($connection, $sqlQuery) or die("Error Query [" . $sqlQuery . "]");
            ?>

            <?php
                $ScreeningID4  = $_REQUEST['ScreeningID'];
                $sqlQuery2 = "SELECT BranchName FROM branch WHERE BranchID 
                            IN (SELECT BranchID FROM theatre WHERE TheatreID 
                            IN (SELECT TheatreID FROM screening WHERE ScreeningID = '$ScreeningID4'));";
                $objQuery2 = mysqli_query($connection, $sqlQuery2) or die("Error Query [" . $sqlQuery2 . "]");
            ?>

            <?php
                $ScreeningID5  = $_REQUEST['ScreeningID'];
                $sqlQuery6 = "SELECT StartTime FROM Screening WHERE ScreeningID = '$ScreeningID5';";
                $objQuery6 = mysqli_query($connection, $sqlQuery6) or die("Error Query [" . $sqlQuery6 . "]");
            ?>
                
            <?php
                $sqlQuery7 = 'SELECT DISTINCT DateDay FROM screening;';
                $objQuery7 = mysqli_query($connection, $sqlQuery7) or die("Error Query [" . $sqlQuery7 . "]");
            ?>

            <?php
                $ScreeningID  = $_REQUEST['ScreeningID'];
                $sqlQuery12 = "SELECT SeatNo FROM seatrun WHERE ScreeningID = '$ScreeningID';";
                $objQuery12 = mysqli_query($connection, $sqlQuery12) or die("Error Query [" . $sqlQuery12 . "]");
            ?>

            <?php
                $ScreeningID2  = $_REQUEST['ScreeningID'];
                $sqlQuery13 = "SELECT ScreeningID FROM screening WHERE ScreeningID = '$ScreeningID2';";
                $objQuery13 = mysqli_query($connection, $sqlQuery13) or die("Error Query [" . $sqlQuery13 . "]");
            ?>

            <div class="input-group">
                <label>SCREENING ID : </label>
                <?php
                    while ($objResult13 = mysqli_fetch_array($objQuery13)) {
                    ?>
                    <input id="tick" type="radio" name="ScreeningID" value=<?php echo $objResult13["ScreeningID"]; ?>><?php echo $objResult13["ScreeningID"]; ?>
                    <?php
                    }    
                    ?>
            </div>

            <div class="input-group" >
                <label>BRANCH NAME : </label>
                    <?php
                    while ($objResult2 = mysqli_fetch_array($objQuery2)) {
                    ?>
                    <input type="radio" name="BranchName" value=<?php echo $objResult2["BranchName"]; ?>><?php echo $objResult2["BranchName"]; ?>
                    <?php
                    }
                    ?>
            </div>

            <div class="input-group" >
                <label>MOVIE TITLE : </label>
                    <?php
                    while ($objResult = mysqli_fetch_array($objQuery)) {
                    ?>
                    <input type="radio" name="MovieTitle" value=<?php echo $objResult["MovieTitle"]; ?>><?php echo $objResult["MovieTitle"]; ?>
                    <?php
                    }    
                    ?>
            </div>

            <div class="input-group">
                <label>TIME : </label>
                    <?php
                    while ($objResult6 = mysqli_fetch_array($objQuery6)) {
                    ?>
                    <input type="radio" id="radiotime" name="TimeHour" value=<?php echo $objResult6["StartTime"]; ?>><?php echo $objResult6["StartTime"]; ?>
                    <?php
                    }    
                    ?>
            </div>

            <div class="input-group">
                <label>DATE : </label>
                    <?php
                    while ($objResult7 = mysqli_fetch_array($objQuery7)) {
                    ?>
                    <input type="radio" id="checkme" name="DateDay" value=<?php echo $objResult7["DateDay"]; ?>><?php echo $objResult7["DateDay"]; ?>
                    &nbsp;
                    <?php
                    }     
                    ?>       
            </div>
   
            <div class="input-group">
                <label>SYSTEM AND SEAT : &nbsp;</label>
                <select name="Price">
                    <option value="200">2D DELUXE</option>
                    <option value="240">3D DELUXE</option>
                    <option value="280">4D DELUXE</option>
                    <option value="300">2D PREMIUM</option>
                    <option value="340">3D PREMIUM</option>
                    <option value="380">4D PREMIUM</option>
                    <option value="400">2D SOFA SWEET</option>
                    <option value="440">3D SOFA SWEET</option>
                    <option value="480">4D SOFA SWEET</option>
                </select>
            </div>

            <div class="input-group">
                <label>SEAT NO : </label>
                    <?php
                    
                    while ($objResult12 = mysqli_fetch_array($objQuery12)) {
                    ?>
                    <input type="checkbox" id="checkme" name="SeatNo[]" value=<?php echo $objResult12["SeatNo"]; ?>><?php echo $objResult12["SeatNo"]; ?>
                    <?php
                    }
                    ?>
            </div>

            <br><br>
            <div class=" text-center">
              <h1 style="color:#02111d; font-size: 40px; font-family: 'Kanit';"> 
                - - - -<i><b>&nbsp;PAYMENT&nbsp;</b></i>- - - -</h1>
              <h1 style="color:#02111d; font-size: 25px; font-family: 'Kanit';"> 
              เลือกช่องทางการชำระเงิน</h1>
            </div>
            
            <div class="input-group2">
                <input type="radio" name="PaymentMethod" id="CreditCard" value="Credit Card">
                    <label>Credit Card Number : </label>
                    <input type="text" name="CreditCardNo" id="key" disabled
                    style="height: 30px;
                            width: 30%;
                            padding: 5px 10px;
                            font-size: 16px;
                            border-radius: 5px;
                            border: 1px solid gray;">
                        <script> 
                                var radioed = document.getElementById('CreditCard');
                                var key = document.getElementById('key');
                                radioed.onchange = function(){
                                if(this.checked){
                                    key.disabled = false;
                                } else {
                                    key.disabled = true;
                                }
                                }
                        </script>

                <br>
                <td><input type="radio" name="PaymentMethod" id="wallet" value="Wallet">
                    <label>Wallet Number : </label>
                        <input type="text" name="CreditCardNo" id="key10" disabled
                        style="height: 30px;
                            width: 30%;
                            padding: 5px 10px;
                            font-size: 16px;
                            border-radius: 5px;
                            border: 1px solid gray;">
                        <script> 
                                var radioed2 = document.getElementById('wallet');
                                var key10 = document.getElementById('key10');
                                radioed2.onchange = function(){
                                if(this.checked){
                                    key10.disabled = false;
                                } else {
                                    key10.disabled = true;
                                }
                                }
                        </script>

                        <br>
                       <td><input type="radio" name="PaymentMethod" id="Cash" value="Cash">
                    <label>Cast (input '0') : </label>
                        <input type="text" name="CreditCardNo" id="key20" disabled
                        style="height: 30px;
                            width: 30%;
                            padding: 5px 10px;
                            font-size: 16px;
                            border-radius: 5px;
                            border: 1px solid gray;">
                        <script> 
                                var radioed3 = document.getElementById('Cash');
                                var key20 = document.getElementById('key20');
                                radioed3.onchange = function(){
                                if(this.checked){
                                    key20.disabled = false;
                                } else {
                                    key20.disabled = true;
                                }
                                }
                        </script>
            </div>
            
            <br>
            
            <!--Promotion and Discount-->
            <div class=" text-center">
              <h1 style="color:#02111d; font-size: 25px; font-family: 'Kanit';"> 
              ส่วนลดและโปรโมชั่น</h1>
            </div>

            <div class="input-group2">
                <input type="radio" name="DiscountMovie" id="SCB" value="4">
                <label>SCB bank</label>
            </div>
       
            <div class="input-group2">
                <input type="radio" name="DiscountMovie" id="KrungThai" value="6">
                <label>KrungThai bank</label>
            </div>
            
            <div class="input-group2">
                <input type="radio" name="DiscountMovie" value="0">
                <label>none / don't use promotion</label>
            </div>

            <br>

            <div class=" text-center">
                <h1 style="color:#02111d; font-size: 25px; font-family: 'Kanit';"> 
                ใช้โค้ดส่วนลดเพิ่มเติม</h1>
            </div>

            <div class="input-group2">
                <input type="radio" name="Code" id="SCode2" value="2">
                    <label>Special Code : </label>
                    <input class="blank" type="text" name="DiscountMovie" id="key2" disabled
                    style="height: 30px;
                            width: 30%;
                            padding: 5px 10px;
                            font-size: 16px;
                            border-radius: 5px;
                            border: 1px solid gray;">
                <br>

                <input type="radio" name="Code" id="SCodeDay" value="8">
                    <label>Special Day : </label>
                    <input class="blank" type="text" name="DiscountMovie" id="key3" disabled
                        style="height: 30px;
                            width: 30%;
                            padding: 5px 10px;
                            font-size: 16px;
                            border-radius: 5px;
                            border: 1px solid gray;">
            </div>


        <!--JavaScript of Movie Promotion-->
        <script> 
            var radioed2 = document.getElementById('SCode2');
            var key2 = document.getElementById('key2');
                radioed2.onchange = function(){
                if(this.checked){
                    key2.disabled = false;
                } else {
                    key2.disabled = true;
                }
                }
        </script>

        <script> 
            var radioed3 = document.getElementById('SCodeDay');
            var key3 = document.getElementById('key3');
                radioed3.onchange = function(){
                if(this.checked){
                    key3.disabled = false;
                } else {
                    key3.disabled = true;
                }
                }
        </script>
    
        <div class=" text-center">
            <h1 style="color:#02111d; font-size: 40px; font-family: 'Kanit';"> 
                - - - - - - - - - - - - -</h1>
        </div>


        <div class="input-group2">
            <button type="submit" name="reg_user" class="btn text-center"> BOOKING </button>
        </div>
            
        <?php
        mysqli_close($connection);
        ?>

    </body>

    </html>
