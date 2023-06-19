<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>search results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body style="background: url('images/img1.jpg');
background-repeat: no-repeat;
background-size: 100%;
background-attachment: fixed;">
<div>
  <form action="" method="post" >
  <input type="text" name="valueToSearch" placeholder="Search"></br>
  <input type="submit" name="valueToSearch" value="Search">
</form>
</div>
    <div class="container">
        <div class="tablename">
             <h3 align=center style="margin-bottom:40px;
             margin-top:20px;
             text-transform:uppercase;">result</h3>
        </div>
        
      <table class="table table-striped table-bordered">
          <thead class="table-dark">
        <tr>
          <th>Crop ID</th>
          <th>Crop name</th>
          <th>Crop type</th>
          <th>Crop category</th>
          <th>Quantity</th>
          <th>Cost per KG</th>
          <th>farmer_id</th>
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
         $valueToSearch = $_POST['valueToSearch'];
         $query = "SELECT c.crop_id,c.crop_name,c.crop_type,c.crop_category,c.quantity,c.cost,c.farmer_id from crop c where c.crop_name like ' $valueToSearch' ;";
         $result=$con->query($query);
         if($result)
         {
          while($row=$result->fetch_assoc())
          {
            echo "<tr><td>".$row["crop_id"]."</td>
            <td>".$row["crop_name"]."</td>
            <td>".$row["crop_type"]."</td>
            <td>".$row["crop_category"]."</td>
            <td>".$row["quantity"]."</td>
            <td>&#x20B9;".$row["cost"]."</td>
            <td>".$row["farmer_id"]."</td><tr>";
          }
          echo "</table>";
         }
         else{
              echo "<h2 align=center>No Crops to display</h2>";
         }
         $con->close();
         ?> 
      </table>
</div>
</body>
</html>