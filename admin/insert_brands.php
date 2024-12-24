<?php 
    if(isset($_POST['insert_brand'])){
        $brand_name = $_POST['brand_title'];

        $query= "SELECT * FROM brands WHERE brand_name = '$brand_name'";
        $result = mysqli_query($con,$query);
        $total_rows = mysqli_num_rows($result);

        if ($total_rows == 1){
            echo"<script>alert('Brand is already added')</script>";
        }

        else{

        $query= "INSERT INTO brands (brand_name) VALUES ('$brand_name')";
        $result = mysqli_query($con,$query);

        if ($result){
            echo"<script>alert('Brand Added Successfully')</script>";
        }
    }
    }
?>
<form action="" method="post">
    <h3 class="text-center mb-3">Insert Brands</h3>
    <div class="form-outline mb-4 textField">
        <input type="text" class="form-control" placeholder="Insert Brand" name="brand_title" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>

    <div class="form-outline mb-4 text-center">
        <input type="submit" class="SubmitButton" name=insert_brand value="Insert Brand">
    </div>
</form>