<?php 
    session_start();
    include('server.php'); 
?>
<?php

$delete= $_REQUEST['deletebankpromotion'];


if ($delete=="2") {
	$SpecialDay = $_REQUEST['SpecialDay'];
$sqlQuery2 = "
	DELETE FROM PromotionMovie
	WHERE SpecialDay='$SpecialDay';
	";
$objQuery2 = mysqli_query($conn, $sqlQuery2);
}

else if ($delete=="3"){
	$SpecialCode = $_REQUEST['SpecialCode'];
$sqlQuery3 = "
	DELETE FROM PromotionMovie
	WHERE SpecialCode='$SpecialCode';
	";
$objQuery3 = mysqli_query($conn, $sqlQuery3);
}



mysqli_close($conn); 
echo "<br><br>";
echo "--- END ---";
?>