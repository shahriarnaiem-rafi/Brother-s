<?php

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
                            <label for="user_useremail" class="form-label">Email</label>
                            <input type="text" name="user_useremail" id="user_useremail" class="form-control"
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
                            <label for="conf_user_useremail" class="form-label">Confirm password</label>
                            <input type="text" name="conf_user_useremail" id="conf_user_useremail" class="form-control"
                                placeholder="Please confirm your password" autocomplete="off" required>
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
