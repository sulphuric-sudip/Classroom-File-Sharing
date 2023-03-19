<?php
    session_start();
    if(!($_SESSION['logincheck'] == "admin_loggged_inn.")){
        header('location:..\loginpage.php');
    }else{
        header('location:files\preview.php');
    }
?>