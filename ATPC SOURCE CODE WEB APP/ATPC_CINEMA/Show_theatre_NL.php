<?php
      include('server.php'); 
      mysqli_query($conn, 'SET CHARACTER SET UTF8');

        $result1 = mysqli_query($conn,"SELECT *
        FROM theatre 
        JOIN branch
        ON theatre.BranchID = branch.BranchID
        WHERE SystemType='2D'");

        $result2 = mysqli_query($conn,"SELECT *
        FROM theatre 
        JOIN branch
        ON theatre.BranchID = branch.BranchID
        WHERE SystemType='3D'");

        $result3 = mysqli_query($conn,"SELECT *
        FROM theatre 
        JOIN branch
        ON theatre.BranchID = branch.BranchID
        WHERE SystemType='4D'");
?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>THEATRE</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="stylesheet" href="style_theatre.css">

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
                    text-align: center;
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


                <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                    <h1 style="color:#ffffff;" class="display-4 fw-normal"> <i>- THEATRE -</i></h1>
                </div>
            </header>

            <div class="row">
                <div class="column left mb-2">
                    <div class="header2">
                        <h2>2D</h2>
                    </div>

                    <h2>
                    <?php
                        if (mysqli_num_rows($result1) > 0) { 
                            $i=0;
                            while($row = mysqli_fetch_array($result1)) {?>
                            <h2>
                                                        
                                <form>
                                    <div class="fetch-group">
                                        <label style="color:#f50057">BRANCH :&nbsp; </label>
                                        <label><?php echo $row["BranchName"]; ?></label></br>

                                        <label style="color:#f50057">THEATRE :&nbsp; </label>
                                        <label><?php echo $row["TheatreName"]; ?></label></br>
                                        
                                        <label><?php echo $row["Location"]; ?></label></br>
                                    </div>
                                </form>
                            </h2> <?php
                            $i++;
                            }
                        }
                    ?>
                    </h2>
                </div>

              
                <div class="column middle">
                    <div class="header2">
                        <h2>3D</h2>
                    </div>
                
                    <h2>
                    <?php
                        if (mysqli_num_rows($result2) > 0) { 
                            $i=0;
                            while($row = mysqli_fetch_array($result2)) {?>
                            <h2>
                                                        
                                <form>
                                    <div class="fetch-group">
                                        <label style="color:#f50057">BRANCH :&nbsp; </label>
                                        <label><?php echo $row["BranchName"]; ?></label></br>

                                        <label style="color:#f50057">THEATRE :&nbsp; </label>
                                        <label><?php echo $row["TheatreName"]; ?></label></br>
                                        
                                        <label><?php echo $row["Location"]; ?></label></br>
                                    </div>
                                </form>
                            </h2> <?php
                            $i++;
                            }
                        }
                    ?>
                    </h2>
                </div>

                <div class="column right">

                    <div class="header2">
                        <h2>4D</h2>
                    </div>

                    <h2>
                    <?php
                        if (mysqli_num_rows($result3) > 0) { 
                            $i=0;
                            while($row = mysqli_fetch_array($result3)) {?>
                            <h2>
                                                        
                                <form>
                                    <div class="fetch-group">
                                        <label style="color:#f50057">BRANCH :&nbsp; </label>
                                        <label><?php echo $row["BranchName"]; ?></label></br>

                                        <label style="color:#f50057">THEATRE :&nbsp; </label>
                                        <label><?php echo $row["TheatreName"]; ?></label></br>
                                        
                                        <label><?php echo $row["Location"]; ?></label></br>
                                    </div>
                                </form>
                            </h2> <?php
                            $i++;
                            }
                        }
                    ?>
                    </h2>

                </div>
            
            </div>

        </div>
    </body>
</html>