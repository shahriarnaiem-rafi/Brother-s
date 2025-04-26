<?php
include('includes/connect.php')
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
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Registar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> <i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:- 100 </a>
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
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>


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
                    // order buy random()  refresh dile arek ta asbe    limit 0,9   view more a click korle new ase sob
                    $select_query = "select * from product order by rand() limit 0,9";
                    $result_query = mysqli_query($con, $select_query);
                    // $row=mysqli_fetch_assoc($result_query);
                    // echo $row['product_title'];
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $product_id = $row['product_id'];
                        $product_title = $row['product_title'];
                        $product_description = $row['product_description'];
                        $product_image1 = $row['product_image1'];
                        $product_price = $row['product_price'];
                        $category_id = $row['category_id'];
                        $brand_id = $row['brand_id'];
                        echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text'>$product_description</p>
                                <p class='card-text'>$product_price Taka</p>
                                <a href='#' class='btn btn-danger'>Add to cart</a>
                                <a href='#' class='btn btn-success'>View More</a>
                            </div>
                        </div>
                    </div>
                        ";
                    }
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

                    $selece_brands = "select * from brands";
                    $result_brands = mysqli_query($con, $selece_brands);
                    // $row_data=mysqli_fetch_assoc($result_brands);
                    // echo $row_data['brand_title'];
                    while ($row_data = mysqli_fetch_assoc($result_brands)) {
                        $brand_title = $row_data['brand_title'];
                        $brand_id = $row_data['brand_id'];
                        echo "       <li class='nav-item '>
                        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                    </li>";
                    }
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

                    $selece_category = "select * from categories";
                    $result_category = mysqli_query($con, $selece_category);
                    // $row_data=mysqli_fetch_assoc($result_brands);
// echo $row_data['brand_title'];
                    while ($row_data = mysqli_fetch_assoc($result_category)) {
                        $category_title = $row_data['category_title'];
                        $category_id = $row_data['category_id'];
                        echo " <li class='nav-item '>
    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
</li>";
                    }
                    ?>




                </ul>
            </div>
        </div>
    </div>




















    <!-- last child -->
    <div class="bg-info p-3 text-center">
        <p> All writes reserve @ Designd by Shahriar</p>
    </div>


    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>