<?php 
    session_start();
    include('server.php'); 
?>
<?php

$insert= $_REQUEST['insertpromotion'];

if ($insert=="3") {
	$SpecialCode = $_REQUEST['SpecialCode'];
$sqlQuery2 = "
	INSERT INTO PromotionMovie (SpecialCode)
	VALUES ('$SpecialCode');
	";
$objQuery2 = mysqli_query($conn, $sqlQuery2);
}

else if ($insert=="2"){
	$SpecialDay = $_REQUEST['SpecialDay'];
$sqlQuery3 = "
	INSERT INTO PromotionMovie (SpecialDay)
	VALUES ('$SpecialDay');
	";
$objQuery3 = mysqli_query($conn, $sqlQuery3);
}



mysqli_close($conn); 
echo "<br><br>";
echo "--- END ---";
?>