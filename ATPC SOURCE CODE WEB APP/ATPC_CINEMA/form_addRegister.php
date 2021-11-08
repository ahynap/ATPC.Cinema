<?php 
    session_start();
    include('server.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
    #key {  
    height: 30px;
    width: 93%;
    padding: 5px 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid gray;}
    </style>

    <style>
    #NOTHaveMemberCard {      
    margin: 10px;   
    height: 17px;
    width: 17px;
    border-radius: 5px;
    border: 1px solid gray;}
    </style>

    <style>
    #label_dh {  
    font-size: 15px;
    margin: -10px; }
    </style>

</head>

<body>
    
    <div class="header">
        <h2>REGISTER</h2>
    </div>

    <form action="insertregister.php" method="post">
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

        <div>
            <label for="MemberCardID">Member Card ID</label>          
            <input type="text" name="MemberCardID" id="key">       
            <input type="checkbox" id="NOTHaveMemberCard" name="MemberCardID" value="0">     
            <label id="label_dh" >DONT HAVE MEMBER CARD</label>

        </div>

        <div class="input-group">
            <label for="RegisterName">Name</label>
            <input type="text" name="RegisterName">
        </div>

        <div class="input-group">
            <label for="RegisterSurname">Surname</label>
            <input type="text" name="RegisterSurname">
        </div>

        <div class="input-group">
            <label for="RegisterEmail">Email</label>
            <input type="email" name="RegisterEmail">
        </div>

        <div class="input-group">
            <label for="Password">Password</label>
            <input type="password" name="Password">
        </div>
        <div class="input-group">
            <label for="Phone">Phone</label>
            <input type="tel" name="Phone">
        </div>

        
        <div class="input-group">
        <p>
        </br>
            <button type="submit" name="reg_user" class="btn"> register </button>
        </div>
        </br>
        </p>

        <p>Already a member? <a href="form_addlogin.php">Log in</a></p>
    </form>

</body>
</html>
