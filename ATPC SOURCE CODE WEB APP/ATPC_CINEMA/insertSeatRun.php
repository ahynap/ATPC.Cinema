<?php 
    session_start();
    include('server.php'); 


	$SeatNo[]	   = $_REQUEST['SeatNo'];
	$ScreeningID   = $_REQUEST['ScreeningID'];

	$checked=$_POST['SeatNo'];
	$count= count($checked);

	foreach ($checked as $key => $value) {
		
	$sqlQuery = "
		INSERT INTO SeatRun (SeatNo, ScreeningID)
		VALUES ('$value','$ScreeningID');
		";

	$objQuery = mysqli_query($conn, $sqlQuery);

	}

	if ($objQuery) {
		echo "New record Inserted successfully";
	} else {
		echo "Error : Input";
	}

	mysqli_close($conn); 
	echo "<br><br>";
	echo "--- END ---";
?>