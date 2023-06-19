<?php
$server='localhost';
$user='root';
$password='';
$con=mysqli_connect($server,$user,$password);
mysqli_select_db($con,'agromap');

if(isset($_POST['userid']))
{

$userid=$_POST['userid'];
$password=$_POST['password'];

$query="select * from login where user_id='".$userid."' AND password='".$password."'limit 1";
$role="select role_id from login where user_id='".$userid."' AND password='".$password."'limit 1";

$result=mysqli_query($con,$query);
mysqli_query($con,$role);
$result = $con->query($role);
$roleid = $result->fetch_array()[0] ?? '';
if(mysqli_num_rows($result)==1)
{
    session_start();
    $_SESSION['userid']=$userid;
    echo $roleid;

    if($roleid==2)
    {
        header('location:farmerhome.php');
    }
    else if($roleid==3)
    {
        header('location:customerhome.php');
    }
    else{
       header('location:admin.php');
    }
    exit();
    
}
else
{
    header('refresh:3; url=index.php');
    echo "<h2 align='center'>Wrong credentials Login was unsuccessfull</h2>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/login&register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
    <title>Login and Register</title>
</head>
<body style="background: url('images/img1.jpg');
            background-repeat: no-repeat;
            background-size: 100%;
            background-attachment: fixed;">
    
    <div class="maindiv">        
        <div class="heading"><h3>AgroMap</h3></div>
        <div class="form-box">

            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="togglebutton" onclick="login()">Login</button>
                <button type="button" class="togglebutton" onclick="register()" >Register</button>
            </div>

            <form method="POST" action="#" class="input" id="login">
                <input type="text" class="myinput" name='userid' placeholder="userid"  required>
                <input type="password" class="myinput" name='password' placeholder="password" required>

                <button type="submit"  class="submit-btn">Login</button>
            </form>

            <form class="input" id="register" method="POST" action="register.php">
                <input type="radio" style="margin-left: 20px;" name="role" value="farmer">
                <label>Farmer</label>
                <input type="radio"  name="role" value="customer">
                <label>Customer</label>

                <input type="text" name="user"class="myinput" id="usrid" placeholder="user id" pattern="[a-z][0-9]{3}"><label style="padding-left:25px;color:blue">Userid must be an alphabet followed by 3 digits</label>
                <input type="password" name="password" class="myinput" id="password" placeholder="set password">
                <input type="password" name="confirmpassword" class="myinput" id="confirmpassword" placeholder="confirm password">
                <input type="text" class="myinput" name="name" id="name" placeholder="Your name" required>
                <input type="text" class="myinput" name="phone" id="phone" placeholder="Your mobile number" pattern="[0-9]{10}" required>
                <input type="text" class="myinput" name="email" id="email" placeholder="email" required>
                <input type="text" class="myinput" name="address" id="address" placeholder="Your address" required>
                
                <button type="submit"  class="submit-btn">Register</button>
            </form>
            
        </div>
    </div>
   
    <script>
        var x=document.getElementById("login");
        var y=document.getElementById("register");
        var z=document.getElementById("btn");
        function register()
        {
            x.style.left="-400px";
            y.style.left="50px";
            z.style.left="110px";

        }
        function login()
        {
            x.style.left="50px";
            y.style.left="450px";
            z.style.left="0";

        }
    </script>
    
</body>
</html>