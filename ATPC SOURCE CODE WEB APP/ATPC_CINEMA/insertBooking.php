<?php 
    session_start();
    include('server.php'); 
?>
<?php


$ScreeningID   = $_REQUEST['ScreeningID'];
$RegisterID	   = $_REQUEST['RegisterID'];
$ReserveStatus = $_REQUEST['ReserveStatus'];
$BookingClientID = $_REQUEST['BookingClientID'];
$PromotionMovieID = $_REQUEST['PromotionMovieID'];


$sqlQuery = "
	INSERT INTO Booking (ScreeningID, RegisterID, ReserveStatus,BookingClientID, PromotionMovieID)
	VALUES ('$ScreeningID','$RegisterID','$ReserveStatus','$BookingClientID' ,'$PromotionMovieID');
	";

$objQuery = mysqli_query($conn, $sqlQuery);

if ($objQuery) {
	echo "New record Inserted successfully";
} else {
	echo "Error : Input";
}

mysqli_close($conn); 
echo "<br><br>";
echo "--- END ---";
?>