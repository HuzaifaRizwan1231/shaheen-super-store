<?php 
    include '../includes/connect.php';
    if(isset($_POST['edit_brand'])){
        $brand_name = $_POST['edit_brand_title'];
        $brand_id = $_GET['edit_brand'];
        $query= "SELECT * FROM brands WHERE brand_name = '$brand_name'";
        $result = mysqli_query($con,$query);
        $total_rows = mysqli_num_rows($result);

        if ($total_rows == 1){
            echo"<script>alert('Brand is already added')</script>";
        }

        else{

        $query= "UPDATE brands SET brand_name = '$brand_name' WHERE brand_id = $brand_id";
        $result = mysqli_query($con,$query);

        if ($result){
            echo"<script>alert('Brand Edited Successfully')</script>";
        }
        // header("Location: index.php?view_category");
    }
    }
?>
<form action="" method="post">
    <h3 class="text-center mb-3">Edit Brand</h3>
    <div class="form-outline mb-4 textField">


        <?php
            $brand_id = $_GET['edit_brand'];
            $query2= "SELECT * FROM brands WHERE brand_id = $brand_id";
            $result2 = mysqli_query($con,$query2);
            $reader2 = mysqli_fetch_assoc($result2);
            $brand_name = $reader2['brand_name'];
        
        ?>

        <input type="text" class="form-control" placeholder="Insert Brand" name="edit_brand_title" aria-label="Username"
            aria-describedby="basic-addon1" value="<?php echo $brand_name?>">


    </div>

    <div class="form-outline text-center">
        <input type="submit" class="SubmitButton" name=edit_brand value="Edit Brand">
    </div>
</form>