<?php 
session_start();
if(!($_SESSION['logincheck'] == "loggged inn.")){
  header('location:../loginpage.php');
}else{

  if(isset($_SESSION['pass_err_msg'])){
    echo '<script>alert("'.$_SESSION['pass_err_msg'].'")</script>';
    unset($_SESSION['pass_err_msg']);
  }
  include_once('../includes/header.php');
?>

<!DOCTYPE html>
<html>
<head>
      <meta name="viewport" content="width=device-width, initial-scale=1">    
      <title>Change Password</title>
</head>
<body>

<h2>Change Password:</h2>
    <form action="change_pass_proc.php" method="post">
        <label for="old_password">Old Password:</label>
        <input type="password" id="old_password" name="old_password">
        <br><br><br>
        <label for="password">New Password:</label>
        <input type="password" id="password" name="password">
        <br><br>
        <button type="submit" style="cursor: pointer;">Change Password</button>
    </form>
</body>
<?php
  include_once('../includes/footer.php');
?>
</html>

<?php
}
?>