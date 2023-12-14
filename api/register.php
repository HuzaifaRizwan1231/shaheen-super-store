<?php 
include './includes/connect.php';
session_start();

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




            header('Location: index.php');
        }
    }



    
}
?>


<!DOCTYPE html>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <!-- Bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400&display=swap" rel="stylesheet">


</head>

<body>

    <header>

    </header>
    <main>
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

                <!-- Register -->
                <div class="form-outline mb-3 loginField m-auto">
                    <input type="submit" class="loginButton" name=register_user value="Register">
                </div>
            </form>
        </div>
    </main>
    <footer>

    </footer>


    <!-- Bootstrap javascript link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>