<?php
  $con=mysqli_connect('localhost','root','');
  $fid=$_POST['farmer'];
  session_start();
  if($con->connect_error)
  {
    die("Connection error");
  }
  mysqli_select_db($con,'agromap');
  $deletequery="DELETE from login where user_id='$fid'";
  $result=mysqli_query($con,$deletequery);
  if($result)
  {
    header('refresh:3; url=adminfarmerview.php');
    echo "<h2 style='text-align:center;
    margin-top:10%;color:red;
    text-transform:uppercase;'>selected farmer is deleted successfully by admin</h2>";
  }
?>