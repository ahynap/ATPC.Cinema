<?php
      include('server.php'); 
      mysqli_query($conn, 'SET CHARACTER SET UTF8');
        
      $result = mysqli_query($conn,"SELECT *
          FROM movieinfo 
          JOIN screening
            ON movieinfo.MovieID = screening.MovieID
          JOIN theatre
            ON theatre.TheatreID = screening.TheatreID
          JOIN branch
            ON theatre.BranchID = branch.BranchID
          WHERE (screening.ScreeningID)%2=1");

      $result2 = mysqli_query($conn,"SELECT *
        FROM movieinfo
        JOIN screening
          ON movieinfo.MovieID = screening.MovieID
        JOIN theatre
          ON theatre.TheatreID = screening.TheatreID
        JOIN branch
          ON theatre.BranchID = branch.BranchID
        WHERE (screening.ScreeningID)%2=0");


  ?>

  <!DOCTYPE html>
    <html lang="en">
      <head>
        <title>HOME</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="style_movie.css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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

            /*--------- button for booking ---------*/
            .btn {
                padding: 10px;
                font-size: 20px;
                width: 80px;
                color: #02111d;
                font-family: 'Varela Round';
                background: #ffbf37;
                border: none;
                border-radius: 60px;

                opacity:1.0; 
                filter:alpha(opacity=100);
            }

            .btn::before,
            .btn::after {
                position: absolute;
                display: block;
                content: '';
                transition: all .5s;
            }

            .btn:hover {
                background-color: #d0cde1;
                color: #02111d;
            }

            .selectscreen {
                width: 70%;
                position: fixed;
                margin: 50px auto 0px;
                background: white;
                border-radius: 10px 10px 10px 10px;
                bottom: 0;
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
                  onclick= "document.location = 'index.php' "> log out </button>
              </div>

              <img src="logow.png" width=200>
            </div>


            <div class="logo pb-4">
          <div class="manu pb-2 mb-2 ">
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

            <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
              <h1 style="color:#ffffff;" class="display-4 fw-normal"> <i>- NOW SCREENING -</i></h1>
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
                        <?php echo $row["MovieTitle"]; ?></br>
                        <label style="color:#ffffff">" SCREEN :&nbsp; </label>
                        <?php echo $row["ScreeningID"]; ?>
                        <label style="color:#ffffff">"</label>
                      </div>
                              
                      <form>
                        <div class="fetch-group">
                          <label><?php echo '<img src="'.$row["Picture"].'" style="width:200px;height:256px">'; ?></label></br>
                          

                          <label style="color:#f50057">DATE :&nbsp; </label>
                            <label><?php echo $row["DateDay"]; ?></label></br>

                          <label style="color:#f50057">TIME :&nbsp; </label>
                            <label><?php echo $row["StartTime"]; ?></label>

                          <label style="color:#f50057"> -&nbsp; </label>
                            <label><?php echo $row["EndTime"]; ?></label></br>

                          <label style="color:#f50057">SYSTEM :&nbsp; </label>
                            <label><?php echo $row["SystemType"]; ?></label>&nbsp;

                          <label style="color:#f50057">LANGUAGE :&nbsp;  </label>
                            <label><?php echo $row["SubTitle"]; ?></label></br>

                          <label style="color:#f50057">THEATRE :&nbsp; </label>
                            <label><?php echo $row["TheatreName"]; ?></label>&nbsp;

                          <label style="color:#f50057">AT :&nbsp; </label>
                            <label><?php echo $row["BranchName"]; ?></label>
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
                        <?php echo $row["MovieTitle"]; ?></br>
                        <label style="color:#ffffff">" SCREEN :&nbsp; </label>
                        <?php echo $row["ScreeningID"]; ?>
                        <label style="color:#ffffff">"</label>
                      </div>
                              
                      <form>
                        <div class="fetch-group">
                          <label><?php echo '<img src="'.$row["Picture"].'" style="width:200px;height:256px">'; ?></label></br>
                          

                          <label style="color:#f50057">DATE :&nbsp; </label>
                            <label><?php echo $row["DateDay"]; ?></label></br>

                          <label style="color:#f50057">TIME :&nbsp; </label>
                            <label><?php echo $row["StartTime"]; ?></label>

                          <label style="color:#f50057"> -&nbsp; </label>
                            <label><?php echo $row["EndTime"]; ?></label></br>

                          <label style="color:#f50057">SYSTEM :&nbsp; </label>
                            <label><?php echo $row["SystemType"]; ?></label>&nbsp;

                          <label style="color:#f50057">LANGUAGE :&nbsp;  </label>
                            <label><?php echo $row["SubTitle"]; ?></label></br>

                          <label style="color:#f50057">THEATRE :&nbsp; </label>
                            <label><?php echo $row["TheatreName"]; ?></label>&nbsp;

                          <label style="color:#f50057">AT :&nbsp; </label>
                            <label><?php echo $row["BranchName"]; ?></label>
                        </div>
                      </form>
                    </h2> <?php
                  $i++;
                  }
                }
              ?>
            </p><!---------- Retrive data RIGHT end ------------->
          </div>

          <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
          </br></br>
              <h1 style="color:#ffffff;" class="display-4 fw-normal"> <i>- - - - - - - - - - -</i></h1>
            </div>
          
          <!---------- SELECT SCREENING ------------->
          <form class="selectscreen" style=" text-align: center;"  action="bookingclient.php">


              <h1 style="color:#02111d;  font-size:20px" class="detailbooking"> <i> what SCREEN do you want to watch?</i></h1>



            <?php
                $sqlQuery10 = 'SELECT ScreeningID FROM screening;';
                $objQuery10 = mysqli_query($conn, $sqlQuery10) or die("Error Query [" . $sqlQuery10 . "]");?>
                  <tr>
                  <td>
                    <?php
                      while ($objResult10 = mysqli_fetch_array($objQuery10)) {
                    ?>
                      <input class="btn mt-2 mb-2" type="submit" id="radiotime" name="ScreeningID" 
                          value = <?php echo $objResult10["ScreeningID"]; ?> >
                          &nbsp;
                      <?php
                        }    
                      ?>
                  </td>
                  </tr>
          </form>

        </div>

      </div>
    </body>
  </html>