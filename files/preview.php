
<link href="https://fonts.googleapis.com/css?family=Aleo&display=swap" rel="stylesheet">
<head>
      <title>Files</title>
</head>
<?php
session_start();
if(!($_SESSION['logincheck'] == "loggged inn.")){
	header('location:../loginpage.php');
}else{
	include_once('../includes/header.php');
	include_once('../includes/connection.php');
	$sub_id = $_SESSION['subject'];
	$query = " SELECT * FROM `subject` where ID = '$sub_id' ";
	$result = mysqli_query($connection, $query);
	$rows = mysqli_fetch_array($result);
	echo'<h2>Subject: '.$rows['name'].'</h2>';

	$query = "SELECT * FROM `files` where Subject_id ='$sub_id' order by ID desc ";
	$result = mysqli_query($connection, $query);
	$rows = mysqli_fetch_array($result);
	// LOOP TILL END OF DATA

	do{
		echo'
			<div class="container">
				<div  class="box">
				</div>
				<a href="data/'.$rows['filename'].' " target="_blank" download="'.$rows['filename_org'].'">
				<img class ="download" src="../images/download_icon.png">
				</a>
				<span  class="caption">'.$rows['Caption'].'</span>
				<a href="data/'.$rows['filename'].' " target="_blank">
				<span  class="filename">'.$rows['filename_org'].'</span></a>
				<div  class="avatar">
				</div>
				<span  class="username">'.$rows['owner'].'</span>
				<span  class="date">'.$rows['time'].'</span>
			</div>
		';
	}while($rows=$result->fetch_assoc());
	mysqli_close($connection);
}
include_once('../includes/footer.php');
?>
<style>

.container { 
	overflow:hidden;
}
.container { 
	height:134px;
	position:relative;
	margin: 15px
}
.box { 
	box-shadow:0px 4px 4px rgba(0, 0, 0, 0.25);
	background-color:#135a70;
	height:134px;
	position:relative;
	left:0px;
	top:0px;
	border-top-left-radius:20px;
	border-top-right-radius:20px;
	border-bottom-left-radius:20px;
	border-bottom-right-radius:20px;
}
.download { 
	width:66px;
	height:41px;
	position:absolute;
	right:31px;
	top:47px;
	background-repeat:no-repeat;
	background-size:cover;
}
.caption { 
	color:rgba(255, 255, 255, 1);
	height:20px;
	position:absolute;
	left:31px;
	top:80px;
	font-family:Aleo;
	text-align:left;
	font-size:18px;
	letter-spacing:0;
}
.filename { 
	color:rgba(255, 156.00000590085983, 0, 1);
	height:18px;
	position:absolute;
	left:31px;
	top:100px;
	font-family:Aleo;
	text-align:left;
	font-size:16px;
	letter-spacing:0;
}
.avatar { 
	width:42px;
	height:51px;
	position:absolute;
	left:31px;
	top:16px;
	background-image:url(../images/file_icon.png);
	background-repeat:no-repeat;
	background-size:cover;
}
.username { 
	color:rgba(255, 255, 255, 1);
	height:20px;
	position:absolute;
	left:107px;
	top:21px;
	font-family:Aleo;
	text-align:left;
	font-size:18px;
	letter-spacing:0;
}
.date { 
	color:rgba(255, 255, 255, 1);
	height:16px;
	position:absolute;
	left:107px;
	top:45px;
	font-family:Aleo;
	text-align:left;
	font-size:14px;
	letter-spacing:0;
}
</style>