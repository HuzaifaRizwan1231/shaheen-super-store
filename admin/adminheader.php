<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar" class="my-2  ">


        <ul class="list-unstyled mt-4 mx-2 text-center">
            <li>
                <a href="index.php" class="w-100">Dashboard</a>
            </li>
            <li>
                <a href="#ProductSubmenu" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="ProductSubmenu"
                    class="dropdown-toggle">Products</a>
                <ul class="collapse list-unstyled" id="ProductSubmenu">
                    <li>
                        <a href="index.php?insert_product">Insert
                            Products</a>
                    </li>
                    <li>
                        <a href="index.php?view_product">View
                            Products</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#CategorySubmenu" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle">Categories</a>
                <ul class="collapse list-unstyled" id="CategorySubmenu">
                    <li>
                        <a href="index.php?insert_category">Insert
                            Categories</a>
                    </li>
                    <li>
                        <a href="index.php?view_category">View
                            Categories</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#BrandSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Brands</a>
                <ul class="collapse list-unstyled" id="BrandSubmenu">
                    <li>
                        <a href="index.php?insert_brand">Insert
                            Brands</a>
                    </li>
                    <li>
                        <a href="index.php?view_brand">View
                            Brands</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.php?all_orders">All
                    orders</a>
            </li>
            <li>
                <a href="index.php?list_users">List
                    Users</a>
            </li>
            <hr class="mx-3">
            <?php
            if ($_SESSION["is_admin_login"] == true) {
                echo "
                                <li class='nav-item mx-auto dropdown'>
                                    <a href='#AdminSubmenu' class='nav-link dropdown-toggle' style='padding-right:35px;' id='navbarDropdown' role='button'
                                    data-toggle='collapse' aria-expanded='false'><i class='fa-sharp fa-solid fa-user me-1'></i>
                                            " . $_SESSION['admin_Name'] . "</a>
                                    <ul class='collapse list-unstyled' id='AdminSubmenu'>
                                        <li>
                                           
                                                <form action='' method='post'>
                                                <input type='submit' class='dropdown-item' name=logout_admin value='Logout'>
                                            </form>
                                           
                                        </li>
                                    </ul>
                                </li>
                                ";
            } else {
                echo "<li class='nav-item me-3'>
                                <a class='nav-link' href='index.php'><i class='fa-sharp fa-solid fa-user me-1'></i>Login</a>
                            </li>";
            }
            ?>



        </ul>


    </nav>

    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar p-0 container-fluid  navbar-expand-lg bg-body-tertiary TopBar my-auto">
            <div style="height: 80px; width:100%" class="row m-0 d-flex justify-content-between ">
                <div class="col-10 col-md-12 text-md-center  me-auto" style=" height: 100%;">
                    <a class="w-80  px-0 " href="./index.php">
                        <img class="object-fit-contain " style=" height: 90%;" src="../image/shaheen-super-store-logo1.png" alt="">
                    </a>
                </div>
                <div class="col-2 col-md-0 d-md-none ms-auto text-end justify-content-center d-flex align-items-center" style=" height: 90%;">





                    <!-- Toggle button -->
                    <button type="button" id="sidebarCollapse" class="btn btn-info w-20" onclick="changeClass()">
                        <i id="navButton" class='fas fa-align-left'></i>

                    </button>
                </div>
            </div>

        </nav>


        <!-- content -->
        <main>
            <div class="container-fluid mt-4">
                <div class="container px-0 px-md-2">
                    <?php
                    if ((isset($_GET['insert_product']) || isset($_GET['insert_category']) || isset($_GET['view_product']) || isset($_GET['view_category']) || isset($_GET['insert_brand']) || isset($_GET['view_brand']) || isset($_GET['all_orders']) || isset($_GET['list_users']) || isset($_GET['edit_category']) || isset($_GET['edit_product']) || isset($_GET['delete_product']) || isset($_GET['delete_category']) || isset($_GET['edit_brand']) || isset($_GET['delete_brand']) || isset($_GET['shift_brand_of_products']) || isset($_GET['shift_category_of_products']) || isset($_GET['delete_user'])) && $_SESSION["is_admin_login"] != true) {
                        echo "<script>triggerToast( 'Please Login First to Access this page', 'danger','index.php')</script>";
                    } else if ($_SESSION["is_admin_login"] != true) {
                        include 'adminLogin.php';
                    } else {
                        if (isset($_GET['insert_product'])) {
                            include 'insert_products.php';
                        }
                        if (isset($_GET['insert_category'])) {
                            include 'insert_categories.php';
                        }
                        if (isset($_GET['view_product'])) {
                            include 'view_products.php';
                        }


                        if (isset($_GET['view_category'])) {
                            include 'view_categories.php';
                        }

                        if (isset($_GET['insert_brand'])) {
                            include 'insert_brands.php';
                        }

                        if (isset($_GET['view_brand'])) {
                            include 'view_brands.php';
                        }

                        if (isset($_GET['all_orders'])) {
                            include 'all_orders.php';
                        }

                        if (isset($_GET['list_users'])) {
                            include 'list_users.php';
                        }

                        if (isset($_GET['edit_category'])) {
                            include 'edit_category.php';
                        }

                        if (isset($_GET['edit_product'])) {
                            include 'edit_product.php';
                        }

                        if (isset($_GET['delete_product'])) {
                            $product_id = $_GET['delete_product'];
                            $query = "SELECT * FROM products WHERE product_id = $product_id";
                            $result = mysqli_query($con, $query);
                            $reader = mysqli_fetch_assoc($result);

                            $image1 = $reader['product_image1'];
                            $image2 = $reader['product_image2'];
                            $image3 = $reader['product_image3'];

                            $path = "./Products_images/$image1";
                            unlink($path);

                            $path = "./Products_images/$image2";
                            unlink($path);

                            $path = "./Products_images/$image3";
                            unlink($path);




                            $query = "DELETE FROM products WHERE product_id = $product_id";
                            $result = mysqli_query($con, $query);

                            $query = "DELETE FROM orders WHERE product_id = $product_id";
                            $result = mysqli_query($con, $query);

                            if ($result) {

                                echo "<script>triggerToast( 'Product and related orders deleted successfully', 'success')</script>";
                            }
                        }


                        if (isset($_GET['delete_category'])) {
                            $category_id = $_GET['delete_category'];
                            $query = "DELETE FROM products WHERE product_category_id = $category_id";
                            $result = mysqli_query($con, $query);



                            $query = "DELETE FROM categories WHERE category_id = $category_id";
                            $result = mysqli_query($con, $query);
                            if ($result) {

                                echo "<script>triggerToast( 'Category and related products deleted successfully', 'success')</script>";
                            }
                        }


                        if (isset($_GET['edit_brand'])) {
                            include 'edit_brand.php';
                        }

                        if (isset($_GET['delete_brand'])) {
                            $brand_id = $_GET['delete_brand'];
                            $query = "DELETE FROM products WHERE product_brand_id = $brand_id";
                            $result = mysqli_query($con, $query);



                            $brand_id = $_GET['delete_brand'];
                            $query = "DELETE FROM brands WHERE brand_id = $brand_id";
                            $result = mysqli_query($con, $query);
                            if ($result) {

                                echo "<script>triggerToast( 'Brand and related products deleted successfully', 'success')</script>";
                            }
                        }

                        if (isset($_GET['shift_brand_of_products'])) {
                            include 'shift_brand.php';
                        }

                        if (isset($_GET['shift_category_of_products'])) {
                            include 'shift_category.php';
                        }

                        if (isset($_GET['delete_user'])) {
                            $user_id = $_GET['delete_user'];

                            $query = "DELETE FROM orders WHERE user_id = $user_id";
                            $result = mysqli_query($con, $query);


                            $query = "DELETE FROM users WHERE user_id = $user_id";
                            $result = mysqli_query($con, $query);

                            if ($result) {

                                echo "<script>triggerToast( 'User and related order history deleted successfully', 'success')</script>";
                            }
                        }
                    }
                    ?>







                </div>
            </div>
        </main>

    </div>

</div>