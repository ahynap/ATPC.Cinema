<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add branch</title>
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
        <h2>ADD BRANCH</h2>
    </div>

    <form action="insertBranch.php" method="post">
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
        <img src="map.png" width=200>
        </a>
        </p>

        <div class="input-group">
            <label for="BranchName">Branch Name</label>
            <input type="text" name="BranchName">
        </div>

        <div class="input-group">
            <label for="Region">Region</label>
            <select name="Region">
                <option value="central">central</option>
                <option value="north">north</option>
                <option value="south">south</option>
                <option value="east">east and north east</option>
            </select>
        </div>
        </div>

        <div class="input-group">
            <label for="ManagerOfBranch">Manager</label>
            <input type="text" name="ManagerOfBranch">
        </div>

        <div class="input-group">
            <label for="Location">Location</label>
            <input type="text" name="Location">
        </div>

        <div class="input-group">
            <label for="TheatreInEachBranch">Theater Quantity in this branch</label>
            <input type="text" name="TheatreInEachBranch">
        </div>

        <div class="input-group">
            <label for="Staff">Staff Quantity in this branch</label>
            <input type="text" name="Staff">
        </div>

        <div class="input-group">
            <label for="Phone">Phone</label>
            <input type="text" name="Phone">
        </div>

        <div class="input-group">
        <p>
            </br>
                <button type="submit" name="add_branch" class="btn"> ADD </button>
            </br>
        </p>
    </form>
</body>
</html>
