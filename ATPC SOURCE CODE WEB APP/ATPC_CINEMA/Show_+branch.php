<?php
      include('server.php'); 
      mysqli_query($conn, 'SET CHARACTER SET UTF8');
      $result = mysqli_query($conn,"SELECT * FROM branch WHERE Region LIKE '%central%'" );
      $result2 = mysqli_query($conn,"SELECT * FROM branch WHERE Region LIKE '%north%'" );
      $result3 = mysqli_query($conn,"SELECT * FROM branch WHERE Region LIKE '%south%'" );
      $result4 = mysqli_query($conn,"SELECT * FROM branch WHERE Region LIKE '%east%'" );
?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>BRANCH</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="stylesheet" href="style_branch.css">

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
                    font-size: 120%;
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
                  onclick= "document.location = 'index.php' "> log out </button>
              </div>


                    <img src="logow.png" width=200>
                </div>

                <div class="logo pb-4">
          <div class="manu pb-2 mb-2">
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
                    <h1 style="color:#ffffff;" class="display-4 fw-normal"> <i>- BRANCH -</i></h1>
                </div>
            </header>

            <div class="row">

                <div class="column left1">
                    <div class="header2">
                        <h2>CENTER</h2>
                    </div>
                
                    <p><!---------- center ------------->
                    <?php
                        if (mysqli_num_rows($result) > 0) { 
                        $i=0;
                        while($row = mysqli_fetch_array($result)) {?>
                            <h2>
                                    
                            <form>
                                <div class="fetch-group">
                                    <label style="font-size:25px;"><b><?php echo $row["BranchName"]; ?></b></label></br>
                                    <label><?php echo $row["Location"]; ?></label>
                                </div>
                            </form>
                            </h2> <?php
                        $i++;
                        }
                        }
                    ?>
                    </p><!---------- end center ------------->
                </div>
            
            
                <div class="column left2">
                    <div class="header2">
                        <h2>NORTH</h2>
                    </div>

                    <p><!---------- north ------------->
                    <?php
                        if (mysqli_num_rows($result2) > 0) { 
                        $i=0;
                        while($row = mysqli_fetch_array($result2)) {?>
                            <h2>
                                    
                            <form>
                                <div class="fetch-group">
                                    <label style="font-size:25px;"><b><?php echo $row["BranchName"]; ?></b></label></br>
                                    <label><?php echo $row["Location"]; ?></label>
                                </div>
                            </form>
                            </h2> <?php
                        $i++;
                        }
                        }
                    ?>
                    </p><!---------- end north ------------->
                </div>

                <div class="column right1">
                    <div class="header2">
                        <h2>SOUTH</h2>
                    </div>

                    <p><!---------- south ------------->
                    <?php
                        if (mysqli_num_rows($result3) > 0) { 
                        $i=0;
                        while($row = mysqli_fetch_array($result3)) {?>
                            <h2>
                                    
                            <form>
                                <div class="fetch-group">
                                    <label style="font-size:25px;"><b><?php echo $row["BranchName"]; ?></b></label></br>
                                    <label><?php echo $row["Location"]; ?></label>
                                </div>
                            </form>
                            </h2> <?php
                        $i++;
                        }
                        }
                    ?>
                    </p><!---------- end south ------------->
                </div>

                <div class="column right2">
                    <div class="header2">
                    <h2>EAST</h2>
                    </div>
                    <p><!---------- east ------------->
                    <?php
                        if (mysqli_num_rows($result4) > 0) { 
                        $i=0;
                        while($row = mysqli_fetch_array($result4)) {?>
                            <h2>
                                    
                            <form>
                                <div class="fetch-group">
                                    <label style="font-size:25px;"><b><?php echo $row["BranchName"]; ?></b></label></br>
                                    <label><?php echo $row["Location"]; ?></label>
                                </div>
                            </form>
                            </h2> <?php
                        $i++;
                        }
                        }
                    ?>
                    </p><!---------- end east ------------->
                </div>

                <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
              <h1 style="color:#ffffff;" class="display-4 fw-normal"> <i>- - - - - - - - - - -</i></h1>
            </div>

            </div>

        </div>
    </body>
</html>