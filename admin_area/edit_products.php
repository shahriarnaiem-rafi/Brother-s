<div class="container mt-5">
    <h1 class="text-center">
        Edit products
    </h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline  w-50 m-auto mb-4">
            <label for="product_title">Product title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" required="required">
        </div>
        <div class="form-outline  w-50 m-auto mb-4">
            <label for="product_desc">Product Discription</label>
            <input type="text" id="product_desc" name="product_desc" class="form-control" required="required">
        </div>
        <div class="form-outline  w-50 m-auto mb-4">
            <label for="product_keywords">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control" required="required">
        </div>
    </form>
    <div class="form-outline  w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Product Catagoy</label>

        <select name="product_category" class="form-select">

            <option value="">1</option>
            <option value="">1</option>
            <option value="">1</option>
            <option value="">1</option>
            <option value="">1</option>

        </select>
    </div>
    <div class="form-outline  w-50 m-auto mb-4">
        <label for="product_brands" class="form-label">Product Brands</label>

        <select name="product_brands" class="form-select">
            <option value="">1</option>
            <option value="">1</option>
            <option value="">1</option>
            <option value="">1</option>
            <option value="">1</option>

        </select>
    </div>
    <div class="form-outline  w-50 m-auto mb-4">
        <label for="product_image1" class="form-label">Product Image1</label>
        <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto"
                required="required">
            <img src="./product_images/apple.png" alt="" class="product_img">
        </div>
    </div>
    <div class="form-outline  w-50 m-auto mb-4">
        <label for="product_image2" class="form-label">Product Image2</label>
        <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto"
                required="required">
            <img src="./product_images/apple2.png" alt="" class="product_img">
        </div>
    </div>
    <div class="form-outline  w-50 m-auto mb-4">
        <label for="product_image3" class="form-label">Product Image3</label>
        <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto"
                required="required">
            <img src="./product_images/apple3.png" alt="" class="product_img">
        </div>
    </div>
    <div class="form-outline  w-50 m-auto mb-4">
        <label for="product_price">Product Price</label>
        <input type="text" id="product_price" name="product_price" class="form-control" required="required">
    </div>
    <div class="w-50 m-auto">
        <input type="submit" name="edit_product" value="Update product" class="btn btn-info px-3 mb-3">

    </div>
</div>