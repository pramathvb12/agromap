<?php

session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'agromap');

if ($con->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['confirmpassword']))
{
    $userid=$_POST['userid'];
    $pwd=$_POST['password'];
    $cnf=$_POST['confirmpassword'];
    if($pwd==$cnf)
    {
        $query="INSERT INTO `agromap`.`login` (`user_id`, `password`, `role_id`) VALUES ('$userid', '$pwd', 1);";
    mysqli_query($con,$query);
    header('location:admin.php');
    }
    else{
        echo "password doesn't match";
    }
}
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add admin</title>
    <link rel="stylesheet" href="CSS/login&register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body
style="background: url('images/img1.jpg');
background-repeat: no-repeat;
background-size: 100%;
background-attachment: fixed;">
    
    <div class="maindiv">        
    <div class="heading" style='text-align:center;color:blue;text-transform:uppercase;'><h3>add admin</h3></div>
        
        <div class="form-box">
           
            <form method="POST" action="#">
                <input type="text" class="myinput" name='userid' placeholder="userid"  required>
               
                <input type="password" class="myinput" name='password' placeholder="set password" required>
                <input type="password" name="confirmpassword" id="confirmpassword" class="myinput" placeholder="confirm password" required>
                <button type="submit"  class="submit-btn">Add</button>
            </form>    
    </div>
</div>
</body>
</html>