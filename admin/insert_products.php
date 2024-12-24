<?php
if (isset($_POST['insert_product'])) {
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_brand = $_POST['product_brand'];
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];


    $product_name_image1 = $_FILES['product_image1']['name'];
    $product_name_image2 = $_FILES['product_image2']['name'];
    $product_name_image3 = $_FILES['product_image3']['name'];


    $product_tempname_image1 = $_FILES['product_image1']['tmp_name'];
    $product_tempname_image2 = $_FILES['product_image2']['tmp_name'];
    $product_tempname_image3 = $_FILES['product_image3']['tmp_name'];


    move_uploaded_file($product_tempname_image1, "./Products_images/$product_name_image1");
    move_uploaded_file($product_tempname_image2, "./Products_images/$product_name_image2");
    move_uploaded_file($product_tempname_image3, "./Products_images/$product_name_image3");


    $query = "INSERT INTO products (product_name,product_description,product_keywords,product_price,product_image1,product_image2,product_image3,product_brand_id,product_category_id,product_reg_date) VALUES ('$product_name','$product_desc','$product_keywords','$product_price','$product_name_image1','$product_name_image2','$product_name_image3','$product_brand','$product_category',NOW())";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>triggerToast( 'Product added successfully', 'success')</script>";
    }
}


?>

<form action="" method="post" enctype="multipart/form-data">
    <h3 class="text-center mb-4">Insert Products</h3>

    <!-- name -->
    <div class="form-outline mb-4 textField">

        <input type="text" class="form-control" autocomplete="off" required="required" placeholder="Product Name"
            name="product_name">
    </div>

    <!-- description -->

    <div class="form-outline mb-4 textField">
        <textarea class="form-control" placeholder="Product Description" name="product_description"
            required="required"></textarea>
    </div>

    <!-- keywords -->

    <div class="form-outline mb-4 textField">
        <input type="text" class="form-control" autocomplete="off" required="required" placeholder="Product Keywords"
            name="product_keywords">
    </div>


    <!-- brand -->
    <div class="form-outline mb-4 textField">
        <select name="product_brand" class="form-select" id="" required="required">
            <option value="">Select a brand</option>
            <?php

            $query = "SELECT * FROM brands";
            $result = mysqli_query($con, $query);

            while ($reader = mysqli_fetch_assoc($result)) {
                $brand_id = $reader['brand_id'];
                $brand_name = $reader['brand_name'];

                echo "<option value='$brand_id'>$brand_name</option>";
            }

            ?>

        </select>
    </div>

    <!-- category -->
    <div class="form-outline mb-4 textField">

        <select name="product_category" class="form-select" id="" required="required">
            <option value="">Select a category</option>
            <?php

            $query = "SELECT * FROM categories";
            $result = mysqli_query($con, $query);

            while ($reader = mysqli_fetch_assoc($result)) {
                $category_id = $reader['category_id'];
                $category_name = $reader['category_name'];

                echo "<option value='$category_id'>$category_name</option>";
            }

            ?>

        </select>
    </div>

    <!-- image1 -->
    <div class="form-outline mb-4 textField">
        <label for="product_image1" class="form-label">Product Image 1</label>
        <input type="file" class="form-control" name="product_image1" required="required">
    </div>
    <!-- image2 -->
    <div class="form-outline mb-4 textField">
        <label for="product_image2" class="form-label">Product Image 2</label>
        <input type="file" class="form-control" name="product_image2" required="required">
    </div>
    <!-- image3 -->
    <div class="form-outline mb-4 textField">
        <label for="product_image3" class="form-label">Product Image 3</label>
        <input type="file" class="form-control" name="product_image3" required="required">
    </div>

    <!-- price -->
    <div class="form-outline mb-4 textField">
        <input type="text" class="form-control" placeholder="Product Price" name="product_price" required="required">
    </div>

    <div class="form-outline text-center mb-4">
        <input type="submit" class="SubmitButton" name=insert_product value="Insert Product">
    </div>


</form>