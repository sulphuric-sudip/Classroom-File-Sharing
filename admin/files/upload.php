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
      <title>Upload a file</title>
</head>

<body>
    
    <form action="upload_proc.php" method="post" enctype="multipart/form-data">
    <h2>Upload a File</h2>
    <label for="subject">Select a Subject:</label>
        <select name="subject" id="subject">
          <?php
            include_once('../includes/connection.php');
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

        <label for="caption">Caption:</label>
        <input type="text" id="caption" name="caption">
        <br><br>

        <div class="upload-container">
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <br>
        <button type="submit" style="cursor: pointer;">Upload</button>
    </form>
</body>
<?php
  include_once('../includes/footer.php');
?>
<style>
    .upload-container {
        position: relative;
    }
    .upload-container input {
        border: 1px solid #92b0b3;
        background: #f1f1f1;
        outline: 2px dashed #92b0b3;
        outline-offset: -10px;
        padding: 100px 0px 100px 80px;
        text-align: center !important;
        width: 100%;
    }
    .upload-container input:hover {
        background: #ddd;
    }   
    .upload-container:before {
        position: absolute;
        bottom: 50px;
        /* align:center; */
        left: 80px;
        content: " (or) Drag and Drop files here. ";
        color: #3f8188;
        font-weight: 900;
    }   
    .upload-btn {
        /* align:center; */
        margin-left: 80px;
        padding: 7px 20px;
    }  
    
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
</html>

<?php
}
?>