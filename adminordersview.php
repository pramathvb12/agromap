<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
<div class="tablename">
    <h3 style="color:black;text-align:center;padding:2%;text-transform:uppercase;">All orders placed</h3>
</div>
<div class="noresults">
</div>
<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
 <th>Crop ID</th>
 <th>Farmer ID</th>
 <th>Customer ID</th>
 <th>Quantity</th>
 <th>Total cost</th>
 <th>Ordered date and time</th>
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
$query="SELECT o.crop_id,o.farmer_id,o.customer_id,o.total_cost,o.quantity,o.dateandtime from crop_orders o";
$result=$con->query($query);
if($result->num_rows>0)
{
  while($row=$result->fetch_assoc())
  {
    
    echo "<tr><td>".$row["crop_id"]."</td>
    <td>".$row["farmer_id"]."</td>
    <td>".$row["customer_id"]."</td>
    <td>".$row["quantity"]."</td>
    <td>&#8377;".$row["total_cost"]."</td>
    <td>".$row["dateandtime"]."</td><tr>";
    
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