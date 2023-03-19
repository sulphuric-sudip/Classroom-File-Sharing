<div class="header">
  <a class="heading">Student File Portal</a>
  <div class="header-right">
    <?php
    echo'<a><b>'.$_SESSION['user_name'].'</b></a>';
    ?>
    <a class="butnn" href="../logout.php">Logout</a>
  </div>
</div>

<div class="header">
    <a class="butnn" href="../files/preview.php">Files</a>
    <a class="butnn" href="../proc/change_pass.php">Change Password</a>
</div>

<style>

.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 20px 10px;
}

/* Style the header links */
.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  line-height: 25px;
  border-radius: 4px;
}

/* Style the logo link (notice that we set the same value of line-height and font-size to prevent the header to increase when the font gets bigger */
.header a.heading {
  font-size: 25px;
  font-weight: bold;
}

/* Change the background color on mouse-over */
.butnn{
  background-color: #ddd;
  color: black;
  margin:5px;
}

/* Style the active/current link*/
.header a.active {
  background-color: dodgerblue;
  color: white;
}

/* Float the link section to the right */
.header-right {
  float: right;
}

/* Add media queries for responsiveness - when the screen is 500px wide or less, stack the links on top of each other */
@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
} 
</style>