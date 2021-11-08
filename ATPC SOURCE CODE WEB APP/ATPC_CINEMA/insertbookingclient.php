
<?php
header('Content-Type: text/html; charset=utf-8');
$servername = 'localhost';
$username = 'root';
$password = '';
$databasename = 'atpc';

$connection = mysqli_connect($servername, $username, $password, $databasename);
mysqli_query($connection, 'SET CHARACTER SET UTF8');


$MovieTitle	  = $_REQUEST['MovieTitle'];
$BranchName   = $_REQUEST['BranchName'];
$DateDay	= $_REQUEST['DateDay'];
$Price   = $_REQUEST['Price'];
$TimeHour	= $_REQUEST['TimeHour'];

$PaymentMethod   = $_REQUEST['PaymentMethod'];
$CreditCardNo  = $_REQUEST['CreditCardNo'];

$ScreeningID  = $_REQUEST['ScreeningID'];
$SeatNo[]	= $_REQUEST['SeatNo'];

$Pro = $_REQUEST["DiscountMovie"];


if($Pro == "0")
{

	$checked = $_POST['SeatNo'];
	$count = count($checked);
	echo "AMOUNT OF BOOKING SEAT : " . $count . "<br>"; 


	$sqlQuery = "
	INSERT INTO bookingclient (MovieTitle, BranchName, DateDay, Price, TimeHour, PaymentMethod, CreditCardNoORWalletID, AmountSeat, DiscountMovie)
	VALUES ('$MovieTitle','$BranchName','$DateDay', '$Price', '$TimeHour', '$PaymentMethod', '$CreditCardNo', '$count', 0);
	";

	if (mysqli_query($connection, $sqlQuery)) {
    $id = mysqli_insert_id($connection);
	} else {
	    echo "Error: " . $sqlQuery . "<br>" . mysqli_error($connection);
	}

	echo "SEAT : "; 

foreach ($checked as $key => $value) {
	echo $value;

	$sqlQuery9 = "
          INSERT INTO bookingrun (BookingClientID, ScreeningID, SeatNo)
          VALUES ('$id','$ScreeningID', '$value')";

	$objQuery9 = mysqli_query($connection, $sqlQuery9);

	$sqlQuery11 = "
	DELETE FROM seatrun
	WHERE ScreeningID = '$ScreeningID' AND SeatNo = '$value'
	";

	$objQuery11 = mysqli_query($connection, $sqlQuery11); 
}

	echo "<br>";
/* ----------------------------------TICKET------------------------------- */

	$sqlQuery4 = mysqli_query($connection, "SELECT *
	FROM bookingclient 
	order by BookingClientID desc limit 1");
	
	while($r = mysqli_fetch_array($sqlQuery4))
	{
	?>
	 <td><label>BOOKING ID : &nbsp;</label><?php echo $r['BookingClientID']; ?></td><br>
	 <td><label>BRANCH NAME : &nbsp;</label><?php echo $r['BranchName']; ?></td><br>
	 <td><label>MOVIE TITLE : &nbsp;</label><?php echo $r['MovieTitle']; ?></td><br>
	 <td><label>DATE : &nbsp;</label><?php echo $r['DateDay']; ?></td><br>
	 <td><label>TIME : &nbsp;</label><?php echo $r['TimeHour']; ?></td><br>
	 <td><label>Total : &nbsp;</label><?php echo $r['Total']; ?></td><br>
	 <td><label>Total Due : &nbsp;</label><?php echo $r['TotalDue']; ?></td><br>

	<?php
	}

	$sqlQuery23 = mysqli_query($connection, "SELECT TheatreName
	FROM theatre
	WHERE TheatreID IN 
	(SELECT TheatreID 
	FROM screening
	WHERE ScreeningID = '$ScreeningID')");
	
	while($r = mysqli_fetch_array($sqlQuery23))
	{
	?>
	 <td><label>THEATRE ROOM : &nbsp;</label><?php echo $r['TheatreName']; ?></td>

	<?php
	}

/* ----------------------------------TICKET------------------------------- */
}

else if($Pro == "4")
{
	$checked = $_POST['SeatNo'];
	$count = count($checked);
	echo "AMOUNT OF BOOKING SEAT : " . $count . "<br>"; 


	$sqlQuery = "
	INSERT INTO bookingclient (MovieTitle, BranchName, DateDay, Price, TimeHour, PaymentMethod, CreditCardNoORWalletID, AmountSeat, DiscountMovie)
	VALUES ('$MovieTitle','$BranchName','$DateDay', '$Price', '$TimeHour', '$PaymentMethod', '$CreditCardNo', '$count', 20);
	";

	if (mysqli_query($connection, $sqlQuery)) {
    $id = mysqli_insert_id($connection);
	} else {
	    echo "Error: " . $sqlQuery . "<br>" . mysqli_error($connection);
	}

	echo "SEAT : "; 

foreach ($checked as $key => $value) {
	echo $value;

	$sqlQuery9 = "
          INSERT INTO bookingrun (BookingClientID, ScreeningID, SeatNo)
          VALUES ('$id','$ScreeningID', '$value')";

	$objQuery9 = mysqli_query($connection, $sqlQuery9);

	$sqlQuery11 = "
	DELETE FROM seatrun
	WHERE ScreeningID = '$ScreeningID' AND SeatNo = '$value'
	";

	$objQuery11 = mysqli_query($connection, $sqlQuery11); 
}
	echo "<br>";

/* ----------------------------------TICKET------------------------------- */

	$sqlQuery4 = mysqli_query($connection, "SELECT *
	FROM bookingclient 
	order by BookingClientID desc limit 1");
	
	while($r = mysqli_fetch_array($sqlQuery4))
	{
	?>
	<td><label>BOOKING ID : &nbsp;</label><?php echo $r['BookingClientID']; ?></td><br>
	 <td><label>BRANCH NAME : &nbsp;</label><?php echo $r['BranchName']; ?></td><br>
	 <td><label>MOVIE TITLE : &nbsp;</label><?php echo $r['MovieTitle']; ?></td><br>
	 <td><label>DATE : &nbsp;</label><?php echo $r['DateDay']; ?></td><br>
	 <td><label>TIME : &nbsp;</label><?php echo $r['TimeHour']; ?></td><br>
	 <td><label>Total : &nbsp;</label><?php echo $r['Total']; ?></td><br>
	 <td><label>Total Due : &nbsp;</label><?php echo $r['TotalDue']; ?></td><br>

	<?php
	}

	$sqlQuery23 = mysqli_query($connection, "SELECT TheatreName
	FROM theatre
	WHERE TheatreID IN 
	(SELECT TheatreID 
	FROM screening
	WHERE ScreeningID = '$ScreeningID')");
	
	while($r = mysqli_fetch_array($sqlQuery23))
	{
	?>
	 <td><label>THEATRE ROOM : &nbsp;</label><?php echo $r['TheatreName']; ?></td>

	<?php
	}

/* ----------------------------------TICKET------------------------------- */

}

else if($Pro == "6")
{
	$checked = $_POST['SeatNo'];
	$count = count($checked);
	echo "AMOUNT OF BOOKING SEAT : " . $count . "<br>"; 


	$sqlQuery = "
	INSERT INTO bookingclient (MovieTitle, BranchName, DateDay, Price, TimeHour, PaymentMethod, CreditCardNoORWalletID, AmountSeat, DiscountMovie)
	VALUES ('$MovieTitle','$BranchName','$DateDay', '$Price', '$TimeHour', '$PaymentMethod', '$CreditCardNo', '$count', 15);
	";

	if (mysqli_query($connection, $sqlQuery)) {
    $id = mysqli_insert_id($connection);
	} else {
	    echo "Error: " . $sqlQuery . "<br>" . mysqli_error($connection);
	}

	echo "SEAT : "; 

foreach ($checked as $key => $value) {
	echo $value;

	$sqlQuery9 = "
          INSERT INTO bookingrun (BookingClientID, ScreeningID, SeatNo)
          VALUES ('$id','$ScreeningID', '$value')";

	$objQuery9 = mysqli_query($connection, $sqlQuery9);

	$sqlQuery11 = "
	DELETE FROM seatrun
	WHERE ScreeningID = '$ScreeningID' AND SeatNo = '$value'
	";

	$objQuery11 = mysqli_query($connection, $sqlQuery11); 
}

	echo "<br>";
/* ----------------------------------TICKET------------------------------- */

	$sqlQuery4 = mysqli_query($connection, "SELECT *
	FROM bookingclient 
	order by BookingClientID desc limit 1");
	
	while($r = mysqli_fetch_array($sqlQuery4))
	{
	?>
	 <td><label>BOOKING ID : &nbsp;</label><?php echo $r['BookingClientID']; ?></td><br>
	 <td><label>BRANCH NAME : &nbsp;</label><?php echo $r['BranchName']; ?></td><br>
	 <td><label>MOVIE TITLE : &nbsp;</label><?php echo $r['MovieTitle']; ?></td><br>
	 <td><label>DATE : &nbsp;</label><?php echo $r['DateDay']; ?></td><br>
	 <td><label>TIME : &nbsp;</label><?php echo $r['TimeHour']; ?></td><br>
	 <td><label>Total : &nbsp;</label><?php echo $r['Total']; ?></td><br>
	 <td><label>Total Due : &nbsp;</label><?php echo $r['TotalDue']; ?></td><br>

	<?php
	}

	$sqlQuery23 = mysqli_query($connection, "SELECT TheatreName
	FROM theatre
	WHERE TheatreID IN 
	(SELECT TheatreID 
	FROM screening
	WHERE ScreeningID = '$ScreeningID')");
	
	while($r = mysqli_fetch_array($sqlQuery23))
	{
	?>
	 <td><label>THEATRE ROOM : &nbsp;</label><?php echo $r['TheatreName']; ?></td>

	<?php
	}

/* ----------------------------------TICKET------------------------------- */

}

else{

	$Radio = $_REQUEST["Code"];

	if($Radio == "8"){
	$SpeCodeMovie = $_REQUEST["DiscountMovie"];
	$sqlQuery17 = "SELECT * FROM promotionmovie WHERE SpecialDay ='$SpeCodeMovie'";
 
    $objQuery17 = mysqli_query($connection, $sqlQuery17); 

if (mysqli_num_rows($objQuery17) == 0) {
   echo '<a href = "screeningnew.php">Code Not Exist</a>';
   }else if(mysqli_num_rows($objQuery17) == 1){

   	$checked = $_POST['SeatNo'];
	$count = count($checked);
	echo "AMOUNT OF BOOKING SEAT : " . $count . "<br>"; 


   $sqlQuery16 = "
	INSERT INTO bookingclient (MovieTitle, BranchName, DateDay, Price, TimeHour, PaymentMethod, CreditCardNoORWalletID, AmountSeat, DiscountMovie)
	VALUES ('$MovieTitle','$BranchName','$DateDay', '$Price', '$TimeHour', '$PaymentMethod' , '$CreditCardNo', '$count', 40);
	";

	if (mysqli_query($connection, $sqlQuery16)) {
    $id = mysqli_insert_id($connection);
	} else {
	    echo "Error: " . $sqlQuery16 . "<br>" . mysqli_error($connection);
	}

	echo "SEAT : "; 

	foreach ($checked as $key => $value) {
	echo $value;

	$sqlQuery9 = "
          INSERT INTO bookingrun (BookingClientID, ScreeningID, SeatNo)
          VALUES ('$id','$ScreeningID', '$value')";
	$objQuery9 = mysqli_query($connection, $sqlQuery9);

	$sqlQuery11 = "
	DELETE FROM seatrun
	WHERE ScreeningID = '$ScreeningID' AND SeatNo = '$value'
	";

	$objQuery11 = mysqli_query($connection, $sqlQuery11); 
}

		echo "<br>";

/* ----------------------------------TICKET------------------------------- */

	$sqlQuery4 = mysqli_query($connection, "SELECT *
	FROM bookingclient 
	order by BookingClientID desc limit 1");
	
	while($r = mysqli_fetch_array($sqlQuery4))
	{
	?>
	 <td><label>BOOKING ID : &nbsp;</label><?php echo $r['BookingClientID']; ?></td><br>
	 <td><label>BRANCH NAME : &nbsp;</label><?php echo $r['BranchName']; ?></td><br>
	 <td><label>MOVIE TITLE : &nbsp;</label><?php echo $r['MovieTitle']; ?></td><br>
	 <td><label>DATE : &nbsp;</label><?php echo $r['DateDay']; ?></td><br>
	 <td><label>TIME : &nbsp;</label><?php echo $r['TimeHour']; ?></td><br>
	 <td><label>Total : &nbsp;</label><?php echo $r['Total']; ?></td><br>
	 <td><label>Total Due : &nbsp;</label><?php echo $r['TotalDue']; ?></td><br>

	<?php
	}

	$sqlQuery23 = mysqli_query($connection, "SELECT TheatreName
	FROM theatre
	WHERE TheatreID IN 
	(SELECT TheatreID 
	FROM screening
	WHERE ScreeningID = '$ScreeningID')");
	
	while($r = mysqli_fetch_array($sqlQuery23))
	{
	?>
	 <td><label>THEATRE ROOM : &nbsp;</label><?php echo $r['TheatreName']; ?></td>

	<?php
	}
/* ----------------------------------TICKET------------------------------- */

	}

}else if($Radio = "2")
	{

	$SpeCodeMovie = $_REQUEST["DiscountMovie"];

	$sqlQuery14 = "SELECT * FROM promotionmovie WHERE SpecialCode ='$SpeCodeMovie'";
	  
	$objQuery14 = mysqli_query($connection, $sqlQuery14);      

if (mysqli_num_rows($objQuery14) == 0) {
   echo '<a href = "screeningnew.php">Code Not Exist</a>';
   }else if(mysqli_num_rows($objQuery14) == 1){

   	$checked = $_POST['SeatNo'];
	$count = count($checked);
	echo "AMOUNT OF BOOKING SEAT : " . $count . "<br>"; 


   $sqlQuery16 = "
	INSERT INTO bookingclient (MovieTitle, BranchName, DateDay, Price, TimeHour, PaymentMethod, CreditCardNoORWalletID, AmountSeat, DiscountMovie)
	VALUES ('$MovieTitle','$BranchName','$DateDay', '$Price', '$TimeHour', '$PaymentMethod' , '$CreditCardNo', '$count', 40);
	";

	if (mysqli_query($connection, $sqlQuery16)) {
    $id = mysqli_insert_id($connection);
	} else {
	    echo "Error: " . $sqlQuery16 . "<br>" . mysqli_error($connection);
	}

	echo "SEAT : "; 

	foreach ($checked as $key => $value) {
	echo $value;

	$sqlQuery9 = "
          INSERT INTO bookingrun (BookingClientID, ScreeningID, SeatNo)
          VALUES ('$id','$ScreeningID', '$value')";
	$objQuery9 = mysqli_query($connection, $sqlQuery9);


	$sqlQuery11 = "
	DELETE FROM seatrun
	WHERE ScreeningID = '$ScreeningID' AND SeatNo = '$value'
	";

	$objQuery11 = mysqli_query($connection, $sqlQuery11); 
}
	echo "<br>";

/* ----------------------------------TICKET------------------------------- */

	$sqlQuery4 = mysqli_query($connection, "SELECT *
	FROM bookingclient 
	order by BookingClientID desc limit 1");
	
	while($r = mysqli_fetch_array($sqlQuery4))
	{
	?>
	 <td><label>BOOKING ID : &nbsp;</label><?php echo $r['BookingClientID']; ?></td><br>
	 <td><label>BRANCH NAME : &nbsp;</label><?php echo $r['BranchName']; ?></td><br>
	 <td><label>MOVIE TITLE : &nbsp;</label><?php echo $r['MovieTitle']; ?></td><br>
	 <td><label>DATE : &nbsp;</label><?php echo $r['DateDay']; ?></td><br>
	 <td><label>TIME : &nbsp;</label><?php echo $r['TimeHour']; ?></td><br>
	 <td><label>Total : &nbsp;</label><?php echo $r['Total']; ?></td><br>
	 <td><label>Total Due : &nbsp;</label><?php echo $r['TotalDue']; ?></td><br>

	<?php
	}

	$sqlQuery23 = mysqli_query($connection, "SELECT TheatreName
	FROM theatre
	WHERE TheatreID IN 
	(SELECT TheatreID 
	FROM screening
	WHERE ScreeningID = '$ScreeningID')");
	
	while($r = mysqli_fetch_array($sqlQuery23))
	{
	?>
	 <td><label>THEATRE ROOM : &nbsp;</label><?php echo $r['TheatreName']; ?></td>

	<?php
	}

/* ----------------------------------TICKET------------------------------- */

	}

}

}

mysqli_close($connection); 
?>




