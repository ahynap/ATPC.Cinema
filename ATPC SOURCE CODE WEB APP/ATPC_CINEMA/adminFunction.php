<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">


    <title>ADMIN FUNCTION</title>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@1,300&display=swap" rel="stylesheet">


    <style>
    p,h3 {text-align: center;}
    </style>

    <style>
    h4 {   text-align: center;}
    </style>

    <style>
    h5 {
        font-family: 'Varela Round'; 
        text-align: center;
        font-size: 30px;}
    
    .back {  position: absolute;
      left: 280px;}
    </style>
</head>

<body>
    <br/>
    <div class="back pb-2 mb-2">
              <button type="submit" class="btnontop" 
                onclick= "document.location = 'mode.php' "> BACK </button>
            </div>

    <p>
        <br/>
        <br/>
        <img src="logow.png" width=200>
        <h3 style="color:#ffffff;"> <br/>- HELLO ADMIN -<br/>- - - - - - - - - -  - -</h3>

    </p>

    <h4>
        <br/>
        <button type="submit" class="btn" 
            onclick= "document.location = 'form_addmembercard.php' "> ADD CARD </button>

        &nbsp; &nbsp;
        <button type="submit" class="btn" 
            onclick= "document.location = 'form_addBranch.php' "> ADD BRANCH </button>
        
        &nbsp; &nbsp;
        <button type="submit" class="btn" 
            onclick= "document.location = 'form_addTheatre.php' "> ADD THEATRE </button>

        <br/><br/>
        <button type="submit" class="btn" 
            onclick= "document.location = 'form_addMovie.php' "> ADD MOVIE </button>

        &nbsp; &nbsp;
        <button type="submit" class="btn" 
            onclick= "document.location = 'form_screening.php' "> ADD SCREENING </button> 
        
        &nbsp; &nbsp;
        <button type="submit" class="btn" 
            onclick= "document.location = 'form_addSeatRun.php' "> ADD SEAT </button> 

        <br/><br/>
        <button type="submit" class="btn" 
            onclick= "document.location = 'form_insertPromotion.php' "> INSERT PROMOTION </button>
    
        &nbsp; &nbsp;
        <button type="submit" class="btn" 
            onclick= "document.location = 'form_deletePromotion.php' "> DELETE PROMOTION </button> 
         
        <br> <br>
        <button type="submit" class="btn" 
            onclick= "document.location = 'form_booking.php' "> WALK IN BOOKING </button> 


         <br/><br/>
    </h4>


</body>
</html>
    