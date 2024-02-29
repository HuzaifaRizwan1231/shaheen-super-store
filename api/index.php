<!-- connection file -->
<?php 
session_start();

if (!isset($_SESSION["is_login"])){
    $_SESSION["is_login"] = false;
}

if (isset($_POST['logout_user'])){
    session_unset();
    session_destroy();

    session_start();
    $_SESSION["is_login"] = false;

    echo "<script>window.location='index.php';</script>";
}

include './includes/connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Commerce website</title>
    <!-- Bootstrap Css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400&display=swap" rel="stylesheet">
    <script>
        function changeClass() {
        var element = document.getElementById('navButton');
        if (element.classList.contains('fas')) {
            element.classList.remove('fas');
            element.classList.remove('fa-align-left');
            element.classList.add('fa-solid');
            element.classList.add('fa-xmark');
        } else {
            element.classList.remove('fa-solid');
            element.classList.remove('fa-xmark');
            element.classList.add('fas');
            element.classList.add('fa-align-left');
        }
    }
    </script>
</head>

<body>
    <!-- including header -->
    <header>
        <?php include 'header.php'?>
    </header>


    <main>

        <?php 
            if(isset($_GET['view_details'])){
                include 'view_details.php';
            }
            else if (isset($_GET['cart_page'])){
                if (!isset($_SESSION['user_id'])){
                    echo"<script>alert('Please Log in first to access cart')</script>";
                    echo "<script>window.location='index.php';</script>";
                    
                }
                else{

                    include 'cart_page.php';
                }
            }
            else if(isset($_GET['order_history'])){
                include 'order_history.php';
            }
            else if(isset($_GET['login_page'])){
                include 'login.php';
            }
            else if(isset($_GET['register_page'])){
                include 'register.php';
            }
            else{
                include 'products_home.php';
            }
        ?>
    </main>

    <footer>
        <?php 
                include 'footer.php';
            ?>
    </footer>
    <!-- Bootstrap javascript link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/8242ed1443.js" crossorigin="anonymous"></script>

</body>

</html>