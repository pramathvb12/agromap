<?php
$server='localhost';
$user='root';
$password='';
$con=mysqli_connect($server,$user,$password);
mysqli_select_db($con,'agromap');

try
{
if(isset($_POST['user']))
{
    session_start();
    $radio=$_POST['role'];
    $userid=$_POST['user'];
    $_SESSION['userid']=$user;
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    $yourName = $con->real_escape_string($_POST['name']);
    $yourEmail = $con->real_escape_string($_POST['email']);
    $yourPhone = $con->real_escape_string($_POST['phone']);
    $addresses = $con->real_escape_string($_POST['address']);

    if($radio=='farmer')
    {
        $value=2;
    }
    else
    {
        $value=3;
    }
    
    $query="INSERT INTO `agromap`.`login` (`user_id`, `password`, `role_id`) VALUES ('$userid', '$password', $value);";
    if($password==$confirmpassword)
    {

        if($value==2)
        {
        
            $query1="INSERT INTO farmer (farmer_id,farmer_name,email,phone_number,city) VALUES ('$userid','".$yourName."','".$yourEmail."', '".$yourPhone."','".$addresses."')";
            mysqli_query($con,$query) && mysqli_query($con,$query1);
            header('refresh:3; url=index.php');
            echo "<h2 align=center>farmer registered successfully</h2>" ;
        }
        else if($value==3)
        {

            $query1="INSERT INTO customer (customer_id,customer_name,email,phone_number,city) VALUES ('$userid','".$yourName."','".$yourEmail."', '".$yourPhone."','".$addresses."')";
            mysqli_query($con,$query) && mysqli_query($con,$query1);
            header('refresh:3; url=index.php');
            echo "<h2 align=center>customer registered successfully</h2>" ;
        }

    }
    else{
        header('refresh:3; url=index.php');
        echo "<h2 align=center>password mismatch. try to register again</h2>" ;
    }
      
}
}
catch(Exception $e)
{
    echo "<h2 align=center>Choose different user id</h2>" ;
}
?>