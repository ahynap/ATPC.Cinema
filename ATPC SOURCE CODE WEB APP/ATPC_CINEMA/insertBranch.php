<?php 
    session_start();
    include('server.php'); 
	$errors = array();
?>
<?php

if (isset($_POST['add_branch'])) {
	$BranchName = mysqli_real_escape_string($conn, $_POST['BranchName']);
	$Region = mysqli_real_escape_string($conn, $_POST['Region']);
	$ManagerOfBranch = mysqli_real_escape_string($conn, $_POST['ManagerOfBranch']);
	$Location = mysqli_real_escape_string($conn, $_POST['Location']);
	$TheatreInEachBranch = mysqli_real_escape_string($conn, $_POST['TheatreInEachBranch']);
	$Staff = mysqli_real_escape_string($conn, $_POST['Staff']);
	$Phone = mysqli_real_escape_string($conn, $_POST['Phone']);

	if (empty($BranchName)) {
		array_push($errors, "branch name is required");
		$_SESSION['error'] = "branch name is required";
	}
	if (empty($Region)) {
		array_push($errors, "region is required");
		$_SESSION['error'] = "region is required";
	}
	if (empty($Location)) {
		array_push($errors, "location is required");
		$_SESSION['error'] = "location is required";
	}

    $user_check_query = "SELECT * FROM Branch WHERE BranchName = '$BranchName' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { 
            if ($result['BranchName'] == $BranchName) {
                array_push($errors, "this branch already exists");
                $_SESSION['error'] = "this branch already exists";
            }
        }

		if (count($errors) == 0) {
            $sql = "
			INSERT INTO Branch (BranchName, Region, ManagerOfBranch,Location,TheatreInEachBranch,Staff,Phone)
			VALUES ('$BranchName','$Region','$ManagerOfBranch','$Location','$TheatreInEachBranch','$Staff','$Phone');
			";

            $_SESSION['BranchName'] = $BranchName;
            $_SESSION['success'] = "Your branch are now add";

            if (mysqli_query($conn, $sql)) 
            {
                $id = mysqli_insert_id($conn);
                echo "Your Branch ID is: " . $id; ?>
                </br>
                <button type="submit" class="btnontop" 
                onclick= "document.location = 'form_addBranch.php' "> back </button>
                </br>
                <?php
            } 

        } else {
            header("location: form_addBranch.php");
        }
    }
?>