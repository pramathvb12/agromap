<?php
  session_start();

  if(!(isset($_SESSION['userid'])))
{
  header('location:login&register.php');
}
  $adminid=$_SESSION['userid'];
  $con=mysqli_connect('localhost','root','');
  mysqli_select_db($con,'agromap');
 
  $query="select count(*) as total from crop;";
  $result=mysqli_query($con,$query);
  $data=mysqli_fetch_assoc($result);

  $query1="select count(*) as total1 from crop_orders;";
  $result1=mysqli_query($con,$query1);
  $data1=mysqli_fetch_assoc($result1);

  $query2="select count(*) total2 from farmer;";
  $result2=mysqli_query($con,$query2);
  $data2=mysqli_fetch_assoc($result2);

  $query3="select count(*) total3 from customer;";
  $result3=mysqli_query($con,$query3);
  $data3=mysqli_fetch_assoc($result3);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="st1.css">
    <link rel="stylesheet" href="CSS/farmerhome.css">
    <link rel="stylesheet" href="CSS/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      .column:hover
      {
        background-color: #363945;
      }
      .button
      {
        background-color:blue;
        border-radius:10px;
        text-transform:uppercase; 
      }
      .button:hover
      {
        background-color:green;
      }
    </style>
</head>
<body style="background: url('images/homebg.jpg');
background-repeat: no-repeat;
background-size: 100%;
background-attachment: fixed;">
    <nav class="navbar navcustom navbar-expand-lg navbar-dark bg-success ">
        <div class="container-fluid">
          <a class="navbar-brand custom" href="index.php" style="text-transform:uppercase;">agromap</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active custom1" aria-current="page" href="index.php"><i class="fa fa-home" style="font-size:26px"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link custom1" href="login&register.php">Login/Signup</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link custom1" href="logout.php"><i class="fa fa-sign-out" style="font-size:22px"></i></a>
                </li>
            </ul>
          </div>
        </div>
      </nav>

            <h3 style="color: rgb(255,255,255);
            text-transform: uppercase;
            margin-left:3%;
            margin-top:2%;
             font-family: 'Arial';
             text-align:center;">Hello &nbsp;<?php
            if(isset($_SESSION['userid']))
            {
              echo $_SESSION['userid'];
            }
            else{
              header('location:login&register.php');
            }?></h3>

          <div class="container1">
          <h3 style="color: rgb(255,255,255);
          text-transform: uppercase;">Dashboard</h3>
           
          <div class="row">
            <div  class="column "><h4 style="font-family: 'Arial';">Total Crops :<h4><?php echo $data['total'];?></h4></h4></div>
            <div class="column"><h4 style="font-family: 'Arial';">Total orders placed:</h4><h4><?php echo $data1['total1'];?></h4></div>
            <div class="column"><h4 style="font-family: 'Arial';">Total Farmers registered:</h4><h4><?php echo $data2['total2'];?></h4></div>
            <div class="column"><h4 style="font-family: 'Arial';">Total Customers registered:</h4><h4><?php echo $data3['total3'];?></h4></div>
           </div>
           </div>

  <div class="buttons">
    <button class="button" onclick="window.location.href = 'admincropview.php'">View crops</button> <br>
    <button class="button" onclick="window.location.href = 'adminfarmerview.php'">View Farmer information</button> <br>
    <button class="button" onclick="window.location.href = 'admincustomerview.php'">View Customer information</button> 
    <button class="button" onclick="window.location.href = 'adminordersview.php'">View Order information</button> 
    <button class="button" onclick="window.location.href = 'addadmin.php'">Add admin</button> 
  </div>

</body>
</html>