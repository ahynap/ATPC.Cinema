<?php 
    session_start();
    include('server.php'); 
	$errors = array();
?>
<?php

if (isset($_POST['add_movie'])) {
	$MovieTitle = mysqli_real_escape_string($conn, $_POST['MovieTitle']);
	$Genre = mysqli_real_escape_string($conn, $_POST['Genre']);
	$Rate = mysqli_real_escape_string($conn, $_POST['Rate']);
	$Detail = mysqli_real_escape_string($conn, $_POST['Detail']);
	$Cast = mysqli_real_escape_string($conn, $_POST['Cast']);
	$MovieLong = mysqli_real_escape_string($conn, $_POST['MovieLong']);
	$MovieIn = mysqli_real_escape_string($conn, $_POST['MovieIn']);
	$MovieOut = mysqli_real_escape_string($conn, $_POST['MovieOut']);
	$Picture = mysqli_real_escape_string($conn, $_POST['Picture']);

	if (empty($MovieTitle)) {
		array_push($errors, "Movie Title is required");
		$_SESSION['error'] = "Movie Title is required";
	}
	if (empty($MovieIn)) {
		array_push($errors, "Movie releases date is required");
		$_SESSION['error'] = "Movie releases date is required";
	}
	if (empty($MovieOut)) {
		array_push($errors, "Movie out date is required");
		$_SESSION['error'] = "Movie out date is required";
	}

	if (count($errors) == 0) {
		$sql = "
		INSERT INTO MovieInfo (MovieTitle, Genre, Rate,Detail,Cast, MovieLong, MovieIn,MovieOut,Picture)
		VALUES ('$MovieTitle','$Genre','$Rate','$Detail','$Cast','$MovieLong','$MovieIn','$MovieOut','$Picture');
		";

		$date = date('Y-m-d');
        $sql2 = " DELETE FROM movieinfo WHERE MovieOut = '$date';";
        mysqli_query($conn, $sql2);

		if (mysqli_query($conn, $sql)) 
		{
			$id = mysqli_insert_id($conn);
			echo "Your Movie ID is: " . $id; ?>
			</br>
			<button type="submit" class="btnontop" 
			onclick= "document.location = 'form_addMovie.php' "> back </button>
			</br>
			<?php
		} 
	
	} else {
		header("location: form_addMovie.php");
	}
	}
?>