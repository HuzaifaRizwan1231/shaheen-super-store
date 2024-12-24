<?php

if (isset($_POST['login_admin'])) {

    $adminName = $_POST['admin_login_id'];
    $password = $_POST['admin_password'];

    $query = "SELECT * FROM admins WHERE admin_login_id = '$adminName' AND admin_password = '$password'";
    $result = mysqli_query($con, $query);
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $_SESSION["is_admin_login"] = true;
        $reader = mysqli_fetch_assoc($result);
        $_SESSION["admin_id"] = $reader['admin_id'];
        $_SESSION["admin_Name"] = $reader['admin_fullName'];
        $_SESSION["admin_Password"]  = $reader['admin_password'];
        echo "<script>triggerToast( 'Logged In successfully', 'success', 'index.php')</script>";
    } else {
        echo "<script>triggerToast( 'Incorrect username or password', 'danger')</script>";
    }
}

?>




<div class="container login">
    <h3 class="text-center mb-4"><b>Login</b></h3>

    <form action="" method="post">

        <!-- admin email -->
        <div class="form-outline mb-4 loginFieldAdmin m-auto">
            <label for="admin_login_id" class="form-label">Email ID</label>
            <input type="email" class="form-control" name="admin_login_id" placeholder="" required="required">
        </div>
        <!-- admin password -->
        <div class="form-outline mb-4 loginFieldAdmin m-auto">
            <label for="admin_password" class="form-label">Password</label>
            <input type="password" class="form-control" name="admin_password" placeholder=""
                required="required">
        </div>


        <!-- Login -->
        <div class="form-outline loginFieldAdmin mb-3 m-auto">
            <input type="submit" class="loginButton" name=login_admin value="Login">
        </div>


    </form>
</div>