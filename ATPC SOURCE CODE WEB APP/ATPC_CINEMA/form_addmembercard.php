<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member card</title>
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
	<div class="header">
        <h2>MEMBER CARD</h2>
    </div>

    <form action="insertmembercard.php" method="post">
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
        <img src="card.png" width=200>
        </a>
        </p>

			
        <div class="input-group">
            <label for="MemberName">Name</label>
            <input type="text" name="MemberName">
        </div>

		<div class="input-group">
            <label for="MemberSurname">Surname</label>
            <input type="text" name="MemberSurname">
        </div>

        <div class="input-group">
            <label for="MemberEmail">Email</label>
            <input type="email" name="MemberEmail">
        </div>

        <div class="input-group">
            <label for="DateOfBirth">Date of Birth</label>
            <input type="date" name="DateOfBirth">
        </div>
		
        <div class="input-group">
            <label for="DateOfIssue">Date of Issue</label>
            <input type="text" name = 'DateOfIssue' value=<?php echo date("Y/m/d") ?>>
        </div>

        <div class="input-group">
            <label for="DateOfExpire">Date of Expire</label>
            <?php $oneYearOn = date('Y/m/d',strtotime(date("Y/m/d") . " + 365 day")); ?>
			<input type="Text" name = 'DateOfExpire' value=<?php echo $oneYearOn ?>>
        </div>

        <div class="input-group">
            <label for="MemberLevel">Level</label>
            <select name="MemberLevel">
                <option value="normal">normal</option>
                <option value="pattinum">pattinum</option>
                <option value="premium">premium</option>
            </select>
        </div>

		<div class="input-group">
        <p>
        </br>
            <button type="submit" name="card_user" class="btn"> ADD CARD </button>
        </div>
        </br>
        </p>
    </form>

    </br>
    </br>

</body>
</html>