<?php
if (isset($_POST['edit_cat'])) {
    $cat_name = $_POST['edit_category_title'];
    $cat_id = $_GET['edit_category'];
    $query = "SELECT * FROM categories WHERE category_name = '$cat_name'";
    $result = mysqli_query($con, $query);
    $total_rows = mysqli_num_rows($result);

    if ($total_rows == 1) {
        echo "<script>triggerToast( 'Category is already added', 'warning')</script>";
    } else {

        $query = "UPDATE categories SET category_name = '$cat_name' WHERE category_id = $cat_id";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<script>triggerToast( 'Category edited successfully', 'success')</script>";
        }
        echo "<script>window.location='index.php?view_category';</script>";
    }
}
?>
<form action="" method="post">
    <h3 class="text-center mb-3">Edit Category</h3>
    <div class="form-outline mb-4 textField">


        <?php
        $category_id = $_GET['edit_category'];
        $query2 = "SELECT * FROM categories WHERE category_id = $category_id";
        $result2 = mysqli_query($con, $query2);
        $reader2 = mysqli_fetch_assoc($result2);
        $category_name = $reader2['category_name'];

        ?>

        <input type="text" class="form-control" placeholder="Insert Category" name="edit_category_title"
            aria-label="Username" aria-describedby="basic-addon1" value="<?php echo $category_name ?>">


    </div>

    <div class="form-outline text-center">
        <input type="submit" class="SubmitButton" name=edit_cat value="Edit Category">
    </div>
</form>