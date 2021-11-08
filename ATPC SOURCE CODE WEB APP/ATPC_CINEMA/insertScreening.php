<?php
    include('server.php');

    session_start();
    $errors = array();

	if (isset($_POST['screen_add'])) {
		$MovieID = mysqli_real_escape_string($conn, $_POST['MovieID']);
		$SubTitle = mysqli_real_escape_string($conn, $_POST['SubTitle']);
        $TheatreID = mysqli_real_escape_string($conn, $_POST['TheatreID']);
        $DateDay = mysqli_real_escape_string($conn, $_POST['DateDay']);
        $StartTime = mysqli_real_escape_string($conn, $_POST['StartTime']);
		$EndTime = mysqli_real_escape_string($conn, $_POST['EndTime']);

        if (empty($MovieID)) {
            array_push($errors, "Movie ID is required");
            $_SESSION['error'] = "Movie ID is required";
        }
        if (empty($SubTitle)) {
            array_push($errors, "Language is required");
            $_SESSION['error'] = "Language is required";
        }
        if (empty($TheatreID)) {
            array_push($errors, "Theatre ID is required");
            $_SESSION['error'] = "Theatre ID is required";
        }
        if (empty($DateDay)) {
            array_push($errors, "date of Show is required");
            $_SESSION['error'] = "date of Show is required";
        }
		if (empty($StartTime)) {
            array_push($errors, "show time start is required");
            $_SESSION['error'] = "show time start is required";
        }

        if (empty($EndTime)) {
            array_push($errors, "show time end is required");
            $_SESSION['error'] = "show time end is required";
        }

        $user_check_query = "SELECT * FROM screening WHERE TheatreID = '$TheatreID' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { 
            if ($result['TheatreID'] == $TheatreID) {
                array_push($errors, "this theatre isn't avaliable now");
                $_SESSION['error'] = "this theatre isn't avaliable now";
            }
        }

        if (count($errors) == 0) {
            $sql = "
			INSERT INTO screening (MovieID, SubTitle, TheatreID, DateDay, StartTime, EndTime)
			VALUES ('$MovieID','$SubTitle','$TheatreID','$DateDay', '$StartTime', '$EndTime');
			";

            $date = date('Y-m-d');
            $time = date('hh:mi:ss');
            $sql2 = " DELETE FROM screening WHERE DateDay = '$date'; OR StartTime > '$time';";
            mysqli_query($conn, $sql2);

            if (mysqli_query($conn, $sql)) 
            {
                $id = mysqli_insert_id($conn);
                echo "Your screening ID is: " . $id; ?>
                </br>
                <button type="submit" class="btnontop" 
                onclick= "document.location = 'form_screening.php' "> back </button>
                </br>
                <?php
            } 

        } else {
            header("location: form_screening.php");
        }
    }
?>




















