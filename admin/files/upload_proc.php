<?php
session_start();
$randomstr = uniqid();
$target_path = "../../files/data/".$randomstr."";
$target_path = $target_path.basename( $_FILES['fileToUpload']['name']);
$uploadfile = 1;
$file_name_changed ="".$randomstr."";
$file_name_changed = $file_name_changed.basename( $_FILES['fileToUpload']['name']);

$file_name ="";
$file_name = $file_name.basename( $_FILES['fileToUpload']['name']);

if(isset($_POST["submit"])) {
    $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      $uploadfile = 1;
    } else {
      $uploadfile = 0;
      $_SESSION['file_err_msg'] = "FIle is empty.";
		header('location:upload.php');
    }
}

$subject= $_POST['subject'];
$caption = $_POST['caption'];

if (empty($subject)) {
    $uploadfile = 0;
	$_SESSION['file_err_msg'] = "Subject shouldnot be empty.";
		header('location:upload.php');
}else{
    // Check if $uploadfile is set to 0 by an error
    if ($uploadfile == 0) {
        $_SESSION['file_err_msg'] = "Sorry, file was not uploaded.";
		header('location:upload.php');
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_path)) {
            $admin = $_SESSION['admin_name'];
            include_once('../includes/connection.php');
            $insert1 = "INSERT INTO files (Subject_id, Caption, `filename`, filename_org, `owner`) VALUES ('$subject', '$caption', '$file_name_changed', '$file_name', '$admin')";
            mysqli_query($connection, $insert1);
            $_SESSION['file_err_msg'] = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
		    header('location:upload.php');
        } else {
            $_SESSION['file_err_msg'] = "Sorry, there was an error uploading your file.";
		    header('location:upload.php');
        }
        mysqli_close($connection);
    }
}