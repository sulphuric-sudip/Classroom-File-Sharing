<?php 
session_start();
if(!($_SESSION['logincheck'] == "admin_loggged_inn.")){
  header('location:../../loginpage.php');
}else{

  if(isset($_SESSION['file_err_msg'])){
    echo '<script>alert("'.$_SESSION['file_err_msg'].'")</script>';
    unset($_SESSION['file_err_msg']);
  }
  include_once('../includes/header.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">    
      <title>Subjects List</title>
</head>

<body>

<h2>Subject List:</h2>
<?php
    include_once('../includes/connection.php');
    $query = "SELECT * FROM `subject` ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0){
        $rows = mysqli_fetch_array($result);
        do{
            echo''.$rows['name'].'<br>';
        }while($rows=$result->fetch_assoc());
    }
    mysqli_close($connection);
?>

    <form action="subject.php" method="post">
    <h2>Add Subject</h2>
        <label for="sub_name">Name:</label>
        <input type="text" id="sub_name" name="sub_name">
        <br>
        <button type="submit" style="cursor: pointer;">Add</button>
    </form>
</body>
<?php
  include_once('../includes/footer.php');
?>
</html>

<?php
}
?>