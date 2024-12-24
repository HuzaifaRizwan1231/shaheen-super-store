<?php
session_start();

if (!isset($_SESSION["is_admin_login"])) {
    $_SESSION["is_admin_login"] = false;
}

if (isset($_POST['logout_admin'])) {
    session_unset();
    session_destroy();

    session_start();
    $_SESSION["is_admin_login"] = false;

    echo "<script>window.location='index.php';</script>";
}
include '../includes/connect.php';

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
    <link rel="stylesheet" href="../style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./admin.css">

    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/8242ed1443.js" crossorigin="anonymous"></script>

    <script>
        function changeClass() {
            var element = document.getElementById('navButton');
            var sidebar = document.getElementById('sidebar');

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

            if (sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            } else {
                sidebar.classList.add('active');
            }
        }
    </script>

    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="./script.js"> </script>

</head>

<body>
    <?php include './toast.php' ?>
    <!-- including header -->
    <header class="mainSection">
        <?php include 'adminheader.php'; ?>
    </header>




    <footer>
        <?php include '../footer.php'; ?>
    </footer>







</body>


</html>