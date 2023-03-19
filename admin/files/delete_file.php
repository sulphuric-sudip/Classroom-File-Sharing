<?php
session_start();
if(!($_SESSION['logincheck'] == "admin_loggged_inn.")){
	header('location:../index.php');
}else{
	include_once('../includes/connection.php');
    if( $_GET['id']){
        $id = $_GET['id'];
        
        $query = " SELECT * FROM `files` WHERE `ID` = '$id' ";
		$result = mysqli_query($connection, $query);
		$row= mysqli_fetch_assoc($result);
        $filename = $row['filename'];

        $filePath = '../../files/data/'.$filename.'';
        $destinationFilePath = '../../files/data/trash/'.$filename.'';
        rename($filePath, $destinationFilePath);

        unlink($filePath);
        $query = " DELETE FROM `files` WHERE `ID` = '$id' ";
		$action = mysqli_query($connection, $query);
    }
    header('location:preview.php');
    mysqli_close($connection);
}
?>
