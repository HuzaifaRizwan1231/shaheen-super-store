<?php

if (isset($_POST['edit_product'])) {
    $product_id = $_GET['edit_product'];
    $product_name = $_POST['edit_product_name'];
    $product_desc = $_POST['edit_product_description'];
    $product_keywords = $_POST['edit_product_keywords'];
    $product_brand = $_POST['edit_product_brand'];
    $product_category = $_POST['edit_product_category'];
    $product_price = $_POST['edit_product_price'];


    $product_tmpName_image1 = $_FILES['edit_product_image1']['tmp_name'];
    $product_tmpName_image2 = $_FILES['edit_product_image2']['tmp_name'];
    $product_tmpName_image3 = $_FILES['edit_product_image3']['tmp_name'];


    //delete previous image
    $select_query = "SELECT * FROM products WHERE product_id = $product_id";
    $result5 = mysqli_query($con, $select_query);
    $reader5 = mysqli_fetch_assoc($result5);
    $image1 = $reader5['product_image1'];
    $image2 = $reader5['product_image2'];
    $image3 = $reader5['product_image3'];




    if ($product_tmpName_image1) {
        $product_name_image1 = $_FILES['edit_product_image1']['name'];
        move_uploaded_file($product_tmpName_image1, "./Products_images/$product_name_image1");
        if ($product_name_image1 != $image1) {
            $file_path = "./Products_images/$image1";
            unlink($file_path);
        }
    } else {
        $product_name_image1 = $image1;
    }

    if ($product_tmpName_image2) {
        $product_name_image2 = $_FILES['edit_product_image2']['name'];
        move_uploaded_file($product_tmpName_image2, "./Products_images/$product_name_image2");
        if ($product_name_image1 != $image2) {
            $file_path = "./Products_images/$image2";
            unlink($file_path);
        }
    } else {
        $product_name_image2 = $image2;
    }

    if ($product_tmpName_image3) {
        $product_name_image3 = $_FILES['edit_product_image3']['name'];
        move_uploaded_file($product_tmpName_image3, "./Products_images/$product_name_image3");
        if ($product_name_image1 != $image3) {
            $file_path = "./Products_images/$image3";
            unlink($file_path);
        }
    } else {
        $product_name_image3 = $image3;
    }

    $query = "UPDATE products SET product_name = '$product_name',product_description = '$product_desc',product_keywords='$product_keywords',product_price = '$product_price',product_image1 = '$product_name_image1',product_image2 = '$product_name_image2',product_image3 = '$product_name_image3',product_brand_id = '$product_brand',product_category_id = '$product_category',product_reg_date = NOW() WHERE product_id = $product_id";

    $result = mysqli_query($con, $query);

    if ($result) {
        echo "<script>triggerToast( 'Product Edited Successfully', 'success')</script>";
    }
}


?>

<?php

$edit_product_id = $_GET['edit_product'];
$query2 = "SELECT * FROM products WHERE product_id = $edit_product_id";
$result2 = mysqli_query($con, $query2);
$reader2 = mysqli_fetch_assoc($result2);
$edit_product_name = $reader2['product_name'];
$edit_product_desc = $reader2['product_description'];
$edit_product_keywords = $reader2['product_keywords'];
$edit_product_brand = $reader2['product_brand_id'];
$edit_product_category = $reader2['product_category_id'];
$edit_product_price = $reader2['product_price'];



?>



<form action="" method="post" enctype="multipart/form-data">
    <h3 class="text-center mb-3">Edit Product</h3>

    <!-- name -->
    <div class="form-outline mb-4 textField">

        <input type="text" class="form-control" autocomplete="off" required="required" placeholder="Product Name"
            name="edit_product_name" value="<?php echo $edit_product_name ?>">
    </div>

    <!-- description -->

    <div class="form-outline mb-4 textField">
        <textarea class="form-control" placeholder="Product Description" name="edit_product_description"
            required="required"><?php echo $edit_product_desc ?></textarea>
    </div>

    <!-- keywords -->

    <div class="form-outline mb-4 textField">
        <input type="text" class="form-control" autocomplete="off" required="required" placeholder="Product Keywords"
            name="edit_product_keywords" value="<?php echo $edit_product_keywords ?>">
    </div>


    <!-- brand -->
    <div class="form-outline mb-4 textField">
        <select name="edit_product_brand" class="form-select" id="" required="required">
            <?php
            $query3 = "SELECT * FROM brands WHERE brand_id = $edit_product_brand";
            $result3 = mysqli_query($con, $query3);
            $reader3 = mysqli_fetch_assoc($result3);
            $edit_product_brand_name = $reader3['brand_name'];

            ?>
            <option value="<?php echo $edit_product_brand ?>"><?php echo $edit_product_brand_name ?></option>
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

        <select name="edit_product_category" class="form-select" id="" required="required">
            <?php
            $query4 = "SELECT * FROM categories WHERE category_id = $edit_product_category";
            $result4 = mysqli_query($con, $query4);
            $reader4 = mysqli_fetch_assoc($result4);
            $edit_product_category_name = $reader4['category_name'];

            ?>
            <option value="<?php echo $edit_product_category ?>"><?php echo $edit_product_category_name ?></option>
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
        <input type="file" class="form-control" name="edit_product_image1">
    </div>
    <!-- image2 -->
    <div class="form-outline mb-4 textField">
        <label for="product_image2" class="form-label">Product Image 2</label>
        <input type="file" class="form-control" name="edit_product_image2">
    </div>
    <!-- image3 -->
    <div class="form-outline mb-4 textField">
        <label for="product_image3" class="form-label">Product Image 3</label>
        <input type="file" class="form-control" name="edit_product_image3">
    </div>

    <!-- price -->
    <div class="form-outline mb-4 textField">
        <input type="text" class="form-control" placeholder="Product Price" name="edit_product_price"
            required="required" value="<?php echo $edit_product_price ?>">
    </div>

    <div class="form-outline text-center">
        <input type="submit" class="SubmitButton" name=edit_product value="Edit Product">
    </div>


</form>