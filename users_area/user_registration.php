<?php
include "../includes/connect.php";
include "../functions/common_function.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
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
        <h2 class="text-center mb-4">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <div class="form-container">
                    <form action="" method="post" enctype="multipart/form-data">
                        <!-- name -->
                        <div class="form-outline mb-3">
                            <label for="user_username" class="form-label">Username</label>
                            <input type="text" name="user_username" id="user_username" class="form-control"
                                placeholder="Please enter your username" autocomplete="off" required>
                        </div>
                        <!-- email -->
                        <div class="form-outline mb-3">
                            <label for="user_email" class="form-label">Email</label>
                            <input type="text" name="user_email" id="user_email" class="form-control"
                                placeholder="Please enter your email" autocomplete="off" required>
                        </div>
                        <!-- image -->
                        <div class="form-outline mb-3">
                            <label for="user_image" class="form-label">Image </label>
                            <input type="file" name="user_image" id="user_image" class="form-control" required>
                        </div>
                        <!-- pass -->
                        <div class="form-outline mb-3">
                            <label for="user_password" class="form-label">Password</label>
                            <input type="password" name="user_password" id="user_password" class="form-control"
                                placeholder="Please enter your password" autocomplete="off" required>
                        </div>
                        <!-- con pass -->
                        <div class="form-outline mb-3">
                            <label for="conf_user_password" class="form-label">Confirm password</label>
                            <input type="password" name="conf_user_password" id="conf_user_password"
                                class="form-control" placeholder="Please confirm your password" autocomplete="off"
                                required>
                        </div>
                        <!-- address -->
                        <div class="form-outline mb-3">
                            <label for="user_address" class="form-label">Address</label>
                            <input type="text" name="user_address" id="user_address" class="form-control"
                                placeholder="Please enter your address" autocomplete="off" required>
                        </div>
                        <!-- Contact -->
                        <div class="form-outline mb-4">
                            <label for="user_contact" class="form-label">Contact</label>
                            <input type="text" name="user_contact" id="user_contact" class="form-control"
                                placeholder="Please enter your contact" autocomplete="off" required>
                        </div>

                        <div class="mt-4 pt-2 text-center">
                            <input type="submit" value="Register" name="user_register"
                                class="py-2 px-4 border-0 rounded-3">
                            <p class="small fw-bold pt-3 mb-0">Already have an account? <a href="user_login.php"
                                    class="text-danger">Login</a></p>
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
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $hash_password = password_hash($user_password, PASSWORD_DEFAULT);

    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];

    $user_ip = getIPAddress();

    // select query
    $select_query = "select * from user_table where username='$user_username' or user_email='$user_email'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);

    if ($row_count > 0) {
        echo "<script>alert('username and email is already exist');</script>";
    } else if ($user_password != $conf_user_password) {
        echo "<script>alert('password is dosenot match');</script>";

    } else {



        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $insert_query = "insert into user_table (username,user_email,user_password, user_image,user_ip,user_address,user_mobail) values('$user_username','$user_email','$hash_password','$user_image','$user_ip', '$user_address','$user_contact')";
        $sql_execute = mysqli_query($con, $insert_query);
        if ($sql_execute) {
            echo "<script>alert('inserted  data');</script>";
        } else {
            die(mysqli_error($con));
        }
    }

    // selecting cart items
    $select_cart_items="select * from cart_details where ip_address='$user_ip'";
    $result_cart=mysqli_query($con,$select_cart_items);
    $row_cart_count=mysqli_num_rows($result_cart);
    if($row_cart_count>0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('you have itesm in your cart');</script>";
        echo "<script>window.open('checkout.php','_self')</script>";

    }
    else{
        echo "<script>window.open('index.php','_self')</script>";

    }
}

?>