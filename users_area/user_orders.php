<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All My Orders</title>
</head>

<body>
    <?php
    $username = $_SESSION['username'];
    $get_user = "select * from user_table where username='$username'";
    $result = mysqli_query($con, $get_user);
    $row_fetch = mysqli_fetch_assoc($result);
    $user_id = $row_fetch['user_id'];


    ?>
    <h1 class="text-success text-center mt-4">All My Orders</h1>

    <div class="container mt-5">
        <table class="table table-bordered">
            <thead class="bg-info text-white">
                <tr>
                    <th>Sl No</th>
                    <th>Amount Due</th>
                    <th>Total Products</th>
                    <th>Invoice Number</th>
                    <th>Date</th>
                    <th>Complete/incomplete</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody class="bg-secondary text-light">
                <?php
                $get_order_details = "select * from user_orders where user_id='$user_id'";

                $result_orders = mysqli_query($con, $get_order_details);
                while ($row_orders = mysqli_fetch_assoc($result_orders)) {
                    $order_id = $row_orders['order_id'];
                    $amount_due = $row_orders['amount_due'];
                    $invoice_number = $row_orders['invoice_number'];
                    $total_products = $row_orders['total_products'];
                    $order_date = $row_orders['order_date'];
                    $order_status = $row_orders['order_status'];

                    if ($order_status = 'pending') {
                        $order_status = "incomplete";
                    } else {
                        $order_status = "complete";
                    }
                    $number = 1;
                    echo "
                    <tr>
                    <td>$number</td>
                    <td>$amount_due</td>
                    <td>$total_products</td>
                    <td>$invoice_number</td>
                    <td>$order_date</td>

                    <td>$order_status</td>
                    <td><a href='confirm_payment.php?order_id=$order_id'>Confirm</a></td>
                </tr>
                    ";
                    $number++;
                }

                ?>


            </tbody>
        </table>
    </div>
</body>

</html>