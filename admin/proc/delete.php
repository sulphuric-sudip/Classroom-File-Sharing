<?php
session_start();
if(!($_SESSION['logincheck'] == "admin_loggged_inn.")){
	header('location:../index.php');
}else{
	include_once('../includes/connection.php');
    if( $_GET['email']){
        $email = $_GET['email'];
        $query = " DELETE FROM `user_1` WHERE `email` = '$email' ";
		$action = mysqli_query($connection, $query);
        mysqli_close($connection);
    }
    header('location:verification.php');
}
?>
