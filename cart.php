<?php
include('includes/connect.php');
include('./functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brother's Shop \cart details</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
    </style>
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
                            <a class="nav-link" href="cart.php"> <i
                                    class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> Cart</a>
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

        <!-- fourth child  -->

        <!-- table -->
        <div class="container">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-bordered text-center">

                        <tbody>
                            <!-- php code -->
                            <?php
                            global $con;
                            $ip = getIPAddress();
                            $total_price = 0;
                            $cart_query = "select * from cart_details where ip_address='$ip'";
                            $result = mysqli_query($con, $cart_query);
                            $result_count = mysqli_num_rows($result);
                            if ($result_count > 0) {
                                echo "
                                 <thead>
                                <tr>
                                    <th>Product Title</th>
                                    <th>Product Image</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                    <th colspan='2'>Opertation</th>
                             </tr>
                                </thead>
                                ";

                                while ($row = mysqli_fetch_array($result)) {
                                    $product_id = $row['product_id'];
                                    $select_products = "select * from product where product_id='$product_id'";
                                    $result_products = mysqli_query($con, $select_products);

                                    while ($row_product_price = mysqli_fetch_array($result_products)) {
                                        $product_price = array($row_product_price['product_price']);
                                        $price_table = $row_product_price['product_price'];
                                        $product_title = $row_product_price['product_title'];
                                        $product_image1 = $row_product_price['product_image1'];
                                        $product_values = array_sum($product_price);
                                        $total_price += $product_values;



                                        ?>
                                        <tr>
                                            <td><?php echo $product_title; ?></td>
                                            <td><img src="./admin_area/product_images/<?php echo $product_image1; ?>"
                                                    alt="imge of the product" class="cart_img"></td>
                                            <td><input type="text" class="form-input w-50" name="qty"></td>
                                            <td><?php echo $price_table; ?>/-</td>
                                            <td><input type="checkbox" name="removeitem[]" id="" value="<?php echo $product_id; ?>">
                                            </td>
                                            <?php
                                            $ip = getIPAddress();
                                            if (isset($_POST['update_cart'])) {
                                                $quantity = $_POST['qty'];
                                                $update_cart = "update cart_details set quantity=$quantity where ip_address='$ip'";
                                                $result_products_quantity = mysqli_query($con, $update_cart);
                                                $total_price = $total_price * $quantity;
                                            }


                                            ?>
                                            <td class="d-flex">

                                                <!-- <button class="bg-info border-0 px-3 py-2 mx-3">Update </button> -->
                                                <input type="submit" value="Update Cart" class="bg-info border-0 px-3 py-2 mx-3"
                                                    name="update_cart">
                                                <input type="submit" value="Remove Cart" class="bg-info border-0 px-3 py-2 mx-3"
                                                    name="remove_cart">
                                                <!-- <button class="bg-info border-0 px-3 py-2 mx-3">Remove </button> -->

                                            </td>
                                        </tr>
                                        <?php
                                    }

                                }

                            } else {
                                echo " <h2 class='text-center text-danger'>Empty cart</h2>";
                            }


                            ?>
                        </tbody>
                    </table>
                    <div class="d-flex mb-3">
                        <?php
                        $ip = getIPAddress();
                        $cart_query = "select * from cart_details where ip_address='$ip'";
                        $result = mysqli_query($con, $cart_query);
                        $result_count = mysqli_num_rows($result);
                        if ($result_count > 0) {
                            echo " <h4 class='px-3'>Subtotal: <strong class='text-danger'> $total_price /-</strong>
                        </h4>
                         <input type='submit' value='Continue' class='bg-info border-0 px-3 py-2 mx-3'
                                                    name='continue_shopping'>
                        <button class='bg-secondary border-0 px-3 py-2'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout </a></button>";
                        } else {
                            echo "  <input type='submit' value='Continue Shopping' class='bg-info border-0 px-3 py-2 mx-3'
                                                    name='continue_shopping'>";

                        }
                        if (isset($_POST['continue_shopping'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                        ?>

                    </div>
                </form>
                <!-- remove item  -->
                <?php
                function  remove_cart_item()
                {
                    global $con;
                    if (isset($_POST['remove_cart'])) {
                        foreach ($_POST['removeitem'] as $remove_id) {
                            echo $remove_id;
                            $delete_query = "Delete  from cart_details where product_id=$remove_id";
                            $run_delete = mysqli_query($con, $delete_query);
                            if ($run_delete) {
                                echo "<script>window.open('cart.php','_self')</script>";
                            }

                        }
                    }
                }
                echo $remove_item = remove_cart_item();
                ?>


            </div>
        </div>
    </div>


    <?php include("./includes/footer.php"); ?>



    <script src="./bootstrap/js/bootstrap.bundle.min.js"></>
</body >

</html >