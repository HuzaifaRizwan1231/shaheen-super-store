<?php 

if (isset($_POST['shift_category'])){
    $from_cat = $_POST['from_category'];
    $to_cat = $_POST['to_category'];

    $query = "UPDATE products SET product_category_id = $to_cat WHERE product_category_id = $from_cat";
    $result = mysqli_query($con,$query);

    if ($result){
        echo"<script>alert('Category of products changed successfully')</script>";
    }

}

?>


<form action="" method="post">
    <h3 class="text-center mb-3">Shift Category</h3>



    <!-- from category -->
    <div class="form-outline mb-4 textField">
        <label for="from_category" class="form-label">Shift From:</label>
        <select name="from_category" class="form-select" id="" required="required">
            <option value="">Select a category</option>
            <?php 

            $query = "SELECT * FROM categories";
            $result = mysqli_query($con,$query);
            
            while ($reader = mysqli_fetch_assoc($result)){
                $category_id = $reader['category_id'];
                $category_name = $reader['category_name'];
              
                echo"<option value='$category_id'>$category_name</option>";
            }

            ?>

        </select>
    </div>

    <!--to category -->
    <div class="form-outline mb-4 textField">
        <label for="to_category" class="form-label">Shift To:</label>
        <select name="to_category" class="form-select" id="" required="required">
            <option value="">Select a category</option>
            <?php 

            $query = "SELECT * FROM categories";
            $result = mysqli_query($con,$query);
            
            while ($reader = mysqli_fetch_assoc($result)){
                $category_id = $reader['category_id'];
                $category_name = $reader['category_name'];
              
                echo"<option value='$category_id'>$category_name</option>";
            }

            ?>

        </select>
    </div>

    <div class="form-outline text-center">
        <input type="submit" class="SubmitButton" name=shift_category value="Shift Category">
    </div>


</form>