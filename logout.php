<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log out</title>
</head>
<body style="background: url('images/img1.jpg');
background-repeat: no-repeat;
background-size: 100%;
background-attachment: fixed;">
  <?php
session_start();
session_unset();
session_destroy();
header('refresh:4;url=index.php');
echo "<h2 align='center' style='margin-top:20%;margin-top:15%;color:blue;text-transform:uppercase;font-size: 300%;'>Logged out successfully</h2>";
?> 
</body>
</html>