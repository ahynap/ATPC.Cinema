<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $RegisterEmail = mysqli_real_escape_string($conn, $_POST['RegisterEmail']);
        $Password = mysqli_real_escape_string($conn, $_POST['Password']);

        if (empty($RegisterEmail)) {
            array_push($errors, "Email is required");
        }

        if (empty($Password)) {
            array_push($errors, "Password is required");
        }

        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM register WHERE RegisterEmail = '$RegisterEmail' AND Password = '$Password' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['RegisterEmail'] = $RegisterEmail;
                $_SESSION['success'] = "Your are now logged in";
                header("location: home.php");
            } else {
                array_push($errors, "Wrong Email or Password");
                $_SESSION['error'] = "Wrong Email or Password!";
                header("location:  form_addlogin.php");
            }
        } else {
            array_push($errors, "Email & Password is required");
            $_SESSION['error'] = "Email & Password is required";
            header("location: form_addlogin.php");
        }
    }

?>