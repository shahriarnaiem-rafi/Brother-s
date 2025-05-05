<?php
include('../includes/connect.php');
include('../functions/common_function.php');
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>brother's | payment</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <!-- php code to acces user id -->
    <?php
        $user_ip=getIPAddress();
        $get_user="select * from user_table where user_ip='$user_ip'";
        $result=mysqli_query($con,$get_user);
        $run_query=mysqli_fetch_array($result);
        $user_id=$run_query['user_id'];

    ?>
    <div class="container">
        <h2 class="text-center text-info"> Payment Option</h2>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-md-6 mb-4">
            <a href="https://www.paypal.com" target="_blank"> <img src="../img/upi.png" alt=""></a>

            </div><br>
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id;?>" target="_blank"><h2 class="text-center ">Pay offline</h2></a>

            </div>
        </div>
    </div>


</body>
</html>