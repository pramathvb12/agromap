<?php
  $con=mysqli_connect('localhost','root','');
  $cid=$_POST['customer'];
  session_start();

  if($con->connect_error)
  {
    die("Connection error");
  }

  mysqli_select_db($con,'agromap');
  $deletequery="DELETE from login where user_id='$cid'";
  $result=mysqli_query($con,$deletequery);
  if($result)
  {
      header('refresh:3; url=admincustomerview.php');
        echo "<h2 style='text-align:center;
        margin-top:10%;color:red;
        text-transform:uppercase;'>admin deleted the selected customer successfully</h2>";
  }
  ?>