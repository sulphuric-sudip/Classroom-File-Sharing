<?php
session_start();
if(!($_SESSION['logincheck'] == "admin_loggged_inn.")){
	header('location:../index.php');
}else{
    $sub_name = $_POST['sub_name'];
    if(empty($sub_name)){
        $_SESSION['file_err_msg'] = "Name is empty.";
		header('location:add_subject.php');
    }else{
        include_once('../includes/connection.php');
        $insert= "INSERT INTO `subject`(`name`) VALUES ('$sub_name') ";
		mysqli_query($connection, $insert);
        mysqli_close($connection);
        header('location:add_subject.php');
    }
	
}
?>
