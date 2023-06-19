<?php
$server='localhost';
$user='root';
$password='';
$con=mysqli_connect($server,$user,$password);
mysqli_select_db($con,'agromap');
session_start();

$userid=$_SESSION['userid'];
if(isset($_POST['order']))
{
    $value=$_POST['order'];
    $quantity_required=$_POST['quantity_required'];

    $query1="SELECT farmer_id from crop where crop_id=$value";
    $result=mysqli_query($con,$query1);
    $f_id = $result->fetch_array()[0] ?? '';
    
    $query2="SELECT cost from crop where crop_id=$value";
    $result1=mysqli_query($con,$query2);
    $cost = $result1->fetch_array()[0] ?? '';
    $totalcost=$quantity_required*$cost;

    $query3="SELECT quantity from crop where crop_id=$value";
    $result3=mysqli_query($con,$query3);
    $quantity_available = $result3->fetch_array()[0] ?? '';

    if($quantity_required>$quantity_available)
    {
        header('refresh:3; url=customercropview.php');
        echo "<h2 style='text-align:center;
        margin-top:10%;color:red;
        text-transform:uppercase;'>Your required quantity exceeds the available quantity<br>Your order cannot be placed</h2>";
    }
    else
    {
    $query4="INSERT into crop_orders (crop_id,customer_id,farmer_id,quantity,total_cost) values($value,'$userid','$f_id',$quantity_required,$totalcost)";
    $res=mysqli_query($con,$query4);
    if($res)
    {
        header('refresh:3; url=customercropview.php');
        echo "<h2 align=center>Your order is placed successfully</h3>";
        $queryupdate="UPDATE crop set quantity=quantity-$quantity_required where crop_id=$value";
        mysqli_query($con,$queryupdate);
        $query5="select quantity from crop where crop_id=$value";
        $result2=mysqli_query($con,$query5);
        $available_quantity = $result2->fetch_array()[0] ?? '';

        if($available_quantity<=0)
        {
            $deletequery="DELETE from crop where crop_id=$value";
            mysqli_query($con,$deletequery);
        }
        
    }
    else{
        echo "<h2 align=center>Unable to place the order</h3>";
    }
}

}
?>