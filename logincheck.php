<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($email)||empty($password)) {
	$_SESSION['err_msg'] = "All fields are compulsory.";
	header('location:loginpage.php');
}else{
	require_once('includes/connection.php');
	$name = " SELECT * FROM user_1 WHERE email = '$email' ";
	$namecheck = mysqli_query($connection, $name);

	if(mysqli_num_rows($namecheck) == 1){//user found
		$password = md5($password);
		$query = " SELECT * FROM user_1 WHERE `email` = '$email' AND `password` = '$password' ";
		$result = mysqli_query($connection, $query);

		if(mysqli_num_rows($result)== 1){//password is correct

			//check verified or not
			$row= mysqli_fetch_assoc($result);
			if($row['verified'] == '1'){
				//admin check
				if($row['admin'] == '1'){
					$_SESSION['admin_id'] = $row['ID'];
					$_SESSION['admin_name'] = $row['std_name'];
					$_SESSION['logincheck'] = "admin_loggged_inn.";
					header('location:admin/index.php');
				}else{
					$_SESSION['user_id'] = $row['ID'];
					$_SESSION['user_name'] = $row['std_name'];
					$_SESSION['subject'] = $row['subject'];
					$_SESSION['logincheck'] = "loggged inn.";
					header('location:index.php');
				}
			}else{
				$_SESSION['err_msg'] = "User is not verified by Admin. Wait till verification.";
				header('location:loginpage.php');
			}

		}else{
			$_SESSION['err_msg'] = "Password is wrong.";
			header('location:loginpage.php');
		}

	}else{
		$_SESSION['err_msg'] = "User is not registered. Register to continue.";
		header('location:loginpage.php');
	}
	mysqli_close($connection);
}

?>