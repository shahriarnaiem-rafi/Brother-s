<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Dashboard</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
    <style>
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .admin_image {
            width: 100px;
            object-fit: contain;
        }

        body {
            overflow-x: hidden;
        }
        .product_img{
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>

<body>

    <!-- nav  -->
    <div class="container-fluid p-0">
        <!-- first-child -->
        <nav class="navbar navbar-expand-lg  navbar-light  bg-info">
            <div class="container-fluid">
                <img src="../img/apple.png" class="logo" alt="">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                Welcome Guest
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                logout
                            </a>
                        </li>
                    </ul>
                </nav>
        </nav>
    </div>
    <!-- second child -->
    <div class="bg-light">
        <h3 class="text-center p-2">
            Manage Details
        </h3>
    </div>
    <!-- third child -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center ">
            <div class="p-3">
                <a href="#"><img src="../img/apple3.png" alt="" class="admin_image"></a>
                <p class="text-light text-center">
                    Admin Name
                </p>
            </div>
            <div class="button text-center">
                <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert
                        Products</a></button>
                <button class="my-3"><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View
                        Product </a></button>
                <button class="my-3"><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert
                        Categories</a></button>
                <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">view Categories</a></button>
                <button class="my-3"> <a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert
                        Brand</a></button>
                <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">view Brand</a></button>
                <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">All orders </a></button>
                <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">All Payments</a></button>
                <button class="my-3"><a href="" class="nav-link text-light bg-info my-1">List Users</a></button>
            </div>
        </div>
    </div>

    <div class="container my-3">
        <!-- ata dom ar moto kaj kore .   jtay click korbo oita show korte get[ar bitor id diye] -->
        <?php
        if (isset($_GET['insert_category'])) {
            include('insert_categories.php');
        }
        if (isset($_GET['insert_brand'])) {
            include('insert_brands.php');
        }
        if (isset($_GET['view_products'])) {
            include('view_products.php');
        }
        if (isset($_GET['edit_products'])) {
            include('edit_products.php');
        }
        ?>

    </div>




    <?php include("../includes/footer.php") ?>




    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>