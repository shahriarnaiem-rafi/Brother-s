<?php
include('../includes/connect.php');
include('../functions/common_function.php');
// session_start();

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];

}
// getting total items and total pice of all items
$ip=getIPAddress();
$total_price=0;
$cart_query_price="select * from cart_details where ip_address='$ip'";
$result_cart_price=mysqli_query($con,$cart_query_price);

$count_products=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['product_id'];
    $select_products="select * from product where product_id=$product_id";
    $run_price=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($run_price)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>order</h2>
</body>

</html>