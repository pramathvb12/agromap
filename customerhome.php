<?php
session_start();

if(!(isset($_SESSION['userid'])))
{
  header('location:login&register.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Customer Home</title>
    <link rel="stylesheet" href="st1.css">
    <link rel="stylesheet" href="CSS/farmerhome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body style="background: url('images/test.jpg');
background-repeat: no-repeat;
background-size: 100%;
background-attachment: fixed;">
    <nav class="navbar navcustom navbar-expand-lg navbar-dark bg-success ">
        <div class="container-fluid">
          <a class="navbar-brand custom" href="index.php" style="text-transform:uppercase;">Agromap</a>
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

        <div class="div1">
          <div class="printusername">
            <h4 style="color: rgb(21, 139, 27);
            text-align:center;
            text-transform:uppercase;">Hello User&nbsp;
            <?php
            if(isset($_SESSION['userid']))
            {
              echo $_SESSION['userid'];
            }
            ?>
            </h4>
          </div>
        <div class="buttons">
          <button class="button" onclick="window.location.href = 'customercropview.php'">Order Crops</button> <br>
          <button class="button" onclick="window.location.href = 'customercroporders.php'">My orders</button> <br>
        </div>
        </div>
</body>
</html>