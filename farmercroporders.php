<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Orders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
     .tablename
     {
       text-align: center;
       text-transform: uppercase;
       padding: 2%;
       text-decoration: underline;
     }

     tr:hover{
       background:#0002;
     }

     tr td
     {
       color:white;
     }
    </style>   
</head>

<body style="background: url('images/img1.jpg');
background-repeat: no-repeat;
background-size: 100%;
background-attachment: fixed;">
  <div class="container">
    <div class="tablename">
         <h3 style="color:black;
         text-transform:uppercase;
         text-decoration:none;">Your orders</h3>
    </div>
    <div class="noresults"></div>
  <table style="background:#0006;"class="table table-striped table-bordered">
    <tr style="color:white;" >
     <thead class="table-dark">
      <th>Crop ID</th>
      <th>Customer ID</th>
      <th>Total Cost</th>
      <th>Quantity</th>
      <th>Ordered received date and time</th>
      </tr>
      </thead>

     <?php
     $con=mysqli_connect('localhost','root','');
     if($con->connect_error)
     {
       die("Connection error");
     }
     mysqli_select_db($con,'agromap');
     session_start();
     $user_id=$_SESSION['userid'];
     $query="SELECT crop_id,customer_id,quantity,total_cost,dateandtime from crop_orders where farmer_id='$user_id'";
     $result=$con->query($query);
     if($result->num_rows>0)
     {
       while($row=$result->fetch_assoc())
       {
         echo "<tr><td style='color:white;'>".$row["crop_id"]."</td>
         <td style='color:white;'>".$row["customer_id"]."</td>
         <td style='color:white;'>&#8377;".$row["total_cost"]."</td>
         <td style='color:white;'>".$row["quantity"]."</td>
         <td style='color:white;'>".$row["dateandtime"]."</td><tr>";
       }
       echo "</table>";
     }
     else{
       echo "<h2 align=center>No Orders to show<h2>";
     }
     $con->close();

     ?> 
  </table>
</div>
</body>
</html>