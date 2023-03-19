
<link href="https://fonts.googleapis.com/css?family=Aleo&display=swap" rel="stylesheet">
<head>
      <title>Files</title>
</head>
<?php
session_start();
if(!($_SESSION['logincheck'] == "admin_loggged_inn.")){
	header('location:../loginpage.php');
}else{
	include_once('../includes/header.php');
	include_once('../includes/connection.php');
	$query = "SELECT * FROM files  order by ID desc ";
	$result = mysqli_query($connection, $query);
	$rows = mysqli_fetch_array($result);
	// LOOP TILL END OF DATA

	do{
			$sub_id = $rows['Subject_id'];
			$queryy = " SELECT * FROM `subject` where ID = '$sub_id'";
			$resultt = mysqli_query($connection, $queryy);
			$sub = mysqli_fetch_array($resultt);
		echo'
			<div class="container">
				<div  class="box">
				</div>
				<a href="delete_file.php?id='.$rows['ID'].'">
				<img class ="download" src="../images/delete_icon.png">
				</a>
				<span  class="caption"><b>'.$sub['name'].':</b>    '.$rows['Caption'].'</span>
				<a href="../../files/data/'.$rows['filename'].' " target="_blank">
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
        ?>
<?php
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
li{
	float:left;
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
	width:62px;
	height:62px;
	position:absolute;
	right:31px;
	top:47px;
	background-repeat:no-repeat;
	background-size:cover;
	list-style-type: none;
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