<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add screening</title>
    <link rel="stylesheet" href="style.css">

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

    <?php
    include('server.php');
    ?>

                <?php
                $sqlQuery = '
                SELECT MovieID
                FROM movieinfo;
                ';

                $objQuery = mysqli_query($conn, $sqlQuery) or die("Error Query [" . $sqlQuery . "]");
                 ?>

                <?php
                $sqlQuery2 = '
                SELECT TheatreID
                FROM theatre;
                ';

                $objQuery2 = mysqli_query($conn, $sqlQuery2) or die("Error Query [" . $sqlQuery2 . "]");
                 ?>


	<div class="header">
        <h2>SCREENING</h2>
    </div>

    <form action="insertScreening.php" method="post">
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
        <img src="time.png" width=200>
        </a>
        </p>

			
        <div class="input-group">
            <label for="MovieID">Movie ID</label>
            <select name="MovieID"> 
            <?php
                        while ($objResult = mysqli_fetch_array($objQuery)) {
                        ?>
                        
                        <option value=<?php echo $objResult["MovieID"]; ?>><?php echo $objResult["MovieID"]; ?></option>
        
                            <?php
                        }    
             ?>
            </select>
        </div>

        <div class="input-group">
            <div class="input-group">
            <label for="SubTitle">Language</label>
            <select name="SubTitle">
                <option value="ENG">ENG</option>
                <option value="TH">TH</option>
            </select>
        </div>
        </div>

		<div class="input-group">
            <label for="TheatreID">Theatre ID</label>
             <select name="TheatreID"> 
            <?php
                        while ($objResult2 = mysqli_fetch_array($objQuery2)) {
                        ?>
                        
                        <option value=<?php echo $objResult2["TheatreID"]; ?>><?php echo $objResult2["TheatreID"]; ?></option>
        
                            <?php
                        }    
             ?>
            </select>
        </div>

        <div class="input-group">
            <label for="DateDay">Date of Show</label>
            <input type="date" name = 'DateDay' value=<?php echo date("Y/m/d") ?>>
        </div>

        <div class="input-group">
            <label for="StartTime">show time start at</label>
            <input type="time" name="StartTime">
        </div>

        <div class="input-group">
            <label for="EndTime">until</label>
            <input type="time" name="EndTime">
        </div>
		
		<div class="input-group">
        <p>
        </br>
            <button type="submit" name="screen_add" class="btn"> ADD SCREENING </button>
        </div>
        </br>
        </p>
    </form>

    </br>
    </br>

</body>
</html>