<?php 
    session_start();
    include('server.php'); 
	$errors = array();
?>

<?php

if (isset($_POST['add_theatre'])) 
{
	$TheatreName = mysqli_real_escape_string($conn, $_POST['TheatreName']);
	$SeatInEachTheatre = mysqli_real_escape_string($conn, $_POST['SeatInEachTheatre']);
	$SystemType = mysqli_real_escape_string($conn, $_POST['SystemType']);
	$BranchID = mysqli_real_escape_string($conn, $_POST['BranchID']);

	if (empty($TheatreName)) {
		array_push($errors, "theatre name is required");
		$_SESSION['error'] = "theatre name is required";
	}
	if (empty($SystemType)) {
		array_push($errors, "system is required");
		$_SESSION['error'] = "system is required";
	}
	if (empty($SeatInEachTheatre)) {
		array_push($errors, "seat quantity is required");
		$_SESSION['error'] = "system is required";
	}
	if (empty($BranchID)) {
		array_push($errors, "Branch ID is required");
		$_SESSION['error'] = "Branch ID is required";
	}

	if (count($errors) == 0) {
	$sql = "
	INSERT INTO Theatre(TheatreName, SeatInEachTheatre, SystemType,BranchID)
	VALUES ('$TheatreName','$SeatInEachTheatre','$SystemType','$BranchID');
	";

	if (mysqli_query($conn, $sql)) 
	{
		$id = mysqli_insert_id($conn);
		echo "Your Theatre ID is: " . $id; ?>
		</br>
		<button type="submit" class="btnontop" 
		onclick= "document.location = 'form_addTheatre.php' "> back </button>
		</br>
		<?php
	} 

} else {
	header("location: form_addTheatre.php");
}
}
?>