<?php
  $con=mysqli_connect('localhost','root','');
  $crpid=$_POST['del'];
  session_start();

  if($con->connect_error)
  {
    die("Connection error");
  }
  
  mysqli_select_db($con,'agromap');
  $deletequery="DELETE from crop where crop_id=$crpid";
  mysqli_query($con,$deletequery);
  header('refresh:3; url=admincropview.php');
        echo "<h2 style='text-align:center;
        margin-top:10%;color:red;
        text-transform:uppercase;'>selected crop is deleted by admin</h2>";
  ?>