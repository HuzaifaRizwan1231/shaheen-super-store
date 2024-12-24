<?php
if (isset($_POST['insert_cat'])) {
    $cat_name = $_POST['category_title'];

    $query = "SELECT * FROM categories WHERE category_name = '$cat_name'";
    $result = mysqli_query($con, $query);
    $total_rows = mysqli_num_rows($result);

    if ($total_rows == 1) {
        echo "<script>triggerToast( 'Category is already added', 'warning')</script>";
    } else {

        $query = "INSERT INTO categories (category_name) VALUES ('$cat_name')";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<script>triggerToast( 'Category added successfully', 'success')</script>";
        }
    }
}
?>
<form action="" method="post">
    <h3 class="text-center mb-4 ">Insert Categories</h3>

    <div class="form-outline mb-4 textField">
        <input type="text" class="form-control" placeholder="Insert Category" name="category_title"
            aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="form-outline text-center">
        <input type="submit" class="SubmitButton" name=insert_cat value="Insert Category">
    </div>
</form>