<?php
include('../includes/connect.php');
if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_titile'];
    // data base ar sob data dekhe
    $select_query = "Select * from brands where brand_title='$brand_title'";
    $result_select = mysqli_query($con, $select_query);

    // jodi 1 bar already thake r thak be na
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('brand already added before')</script>";
    } else {
        $insert_query = "insert into brands (brand_title) values('$brand_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script>alert('brand added succesfulli')</script>";

        }
    }
}
?>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-3 ">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"> </i></span>
        <input type="text" class="form-control" name="brand_titile" placeholder="Insert Brand" aria-label="Brand"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group  mb-2">

        <input type="submit" class="bg-info border-0 p-2 m-2" name="insert_brand" value="Insert Brand">

    </div>

</form>