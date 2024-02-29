<section class="h-100 mainSection" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black"><b>Shopping Cart</b></h3>

                </div>


                <?php 
                    $user_id = $_SESSION["user_id"];
                    $user_Name = $_SESSION["user_Name"];
                    $query = "SELECT * FROM products,orders WHERE orders.user_id = $user_id AND orders.product_id = products.product_id AND orders.order_status = 'Pending'";
                    $result1 = mysqli_query($con,$query);
                  
                    $row = mysqli_num_rows($result1);
                    $total_price=0;
                    if (isset($_POST['cart_checkout'])){
                        $result2 = mysqli_query($con,$query);
                        while ($reader = mysqli_fetch_assoc($result2)){
                            $total_price+=$reader['product_price'];
                        }
                        //fix alert box 
                        echo"<script>alert('You paid Rs. ".$total_price.". An email has been sent to you')</script>";
                        $update_query= "UPDATE orders SET order_status = 'Paid' WHERE user_id = $user_id AND order_status = 'Pending'";
                        $update_result = mysqli_query($con,$update_query);


                        //mail message
                        // $mail_message = "Hi" . $user_Name .",\n\nThanks you buying an item from our test e-commerce website.\n\nRegards\nHuzaifa Rizwan\nE-Commerce Owner.";
                        // wordwrap($mail_message,70);
                        // mail("huzaifa.rizwan1231@gmail.com","Purchase Complete",$mail_message);

                        echo "<script>window.location='index.php?cart_page';</script>";

                        


                    }
                    if ($row == 0){
                        echo "<h3 class = 'text-center m-1'>Cart is Empty</h3>";

                    }
                    else {
                        echo"
            <div class='container-fluid text-center'>
                        <div class='row HeadingBorder mb-4 ProductInCart'>
                            <div class='col-6 col-md-6'>
                                PRODUCT
                            </div>
                            <div class='col-3 col-md-3'>
                                PRICE

                            </div>

                            <div class='col-3 col-md-3'>
                                REMOVE

                            </div>
                        </div>

                    </div>
                    
                    
                    ";
                        while ($reader = mysqli_fetch_assoc($result1)){
                            
                            if ($_GET['cart_page'] == $reader['product_id']){
                                $prod_id = $reader['product_id'];
                                $query2 = "DELETE FROM orders WHERE user_id = $user_id AND product_id = $prod_id  AND order_status = 'Pending'";
                                $result2 = mysqli_query($con,$query2); 
                                echo "<script>window.location='index.php?cart_page';</script>";
                            }
                            else{
                                echo "<div class='card rounded-3 mb-4 cartCard'>
                                <div class='card-body p-4'>
                                    <div class='row d-flex justify-content-between align-items-center'>
                                        <div class='col-3 col-md-3 text-center'>
                                            <img src='./admin/Products_images/".$reader['product_image1']."'
                                                class='img-fluid rounded-3 ProductImageInCart' alt='Cotton T-shirt'>
                                        </div>
                                        <div class='col-3 col-md-3 '>
                                            <p class=' mb-2 ProductInCart'><b>".$reader['product_name']."</b></p>
                                        </div>
                                        
                                        <div class='col-3 col-md-3 text-center '>
                                            <h5 class='mb-0 ProductInCart'><b>Rs. ".$reader['product_price']."</b></h5>
                                        </div>
                                        <div class='col-3 col-md-3 text-center '>
                                            <a href='index.php?cart_page=".$reader['product_id']."' class='text-danger ProductInCart'><i class='fas fa-trash fa-lg'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                            }
                        }

                        if ($row > 0){
                            echo"
                                <form action='' method='post' class = ' text-center'>
                                
                                <input type='submit' value = 'Pay Now' name = 'cart_checkout' class='loginButton'>
                                </form>
                           ";
                        }
                        
                        
                    }
                
                ?>







            </div>
        </div>
    </div>
</section>