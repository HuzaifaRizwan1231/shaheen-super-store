<?php 

if (isset($_POST['shift_brand'])){
    $from_brand = $_POST['from_brand'];
    $to_brand = $_POST['to_brand'];

    $query = "UPDATE products SET product_brand_id = $to_brand WHERE product_brand_id = $from_brand";
    $result = mysqli_query($con,$query);

    if ($result){
        echo"<script>alert('Brand of products changed successfully')</script>";
    }

}

?>


<form action="" method="post">
    <h3 class="text-center mb-3">Shift Brand</h3>



    <!-- from brand -->
    <div class="form-outline mb-4 textField">
        <label for="from_brand" class="form-label">Shift From:</label>
        <select name="from_brand" class="form-select" id="" required="required">
            <option value="">Select a brand</option>
            <?php 

            $query = "SELECT * FROM brands";
            $result = mysqli_query($con,$query);
            
            while ($reader = mysqli_fetch_assoc($result)){
                $brand_id = $reader['brand_id'];
                $brand_name = $reader['brand_name'];
              
                echo"<option value='$brand_id'>$brand_name</option>";
            }

            ?>

        </select>
    </div>

    <!--to brand -->
    <div class="form-outline mb-4 textField">
        <label for="to_brand" class="form-label">Shift To:</label>
        <select name="to_brand" class="form-select" id="" required="required">
            <option value="">Select a brand</option>
            <?php 

            $query = "SELECT * FROM brands";
            $result = mysqli_query($con,$query);
            
            while ($reader = mysqli_fetch_assoc($result)){
                $brand_id = $reader['brand_id'];
                $brand_name = $reader['brand_name'];
              
                echo"<option value='$brand_id'>$brand_name</option>";
            }

            ?>

        </select>
    </div>

    <div class="form-outline text-center">
        <input type="submit" class="SubmitButton" name=shift_brand value="Shift Brand">
    </div>


</form>