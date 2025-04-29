<?php
include('includes/connect.php');
include('./functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brother's Shop</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Registar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> <i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:- <?php total_cart_price(); ?>/- </a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li> -->
                    </ul>

                    <form action="search_product.php" method="get" class="d-flex" role="search">
                        <input class="form-control me-2" type="search" name="search_data" placeholder="Search"
                            aria-label="Search">
                        <input type="submit" value="Search" name="search_data_product" class="btn btn-outline-light">
                    </form>

                </div>
            </div>
        </nav>
        <?php 
        cart();
        ?>

        <!-- second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">welcome Guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Log in</a>
                </li>
            </ul>

        </nav>
        <!-- third child -->
        <div class="bg-light">
            <h3 class="text-center">Brother's Store</h3>
            <p class="text-center"> Communitation is at the heart of e-commerce and community</p>
        </div>

        <!-- fourth child  card-->

        <div class="row px-1">
            <div class="col-md-10">
                <!-- products -->
                <div class="row">
                    <!-- fetching products -->
                    <?php
                    // calling function
                    getProducts();
                    getUniquecategories();
                    getuniqbrands();



                    // $ip = getIPAddress();
                    // echo 'User Real IP Address - ' . $ip;
                    ?>



                </div>
            </div>
            <!--  -->
            <div class="col-md-2 bg-secondary p-0">

                <!-- sidenav -->
                <!-- branch to be displays -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Delevery Brands</h4>
                        </a>
                    </li>
                    <!-- show from database -->
                    <?php

                    getBrands();
                    ?>


                </ul>
                <!-- catagorrys to be displays -->
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light">
                            <h4>Categories </h4>
                        </a>
                    </li>
                    <!-- show from database -->
                    <?php

                    getCategories();
                    ?>




                </ul>
            </div>
        </div>
    </div>


    <?php include("./includes/footer.php"); ?>



    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>