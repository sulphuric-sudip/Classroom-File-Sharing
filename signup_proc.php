<?php

session_start();

$college = $_POST['college'];
$std_name = $_POST['std_name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$password = $_POST['password'];
$confpassword = $_POST['confpassword'];


if (empty($college)||empty($password)||empty($confpassword)||empty($subject)||empty($email)||empty($std_name)) {
	$_SESSION['err_msg'] = "Please provide all the data.";
	header('location:signup.php');

}

else{

	if ($password!=$confpassword) {
		$_SESSION['err_msg'] = "Password didn't matched.";
		header('location:signup.php');
	} else {

		session_start();
		include_once('includes/connection.php');

		$name = " SELECT * FROM user_1 WHERE email = '$email' ";

		$check = mysqli_query($connection, $name);

		$num = mysqli_num_rows($check);

		if($num == 1){
			$_SESSION['err_msg'] = "User with same email already exists. Login to continue.";
			header('location:signup.php');
		}
		else{
			$password = md5($password);
			$insert= "INSERT INTO user_1(`college`, `std_name`, `subject`, `email`, `password`) VALUES ('$college', '$std_name', '$subject', '$email', '$password' ) ";
			mysqli_query($connection, $insert);
			$_SESSION['err_msg'] = "Your account is created. Login to Continue.";
			header('location:loginpage.php');

		}
		mysqli_close($connection);
	}
}
?>