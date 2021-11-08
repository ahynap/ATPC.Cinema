<?php
      include('server.php'); 
      mysqli_query($conn, 'SET CHARACTER SET UTF8');
      $result = mysqli_query($conn,"SELECT * FROM movieinfo WHERE MovieID%2=1");
      $result2 = mysqli_query($conn,"SELECT * FROM movieinfo WHERE MovieID%2=0");
  ?>

  <!DOCTYPE html>
    <html lang="en">
      <head>
        <title>Index</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="style_movie.css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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

        </style>
      </head>
    

    <body>
      
      <div class="container py-3">

        <header>
          <div class="logo pb-4 mb-4 border-bottom">
              <div class="loginOut pb-2 mb-2">
                <button type="submit" class="btnontop" 
                  onclick= "document.location = 'form_addlogin.php' "> login/reg </button>
              
                  <a href="mode.php">
                    <img src="mode.png" width=100>
                  </a>
                </div>

              <img src="logow.png" width=200>
          </div>

          <div class="logo pb-4">
          <div class="manu pb-2 mb-2">

                <button type="submit" class="btnmanu mt-2" 
                  onclick= "document.location = 'index.php' "> MOVIE </button> &nbsp;
                <button type="submit" class="btnmanu mt-2" 
                  onclick= "document.location = 'Show_ฺbranch_NL.php' "> BRANCH </button> &nbsp;
                <button type="submit" class="btnmanu mt-2" 
                  onclick= "document.location = 'Show_theatre_NL.php' "> THEATRE </button> &nbsp;
          </div>
          </div>

          <div class="pricing-header p-3  mx-auto text-center">
            <h1 style="color:#ffffff;" class="display-4 fw-normal"> <i>- NOW SHOWING -</i></h1>
          </div>
        </header>


        <div class="row">

          <div class="column">
            <p><!---------- Retrive data LEFT ------------->
              <?php
                if (mysqli_num_rows($result) > 0) { 
                  $i=0;
                  while($row = mysqli_fetch_array($result)) {?>
                    <h2>
                      <div class="header2">
                        <?php echo $row["MovieTitle"]; ?>
                      </div>
                              
                      <form>
                        <div class="fetch-group">
                          <label><?php echo '<img src="'.$row["Picture"].'" style="width:200px;height:256px">'; ?></label></br>
                            <label><?php echo $row["Detail"]; ?></label></br>
                                      
                          <label style="color:#f50057">MOVIE LENGTH :&nbsp; </label>
                            <label><?php echo $row["MovieLong"]; ?></label></br>

                          <label style="color:#f50057">GENRE :&nbsp; </label>
                            <label><?php echo $row["Genre"]; ?></label> &nbsp;

                          <label style="color:#f50057">RATE:&nbsp;  </label>
                            <label><?php echo $row["Rate"]; ?></label></br>

                          <label style="color:#f50057">CAST :&nbsp; </label>
                            <label><?php echo $row["Cast"]; ?></label></br>
                          
                          <label style="color:#f50057">RELEASE DATE :&nbsp; </label>
                            <label><?php echo $row["MovieIn"]; ?></label>
                

                        </div>

                      </form>
                    </h2> <?php
                  $i++;
                  }
                }
              ?>
            </p><!---------- Retrive data LEFT end ------------->
          </div>

          <div class="column">
            <p><!---------- Retrive data RIGHT ------------->
              <?php
                if (mysqli_num_rows($result2) > 0) { 
                  $i=0;
                  while($row = mysqli_fetch_array($result2)) {?>
                    <h2>
                      <div class="header2">
                        <?php echo $row["MovieTitle"]; ?>
                      </div>
                              
                      <form>
                        <div class="fetch-group">
                          <label><?php echo '<img src="'.$row["Picture"].'" style="width:200px;height:256px">'; ?></label></br>
                            <label><?php echo $row["Detail"]; ?></label></br>
                                      
                          <label style="color:#f50057">MOVIE LENGTH :&nbsp; </label>
                            <label><?php echo $row["MovieLong"]; ?></label></br>

                          <label style="color:#f50057">GENRE :&nbsp; </label>
                            <label><?php echo $row["Genre"]; ?></label> &nbsp;

                          <label style="color:#f50057">RATE:&nbsp;  </label>
                            <label><?php echo $row["Rate"]; ?></label></br>

                          <label style="color:#f50057">CAST :&nbsp; </label>
                            <label><?php echo $row["Cast"]; ?></label></br>
                          
                          <label style="color:#f50057">RELEASE DATE :&nbsp; </label>
                            <label><?php echo $row["MovieIn"]; ?></label>
                
                        </div>
                      </form>
                    </h2> <?php
                  $i++;
                  }
                }
              ?>
            </p><!---------- Retrive data RIGHT end ------------->
          </div>

        </div>

      </div>
    </body>
  </html>