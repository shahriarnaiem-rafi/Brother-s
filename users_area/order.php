<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if (isset($_GET['user_id'])) {
    $user_id = intval($_GET['user_id']); // basic sanitization
}

$ip = getIPAddress();
$total_price = 0;
$invoice_number = mt_rand();
$status = "pending";

// Retrieve cart items for this IP
$cart_query = "SELECT * FROM cart_details WHERE ip_address='$ip'";
$result_cart = mysqli_query($con, $cart_query);
$count_products = mysqli_num_rows($result_cart);

while ($cart_row = mysqli_fetch_array($result_cart)) {
    $product_id = $cart_row['product_id'];
    $quantity = $cart_row['quantity'] == 0 ? 1 : $cart_row['quantity'];

    $product_query = "SELECT * FROM product WHERE product_id=$product_id";
    $product_result = mysqli_query($con, $product_query);
    $product_row = mysqli_fetch_array($product_result);

    $price = $product_row['product_price'];
    $total_price += $price * $quantity;

    // Insert into orders_pending for each product
    $insert_pending = "INSERT INTO orders_pending (user_id, invoice_number, product_id, quantity, order_status) 
                       VALUES ($user_id, $invoice_number, $product_id, $quantity, '$status')";
    mysqli_query($con, $insert_pending);
}

// Insert into user_orders
$insert_order = "INSERT INTO user_orders (user_id, amount_due, invoice_number, total_products, order_date, order_status) 
                 VALUES ($user_id, $total_price, $invoice_number, $count_products, NOW(), '$status')";
$result_order = mysqli_query($con, $insert_order);

if ($result_order) {
    echo "<script>alert('Orders are submitted successfully');</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}

// Empty the cart
$empty_cart = "DELETE FROM cart_details WHERE ip_address='$ip'";
mysqli_query($con, $empty_cart);
?>
