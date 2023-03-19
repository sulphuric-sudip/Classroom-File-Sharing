<?php 

  session_start();
  if(isset($_SESSION['err_msg'])){
    echo '<script>alert("'.$_SESSION['err_msg'].'")</script>';
    unset($_SESSION['err_msg']);
  }
  session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    
      <title>Sign Up</title>
      <script src="includes/jquery.js"></script>

  </head>
  <body>
    <form action="signup_proc.php" method="post">

      <h2>Student File Sharing Portal</h2>
      <h2>Sign Up</h2>
      <h4>Already has an account? <a href="loginpage.php">Login</a></h4>

      <fieldset>
        
        <label for="college">College Name:</label>
        <input type="text" id="college" name="college" value="Sagarmatha Engineering College">

        <label for="std_name">Student Name:</label>
        <input type="text" id="std_name" name="std_name">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <label for="subject">Select a Subject:</label>
        <select name="subject" id="subject">
          <?php
            include_once('includes/connection.php');
            $query = "SELECT * FROM `subject` order by ID";
            $result = mysqli_query($connection, $query);
            $rows = mysqli_fetch_array($result);
            // LOOP TILL END OF DATA

            do{
              echo'<option value="'.$rows['ID'].'">'.$rows['name'].'</option>';
        
          }while($rows=$result->fetch_assoc());
          mysqli_close($connection);
          ?>
          </select>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" onkeyup="passcheck();">

        <label for="confpassword">Confirm Password:</label>
        <input type="password" id="confpassword" name="confpassword"  onkeyup="passcheck();">

        <h5 id="passcheck"></h5>
      </fieldset>

          
      <button type="submit" style="cursor: pointer;">Sign Up</button>
    </form>

  </body>
<?php
include_once('includes/footer.php');
?>
</html>


<script type="text/javascript">

function passcheck(){
  
  if (($('#password').val()!='')&&($('#confpassword').val()!=='')) {

    if( $('#password').val()  == $('#confpassword').val() ){
      $('#passcheck').html("Password Matched.");
    }else{
      $('#passcheck').html("Password didn't matched!!!");
    }
  }
}

</script>


<style type="text/css">
*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito', sans-serif;
  color: #384047;
}



form {
  max-width: 500px;
  margin: auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 30px;
}

h1,h2,h3,h4,h5{
  text-align: center;
}

input[type="text"],
input[type="email"],
input[type="password"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height:25px;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 15px;
  border-radius: 30px;
}

input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 33px;
  border-radius: 30px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #4bc970;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #3ac162;
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  border-radius: 30px;
}

fieldset {
  margin-bottom: 10px;
  border: none;
}



label {
  display: block;
  
}

label.light {
  font-weight: 300;
  display: inline;
}


@media screen and (min-width: 480px) {

  form {
    max-width: 480px;
  }

}

</style>