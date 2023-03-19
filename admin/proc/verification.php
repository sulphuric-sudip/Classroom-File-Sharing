<head>
      <title>Users List</title>
</head>


<?php
session_start();
if(!($_SESSION['logincheck'] == "admin_loggged_inn.")){
	header('location:../loginpage.php');
}else{
	include_once('../includes/header.php');
	include_once('../includes/connection.php');


    echo'<h2>Students to Verify:</h2>';

    $query = "SELECT * FROM user_1 where `verified` = '0' order by ID desc ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0){
        echo'<table style="width:100%">
    
        <tr>
      <th>Name</th>
      <th>College Name</th> 
      <th>Subject</th>
      <th>Email</th>
      <th>Action</th>
    </tr>';
        $rows = mysqli_fetch_array($result);
        do{
            $sub_id = $rows['subject'];
			$queryy = " SELECT * FROM `subject` where ID = '$sub_id' ";
			$resultt = mysqli_query($connection, $queryy);
			$sub = mysqli_fetch_array($resultt);
            echo'
                <tr>
                    <td>'.$rows['std_name'].'</td>
                    <td>'.$rows['college'].'</td>
                    <td>'.$sub['name'].'</td>
                    <td>'.$rows['email'].'</td>
                    <td><a href = "verify.php?email='.$rows['email'].' ">verify</a><p>     </p>
                    <a href = "delete.php?email='.$rows['email'].' ">Remove User</a></td>
                </tr>';
        }while($rows=$result->fetch_assoc());
        echo'</table>';
    }else{
        echo'<h3>No new user to be verified.</h3>';
    }




    echo'<h2>Student List:</h2>';

    $query = "SELECT * FROM user_1 where `verified` = '1' and `admin` = '0' order by ID desc ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0){
        echo'<table style="width:100%">
    
        <tr>
      <th>Name</th>
      <th>College Name</th> 
      <th>Subject</th>
      <th>Email</th>
      <th>Action</th>
    </tr>';
        $rows = mysqli_fetch_array($result);
        do{
            $sub_id = $rows['subject'];
			$queryy = " SELECT * FROM `subject` where ID = '$sub_id' ";
			$resultt = mysqli_query($connection, $queryy);
			$sub = mysqli_fetch_array($resultt);
            echo'
                <tr>
                    <td>'.$rows['std_name'].'</td>
                    <td>'.$rows['college'].'</td>
                    <td>'.$sub['name'].'</td>
                    <td>'.$rows['email'].'</td>
                    <td><a href = "admin.php?email='.$rows['email'].' ">Make Admin</a><p>     </p>
                    <a href = "delete.php?email='.$rows['email'].' ">Remove User</a></td>
                </tr>';
        }while($rows=$result->fetch_assoc());
        echo'</table>';
    }else{
        echo'<h3>Empty.</h3>';
    }


    echo'<h2>Admin List:</h2>';

    $query = "SELECT * FROM user_1 where `verified` = '1' and `admin` = '1' order by ID desc ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0){
        echo'<table style="width:100%">
    
        <tr>
      <th>Name</th>
      <th>College Name</th> 
      <th>Email</th>
    </tr>';
        $rows = mysqli_fetch_array($result);
        do{
            $sub_id = $rows['subject'];
			$queryy = " SELECT * FROM `subject` where ID = '$sub_id' ";
			$resultt = mysqli_query($connection, $queryy);
			$sub = mysqli_fetch_array($resultt);
            echo'
                <tr>
                    <td>'.$rows['std_name'].'</td>
                    <td>'.$rows['college'].'</td>
                    <td>'.$rows['email'].'</td>
                </tr>';
        }while($rows=$result->fetch_assoc());
        echo'</table>';
    }else{
        echo'<h3>Empty.</h3>';
    }
    mysqli_close($connection);
}
?>
<?php
  include_once('../includes/footer.php');
?>
<style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
         h2 {
           text-align: center;
            color: #006600;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
    </style>