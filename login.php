<?php 
include './includes/connect.php';
session_start();

if (isset($_POST['login_user'])){
    
    $username = $_POST['user_login_id'];
    $password = $_POST['user_password'];

    $query = "SELECT * FROM users WHERE user_login_id = '$username' AND user_password = '$password'";
    $result = mysqli_query($con,$query);
    $rows = mysqli_num_rows($result);
    
    if ($rows == 1){
        $reader = mysqli_fetch_assoc($result);
        $_SESSION["user_id"] = $reader['user_id'];
        $_SESSION["user_Name"] = $reader['user_fullName'];
        $_SESSION["user_Password"]  = $reader['user_password'];
        $_SESSION["is_login"] = true;
        echo"<script>alert('logged in successfully')</script>";
        header('Location: index.php');
    }
    else{
        echo"<script>alert('Incorrect username or password')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
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
            <h3 class="text-center mb-4"><b>Login</b></h3>

            <form action="" method="post">

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


                <!-- Login -->
                <div class="form-outline loginField mb-3 m-auto">
                    <input type="submit" class="loginButton" name=login_user value="Login">
                </div>

                <div class="form-outline loginField mb-3 m-auto">
                    <p>Don't have an account? <a style="color: #003d29;text-decoration:none;"
                            href="register.php"><b>Create new!</b></a></p>
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