<?php
include('./includes/connect.php');

// getting products
function getProducts()
{
    //global ver
    global $con;
    // is chek or not 
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {

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
             <a href='product_details.php?product_id=$product_id' class='btn btn-success'>View More</a>
         </div>
     </div>
 </div>
     ";
            }
        }
    }
}
// getting all product
function get_all_product()
{
    //global ver
    global $con;
    // is chek or not 
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {

            // order buy random()  refresh dile arek ta asbe    limit 0,9   view more a click korle new ase sob
            $select_query = "select * from product order by rand()";
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
             <a href='product_details.php?product_id=$product_id' class='btn btn-success'>View More</a>
       </div>
   </div>
</div>
   ";
            }
        }
    }
}
// getting categories 
function getUniquecategories()
{
    //global ver
    global $con;
    // is chek or not 
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        // order buy random()  refresh dile arek ta asbe    limit 0,9   view more a click korle new ase sob order by rand() limit 0,9
        $select_query = "select * from product where category_id=$category_id";

        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h3 class='text-center text-danger'>I have no stock</h3>";
        }
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
             <a href='product_details.php?product_id=$product_id' class='btn btn-success'>View More</a>
         </div>
     </div>
 </div>
     ";
        }
    }

}

function getuniqbrands()
{
    //global ver
    global $con;
    // is chek or not 
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        // order buy random()  refresh dile arek ta asbe    limit 0,9   view more a click korle new ase sob order by rand() limit 0,9
        $select_query = "select * from product where brand_id=$brand_id";

        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h3 class='text-center text-danger'>This Brand is not availavail</h3>";
        }
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
             <a href='product_details.php?product_id=$product_id' class='btn btn-success'>View More</a>
         </div>
     </div>
 </div>
     ";
        }
    }

}


// displaying branch
function getBrands()
{
    global $con;

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
}

// category
function getcategories()
{
    global $con;
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
}
// searching products 

function search_product()
{
    //global ver
    global $con;
    // is chek or not 
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];

        // order buy random()  refresh dile arek ta asbe    limit 0,9   view more a click korle new ase sob   % search korara jonoo%
        $search_query = "select * from product where product_keywords like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h3 class='text-center text-danger'>this product is not availabail </h3>";
        }
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
             <a href='product_details.php?product_id=$product_id' class='btn btn-success'>View More</a>
         </div>
     </div>
 </div>
     ";
        }
    }
}
// view details function
function view_details()
{
    //global ver
    global $con;
    // is chek or not 
    if (isset($_GET['product_id'])) { 
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                    $product_id=$_GET['product_id'];
                // order buy random()  refresh dile arek ta asbe    limit 0,9   view more a click korle new ase sob
                $select_query = "select * from product where product_id='$product_id'";
                $result_query = mysqli_query($con, $select_query);
               
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $product_id = $row['product_id'];
                    $product_title = $row['product_title'];
                    $product_description = $row['product_description'];
                    $product_image1 = $row['product_image1'];
                    $product_image2 = $row['product_image2'];
                    $product_image3 = $row['product_image3'];
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
              <a href='product_details.php?product_id=$product_id' class='btn btn-success'>View More</a>
          </div>
      </div>
  </div>
   <div class='col-md-8'>
                        <!-- related images -->
                        <div class='row'>
                            <div class='col-md-12'>
                                <h1 class='text-center text-info mb-5'>Related Poducts</h1>
                            </div>
                            <div class='col-md-6'>
                                <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                            </div>
                            <div class='col-md-6'>
                            <img src='./admin_area/product_images/$product_image3' class='card-img-top'
                            alt='$product_title'>
                            </div>
                        </div>
                    </div>
      ";
                }
            }
        }
    }
}

?>