<?php 
    include('server.php');

    session_start();
    $errors = array();

    if (isset($_POST['reg_user'])) {
		$MemberCardID = mysqli_real_escape_string($conn, $_POST['MemberCardID']);
		$RegisterName = mysqli_real_escape_string($conn, $_POST['RegisterName']);
        $RegisterSurname = mysqli_real_escape_string($conn, $_POST['RegisterSurname']);
        $RegisterEmail = mysqli_real_escape_string($conn, $_POST['RegisterEmail']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);
		$Phone = mysqli_real_escape_string($conn, $_POST['Phone']);

        if (empty($RegisterName)) {
            array_push($errors, "name is required");
            $_SESSION['error'] = "name is required";
        }
        if (empty($RegisterSurname)) {
            array_push($errors, "surname is required");
            $_SESSION['error'] = "surname is required";
        }
        if (empty($RegisterEmail)) {
            array_push($errors, "email is required");
            $_SESSION['error'] = "email is required";
        }
        if (empty($Password)) {
            array_push($errors, "password is required");
            $_SESSION['error'] = "password is required";
        }
		if (empty($Phone)) {
            array_push($errors, "phone is required");
            $_SESSION['error'] = "phone is required";
        }

        $user_check_query = "SELECT * FROM register WHERE RegisterEmail = '$RegisterEmail' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { 
            if ($result['RegisterEmail'] == $RegisterEmail) {
                array_push($errors, "Email already exists");
                $_SESSION['error'] = "Email already exists";
                header("location: form_addlogin.php");
            }
        }
        
        if (count($errors) == 0) {
            if($MemberCardID == 0){
            $sql = "
			INSERT INTO register (RegisterName, RegisterSurname, RegisterEmail, Password, Phone, MemberCardID)
			VALUES ('$RegisterName','$RegisterSurname','$RegisterEmail','$Password','$Phone', NULL);
			";
			mysqli_query($conn, $sql);

            }else{

            $sql = "
            INSERT INTO register (RegisterName, RegisterSurname, RegisterEmail, Password, Phone, MemberCardID)
            VALUES ('$RegisterName','$RegisterSurname','$RegisterEmail','$Password','$Phone', '$MemberCardID');
            ";
            mysqli_query($conn, $sql);

            }

            


            $_SESSION['RegisterEmail'] = $RegisterEmail;
            $_SESSION['success'] = "You are now logged in";
            
            header('location: home.php');
        } else {
            header("location: form_addRegister.php");
        }
    }
?>