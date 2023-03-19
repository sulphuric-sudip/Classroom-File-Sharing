<?php
    session_start();
    if(!($_SESSION['logincheck'] == "loggged inn.")){
        header('location:loginpage.php');
    }else{
        header('location:files\preview.php');
    }
?>