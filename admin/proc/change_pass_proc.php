<?php
session_start();
if(!($_SESSION['logincheck'] == "admin_loggged_inn.")){
	header('location:../index.php');
}else{
    $old_password = $_POST['old_password'];
    $password = $_POST['password'];

    if(empty($old_password)||empty($password)){
        $_SESSION['pass_err_msg'] = "Don't provide empty value.";
    }else{
        include_once('../includes/connection.php');
        $old_password = md5($old_password);
        $password = md5($password);

        $admin_id = $_SESSION['admin_id'];
        $query= " SELECT * FROM user_1 WHERE ID = '$admin_id' ";
	    $run = mysqli_query($connection, $query);
        $user = mysqli_fetch_assoc($run);

        if($user['password'] == $old_password){
            $queryy = " UPDATE `user_1` SET `password` = '$password' WHERE `ID` = '$admin_id' ";
		    $action = mysqli_query($connection, $queryy);
            mysqli_close($connection);
            $_SESSION['pass_err_msg'] = " Password Updated Sucessfully.";
        }else{
            $_SESSION['pass_err_msg'] = " Old password doesnot matched.";

        }
	    header('location:change_pass.php');
    }
}
?>