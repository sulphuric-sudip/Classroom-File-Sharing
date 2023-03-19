<?php
session_start();
if(!($_SESSION['logincheck'] == "admin_loggged_inn.")){
	header('location:../index.php');
}else{
	include_once('../includes/connection.php');
    if( $_GET['email']){
        $email = $_GET['email'];
        $query = " UPDATE `user_1` SET `verified` = '1' WHERE `email` = '$email' ";
		$action = mysqli_query($connection, $query);
        mysqli_close($connection);
    }
    header('location:verification.php');
}
?>
