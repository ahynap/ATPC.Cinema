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
        <h2>ADD THEATER</h2>
    </div>

    <form action="insertTheater.php" method="post">
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

         <?php
        $sqlQuery = '
                SELECT BranchID 
                FROM  Branch ;
                ';
                $objQuery = mysqli_query($conn, $sqlQuery) or die("Error Query [" . $sqlQuery . "]");
        ?>



        <p>
        <a href="adminFunction.php">
        <img src="room.png" width=200>
        </a>
        </p>

        <div class="input-group">
            <label for="TheatreName">Theatre Name</label>
            <input type="text" name="TheatreName">
        </div>

        <div class="input-group">
            <label for="SeatInEachTheatre">Seat Quantity in this theatre</label>
            <input type="text" name="SeatInEachTheatre">
        </div>

        <div class="input-group">
            <label for="SystemType">System</label>
            <select name="SystemType">
                <option value="2D">2D</option>
                <option value="2D">3D</option>
                <option value="2D">4D</option>
            </select>
        </div>


                
        <div class="input-group">
            <label for="BranchID">Branch ID</label>
            <select name="BranchID"> 
                <?php
                        while ($objResult = mysqli_fetch_array($objQuery)) {
                        ?>
                            <option value=<?php echo $objResult["BranchID"]; ?>><?php echo $objResult["BranchID"]; ?></option>
                        <?php
                        }
                ?>
            </select>
        </div>

        <div class="input-group">
        <p>
            </br>
                <button type="submit" name="add_theatre" class="btn"> ADD </button>
            </br>
        </p>
    </form>

</body>
</html>
