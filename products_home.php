<?php 
    if (isset($_GET['add_to_cart'])){
        if (!isset($_SESSION["user_id"])){
            echo"<script>alert('Please Log in first to add items to cart')</script>";
        }
        else{
            $user_id = $_SESSION["user_id"];
            $product_id = $_GET['add_to_cart'];
            $query = "SELECT * FROM orders WHERE user_id = '$user_id' AND product_id = '$product_id' AND order_status = 'Pending'";
            $result = mysqli_query($con,$query);
            $rows = mysqli_num_rows($result);
            if ($rows == 1){
                echo"<script>alert('Product is already added to Cart')</script>";
            }
            else{
                $query = "INSERT INTO orders(user_id,product_id,order_status) VALUES ($user_id,$product_id,'Pending')";
                $result = mysqli_query($con,$query);
                echo"<script>alert('Added to Cart')</script>";
            }
        }
    }

?>
<div class="mainSection">
    <div class="container-fluid carousel-container mb-5">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./image/71Ie3JXGfVL._SX3000_.jpg" class="d-block w-100 object-fit-fill" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./image/71QRxZvKnGL._SX3000_.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./image/71U-Q+N7PXL._SX3000_.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container-fluid Products mb-4">
        <h3 class="mb-5">
        <b>
            <?php if (isset($_GET['all_products'])){
                echo"All Products";
            }
            else{
                echo"Todays Best Deals For You!";
            }
            ?>
        </b>
        </h3>
        <div class="row">


            <!-- Products -->


            <?php 
                $show_view_all_button = false;
                if(isset($_GET['brand'])){
                    $selected_brand = $_GET['brand'];
                    $query = "SELECT * FROM products WHERE product_brand_id = $selected_brand ORDER BY RAND()";
                    $show_view_all_button = true;
                }
                else if(isset($_POST['search_product'])){
                    $search_prod = $_POST['search_product_field'];
                    $query = "SELECT * FROM products WHERE product_name LIKE '%$search_prod%' OR  product_description LIKE '%$search_prod%' OR product_keywords LIKE '%$search_prod%'";
                    $show_view_all_button = true;
                }
                else if (isset($_GET['category'])){
                    $selected_category = $_GET['category'];
                    $query = "SELECT * FROM products WHERE product_category_id = $selected_category ORDER BY RAND()";
                    $show_view_all_button = true;
                }
                else if (isset($_GET['all_products'])){
                    $query = "SELECT * FROM products ORDER BY RAND()";
                }
                else{
                    $query = "SELECT * FROM products ORDER BY RAND() LIMIT 6";
                    $show_view_all_button = true;
                }
                $result = mysqli_query($con,$query);
                $products_row = mysqli_num_rows($result);
                while ($reader = mysqli_fetch_assoc($result)){

                    $product_id = $reader['product_id'];
                    $product_name = $reader['product_name'];
                    $product_desc = $reader['product_description'];
                    $product_price = $reader['product_price'];
                    $product_image1 = $reader['product_image1'];
                    $product_image2 = $reader['product_image2'];
                    $product_image3 = $reader['product_image3'];




                    echo"<div class='col-md-4 mb-3'>
                    
                        <div class='card ProductCard'>
                        
                            <img class='card-img-top productImage' src='./admin/Products_images/$product_image1' alt='Card image cap'>
                            <div class='card-body'>
                                <div class= 'price_product d-flex'>
                                
                                        <h3 class='card-title'><b>$product_name</b></h3>
                                        <h3 class='card-title mb-3'><b>Rs. $product_price</b></h3>
                                    
                                </div>
                                <p class='card-text mb-4'>$product_desc</p>

                                <a href='index.php?add_to_cart=$product_id' class=' ProductButtonCart'><i
                                class='me-1 fa fa-shopping-basket'></i>Add to Cart</a>
                                <a href='index.php?view_details=$product_id' class='ProductButtonView'>View More</a>
                            </div>
                            
                        </div>
                      
                </div>";

                
                }

                if ($products_row == 0 && !isset($_POST['search_product'])){
                    echo"<h3 class = 'text-center'>Out of Stock</h3>";
                }
                else if($products_row == 0 && isset($_POST['search_product'])){
                    echo"<h3 class = 'text-center'>No Results Found</h3>";
                }

                else if( $show_view_all_button == true){
                    echo"
                    <div class='col-md-12 text-center d-flex justify-content-center mt-3'>
                    <a class = ' ViewAllProducts'href='index.php?all_products'>View All Products</a>
                    </div>
                ";
                }

                


                
            ?>





        </div>
    </div>
</div>