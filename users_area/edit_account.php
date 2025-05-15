<?php
if (isset($_GET['edit_account'])) {
    $user_session_name = $_SESSION['username'];
    $select_query = "select * from user_table where username='$user_session_name'";
    $result_query = mysqli_query($con, $select_query);
    $row_fetch = mysqli_fetch_assoc($result_query);

    $user_id = $row_fetch['user_id'];
    $user_name = $row_fetch['username'];
    $user_email = $row_fetch['user_email'];
    $user_address = $row_fetch['user_address'];
    $user_mobail = $row_fetch['user_mobail'];

    if (isset($_POST['user_update'])) {
        $update_id = $user_id;
        $user_name = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobail = $_POST['user_mobail'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_tmp = $_FILES['user_image']['tmp_name'];

        move_uploaded_file($user_image_tmp, "./user_images/$user_image");
        $update_data = "update user_table set username='$user_name', user_email='$user_email',user_image='$user_image', user_address='$user_address', user_mobail='$user_mobail' where user_id='$update_id'";
        $result_query_update = mysqli_query($con, $update_data);
        if ($result_query_update) {
            echo "<script>alert('data updated successfull')</script>";
            echo "<script>window.open('logout.php','_self')</script>";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
</head>

<body>

    <h3 class="text-center text-success mb-4">Edit Account</h3>

    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo "$user_name"; ?>"
                name="user_username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo "$user_email"; ?>" name="user_email"
                id="">
        </div>


        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_image">
            <img src="./user_images/<?php echo $user_image; ?>" alt="profile_img" class="edit_image">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_address"
                value="<?php echo "$user_address"; ?>">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" name="user_mobail"
                value="<?php echo "$user_mobail"; ?>">
        </div>

        <input type="submit" value="Update" class="bg-info y-2 px-3 border-0 " name="user_update">



    </form>

</body>

</html>