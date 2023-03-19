<?php 

//$connection= mysqli_connect(host, username, password);								
$connection= mysqli_connect('sql208.epizy.com','epiz_32106959','1jJCmNYdba7');

if(!$connection){
	echo "         ****not connection to host****<br>";
}

// $database = mysqli_select_db($connection, database_name);
$database = mysqli_select_db($connection, 'epiz_32106959_file_portal');

if(!$database){
	echo "  *****database not selected***** <br>";
}

 ?>