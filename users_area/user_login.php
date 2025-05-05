<?php
include "../includes/connect.php";
include "../functions/common_function.php";
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            overflow-x: hidden;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
            font-weight: 600;
        }

        input[type="submit"] {
            background-color: #17a2b8 !important;
            color: #fff;
        }

        input[type="submit"]:hover {
            background-color: #138496 !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid my-5">
        <h2 class="text-center mb-4"> User Login</h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- name -->
                        <div class="form-outline mb-3">
                            <label for="user_username" class="form-label">Username</label>
                            <input type="text" name="user_username" id="user_username" class="form-control"
                                placeholder="Please enter your username" autocomplete="off" required>
                        </div>


                        <!-- pass -->
                        <div class="form-outline mb-3">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" name="user_password" id="user_password" class="form-control"
                                placeholder="Please enter your password" autocomplete="off" required>
                        </div>



                        <div class="mt-4 pt-2 text-center">
                            <input type="submit" value="Login" name="user_login" class="py-2 px-4 border-0 rounded-3">
                            <p class="small fw-bold pt-3 mb-0">Don't have an account? <a href="user_registration.php"
                                    class="text-danger">Register</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
if (isset($_POST['user_login'])) {
    global $con;
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];
    $select_query = "select * from user_table  where username='$user_username'";

    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();
    // cart item
    $select_query_cart = "select * from cart_details  where ip_address='$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);



    if ($row_count > 0) {
        $_SESSION['username']=$user_username;
        if (password_verify($user_password, $row_data['user_password'])) {
            // echo "<script>alert('Log in success full')</script>";
            if ($row_count == 1 and $row_count_cart == 0) {
                $_SESSION['username']=$user_username;

                echo "<script>alert('Log in success full')</script>";
                echo "<script>window.open('profile.php')</script>";

            }
            else{
                $_SESSION['username']=$user_username;

                echo "<script>alert('Log in success full')</script>";
                echo "<script>window.open('./payment.php')</script>";

            }
        } else {
            echo "<script>alert('invallid user')</script>";

        }
    } else {
        echo "<script>alert('invallid user')</script>";
    }
}

?>