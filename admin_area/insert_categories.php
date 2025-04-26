<?php
include("../includes/connect.php");
if (isset($_POST['insert_cat'])) {
    $category_title = $_POST['cat_title'];
    // select data from database
    $select_query = "Select * from categories where category_title='$category_title'";
    $result_select = mysqli_query($con, $select_query);

    // jodi data akbar thake r thakbe na
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('categories already added ')</script>";
    } else {


        $insert_query = "insert into categories (category_title) values('$category_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('categories added succesfulli')</script>";
        }
    }

}
?>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-3 ">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"> </i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert catagories" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group  mb-2">
        <input type="submit" class="bg-info border-0 p-2 m-2" name="insert_cat" value="Insert Categories">
        <!-- <button class="bg-info p-3 border-0 my-3">
            Insert Categories
        </button> -->
    </div>

</form>