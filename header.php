<nav class="navbar navbar-expand-lg bg-body-tertiary TopBar">
    <div class="container-fluid">
        <a class="navbar-brand" href="./index.php"><img class="Logo" src="./image/shaheen-super-store-logo1.png"
                alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="changeClass()">
            <i id="navButton" class='fas fa-align-left'></i>
        </button>
        <div class="collapse navbar-collapse z-3" id="navbarSupportedContent">
            <form class="d-flex searchBarMobile mb-2" method="post">
                <input class="form-control me-2 searchBarMobile" type="text" name="search_product_field" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-outline-success searchBarMobile" type="submit" name="search_product"><i
                        class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </form>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 upperList">
                <li class="nav-item me-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- loading categories from the database -->
                        <?php 
                        
                        $query = "SELECT * FROM categories";
                        $query_result = mysqli_query($con,$query);
                        $numOfRows = mysqli_num_rows($query_result);
                        $i = 0;
                        while ($reader = mysqli_fetch_assoc($query_result)){
                            $i = $i + 1;
                            $cat_id = $reader['category_id'];
                            $cat_name = $reader['category_name'];
                            
                            if ($i == $numOfRows){
                                echo"
                                <li class='border-0'><a class='dropdown-item' href='index.php?category=$cat_id'>$cat_name</a></li>";
                            }
                            else{
                                echo"
                                <li><a class='dropdown-item' href='index.php?category=$cat_id'>$cat_name</a></li>";
                            }
                        }                        
                        ?>



                    </ul>
                </li>
                <li class="nav-item me-3 dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Brand
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- loading brands from the database -->
                        <?php 
                        
                        $query = "SELECT * FROM brands";
                        $query_result = mysqli_query($con,$query);
                        $numOfRows = mysqli_num_rows($query_result);
                        $i = 0;

                        while ($reader = mysqli_fetch_assoc($query_result)){
                            $i = $i + 1;
                            $brand_id = $reader['brand_id'];
                            $brand_name = $reader['brand_name'];

                            if ($i == $numOfRows){                            
                                echo"
                                <li class='border-0'><a class='dropdown-item' href='index.php?brand=$brand_id'>$brand_name</a></li>";
                            }
                            else{
                                echo"
                                <li><a class='dropdown-item' href='index.php?brand=$brand_id'>$brand_name</a></li>";
                            }
                        }                        
                        ?>


                    </ul>
                </li>
                <li class="nav-item me-3">
                    <a class="nav-link" href="index.php?all_products">Products</a>
                </li>






            </ul>
            <form class="d-flex me-3 searchBarDesktop" method="post">
                <input class="form-control me-2 searchBarDesktop" type="text" name="search_product_field" placeholder="Search"
                    aria-label="Search">
                <button class="btn btn-outline-success searchBarDesktop" type="submit" name="search_product"><i
                        class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0 lowerList">
                <?php 

                    if (isset($_POST['logout_user'])){
                        session_unset();
                        session_destroy();

                        session_start();
                        $_SESSION["is_login"] = false;

                        echo "<script>window.location='index.php';</script>";
                    }

                    if ($_SESSION["is_login"] == true){
                        echo"<li class='nav-item me-3 dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button'
                            data-bs-toggle='dropdown' aria-expanded='false'>
                            <i class='fa-sharp fa-solid fa-user me-1'></i>".$_SESSION["user_Name"]."
                        </a>
                        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        
                        <li><a class='dropdown-item' href='index.php?order_history'>Your Order History</a></li>
                        <li class='border-0'>
                            <form action='' method='post'>
                            <input type='submit' class='dropdown-item' name=logout_user value='Logout'>
                            </form>
                        </li>
                            


                        </ul>
                        </li>";
                    }

                    else {
                    echo"<li class='nav-item me-3'>
                        <a class='nav-link' href='index.php?login_page'><i class='fa-sharp fa-solid fa-user me-1'></i>Login</a>
                    </li>";
                    }
                ?>

                <li class="nav-item me-3 border-0">
                    <a class="nav-link" href="index.php?cart_page"><i
                            class="fa-sharp fa-solid fa-cart-shopping me-1"></i>Cart</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row AdminBar text-center mb-2">
        <p class="my-auto"><span class="adminBarSpan">Are you an Admin?</span> Go to the <a href="./admin/index.php" target="_blank"><i>Admin
                    DashBoard</i></a></p>
    </div>
</div>