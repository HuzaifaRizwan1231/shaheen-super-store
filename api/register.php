<?php 
include './includes/connect.php';
// session_start();

if (isset($_POST['register_user'])){
    $user_fullName = $_POST['user_fullName'];
    $user_login_id = $_POST['user_login_id'] ;
    $user_password =  $_POST['user_password'];
    $user_confirm_password =  $_POST['user_confirm_password'];

    //checks for user already exist
    $query = "SELECT * FROM users WHERE user_login_id = '$user_login_id'";
    $result = mysqli_query($con,$query);

    $total_rows = mysqli_num_rows($result);

    if ($total_rows == 1){
        echo"<script>alert('User already exists')</script>";

    }

    else if ($user_password != $user_confirm_password){
        echo"<script>alert('Passwords do not match')</script>";

    }

    else{
        $query = "INSERT INTO users (user_login_id,user_password,user_fullName) VALUES ('$user_login_id','$user_password','$user_fullName')";
        $result = mysqli_query($con,$query);
        if ($result){
            $_SESSION["user_Name"] =  $user_fullName;
            $_SESSION["user_Password"]  =  $user_password;
            $_SESSION["is_login"] = true;

            $query = "SELECT user_id FROM users WHERE user_fullName = '$user_fullName'";
            $result = mysqli_query($con,$query);
            $reader = mysqli_fetch_assoc($result);
            $_SESSION["user_id"] =  $reader['user_id'];




            echo "<script>window.location='index.php';</script>";
        }
    }



    
}
?>



        <div class="container login">
            <h3 class="text-center mb-4"><b>Register</b></h3>

            <form action="" method="post">
                <!-- name -->
                <div class="form-outline mb-4 loginField m-auto">
                    <label for="user_fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="user_fullName" placeholder="" required="required">


                </div>
                <!-- user email -->
                <div class="form-outline mb-4 loginField m-auto">
                    <label for="user_login_id" class="form-label">Email ID</label>
                    <input type="email" class="form-control" name="user_login_id" placeholder="" required="required">
                </div>
                <!-- user password -->
                <div class="form-outline mb-4 loginField m-auto">
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="user_password" placeholder="" required="required">
                </div>

                <!-- confirm password -->
                <div class="form-outline mb-4 loginField m-auto">
                    <label for="user_confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="user_confirm_password" placeholder=""
                        required="required">
                </div>

                <div class="form-outline loginField mb-3 m-auto">
                    <p>Already have an account? <a style="color: #003d29;text-decoration:none;"
                    href="index.php?login_page"><b>Login!</b></a></p>
                </div>

                <!-- Register -->
                <div class="form-outline mb-3 loginField m-auto">
                    <input type="submit" class="loginButton" name=register_user value="Register">
                </div>
            </form>
        </div>
    