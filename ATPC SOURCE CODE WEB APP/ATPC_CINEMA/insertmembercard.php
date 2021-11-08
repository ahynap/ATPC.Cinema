<?php
    include('server.php');

    session_start();
    $errors = array();

	if (isset($_POST['card_user'])) {
		$MemberName = mysqli_real_escape_string($conn, $_POST['MemberName']);
		$MemberSurname = mysqli_real_escape_string($conn, $_POST['MemberSurname']);
        $MemberEmail = mysqli_real_escape_string($conn, $_POST['MemberEmail']);
        $DateOfBirth = mysqli_real_escape_string($conn, $_POST['DateOfBirth']);
        $DateOfIssue = mysqli_real_escape_string($conn, $_POST['DateOfIssue']);
		$DateOfExpire = mysqli_real_escape_string($conn, $_POST['DateOfExpire']);
		$MemberLevel = mysqli_real_escape_string($conn, $_POST['MemberLevel']);

        if (empty($MemberName)) {
            array_push($errors, "name is required");
            $_SESSION['error'] = "name is required";
        }
        if (empty($MemberSurname)) {
            array_push($errors, "surname is required");
            $_SESSION['error'] = "surname is required";
        }
        if (empty($MemberEmail)) {
            array_push($errors, "email is required");
            $_SESSION['error'] = "email is required";
        }
        if (empty($DateOfBirth)) {
            array_push($errors, "date of birth is required");
            $_SESSION['error'] = "date of birth is required";
        }
		if (empty($DateOfIssue)) {
            array_push($errors, "date of issue is required");
            $_SESSION['error'] = "date of issue is required";
        }

        $user_check_query = "SELECT * FROM membercard WHERE MemberEmail = '$MemberEmail' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { 
            if ($result['MemberEmail'] == $MemberEmail) {
                array_push($errors, "Email already exists");
                $_SESSION['error'] = "Email already exists";
            }
        }

        if (count($errors) == 0) {
            $sql = "
			INSERT INTO membercard (MemberName, MemberSurname, MemberEmail, DateOfBirth, DateOfIssue, DateOfExpire, MemberLevel)
			VALUES ('$MemberName','$MemberSurname','$MemberEmail','$DateOfBirth', '$DateOfIssue', '$DateOfExpire', '$MemberLevel');
			";

                
            $date = date('Y-m-d');
            $sql2 = " DELETE FROM membercard WHERE DateOfExpire = '$date';";
            mysqli_query($conn, $sql2);

            $_SESSION['MemberEmail'] = $MemberEmail;
            $_SESSION['success'] = "Your card are now add";

            if (mysqli_query($conn, $sql)) 
            {
                $id = mysqli_insert_id($conn);
                echo "Your Member Card ID is: " . $id; ?>
                </br>
                <button type="submit" class="btnontop" 
                onclick= "document.location = 'form_addmembercard.php' "> back </button>
                </br>
                <?php
            } 

        } else {
            header("location: form_addmembercard.php");
        }
    }
?>




















