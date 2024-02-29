<section class="h-100 mainSection" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black"><b>Orders</b></h3>
                </div>


                <?php 
         $query = "SELECT * FROM orders";
         $query_result = mysqli_query($con,$query);
         $row = mysqli_num_rows($query_result);
        
        if ($row == 0){
            echo "<h3 class = 'text-center m-1'>No Orders</h3>";
            
        }
        else{
            echo"
            <div class='container-fluid text-center '>
                        <div class='row HeadingBorder mb-4'>
                            <div class='col-md-1'>
                                ID
                            </div>
                            <div class='col-md-4'>
                                PRODUCT

                            </div>

                            <div class='col-md-2'>
                                PRICE

                            </div>
                            <div class='col-md-3'>
                                USER

                            </div>
                            <div class='col-md-2'>
                            STATUS

                        </div>
                        </div>

                    </div>
                    
                    
                    ";

            while ($reader = mysqli_fetch_assoc($query_result)){
                
                $order_id = $reader['order_id'];

                $user_id = $reader['user_id'];
                $user_query = "SELECT * FROM users WHERE user_id = $user_id";
                $user_result = mysqli_query($con,$user_query);
                $user_reader = mysqli_fetch_assoc($user_result);
                $user_name = $user_reader['user_fullName'];

                $product_id = $reader['product_id'];
                $product_query = "SELECT * FROM products WHERE product_id = $product_id";
                $product_result = mysqli_query($con,$product_query);
                $product_reader = mysqli_fetch_assoc($product_result);
                $product_name = $product_reader['product_name'];
                $product_image = $product_reader['product_image1'];
                $product_price = $product_reader['product_price'];

                $order_status = $reader['order_status'];
                

            
                    echo "
                    
                    <div class='card rounded-3 mb-4'>
                    <div class='card-body p-4'>
                        <div class='row d-flex align-items-center'>
                            <div class='col-md-1 col-lg-1 col-xl-1 text-center'>
                                <h5 class='mb-0'><b>$order_id</b></h5>
                            </div>
                            <div class='col-md-3 col-lg-3 col-xl-3 '>
                            <h5 class='mb-0'><b>$product_name</b></h5>
                                
                                
                            </div>
                            <div class='col-md-1 col-lg-1 col-xl-1'>
                                                    <img src='./Products_images/$product_image'
                                                        class='img-fluid rounded-3' alt='Cotton T-shirt'>
                                                </div>
                                
                                <div class='col-md-2 col-lg-2 col-xl-2 text-center'>
                                    <h5 class='mb-0'><b>Rs. $product_price
                                    </b></h5>
                                </div>
                                <div class='col-md-3 col-lg-3 col-xl-3 text-center'>
                                <h5 class='mb-0'><b>$user_name
                                    </b></h5>
                                </div>
                                <div class='col-md-2 col-lg-2 col-xl-2 text-center'>
                                <h5 class='mb-0'><b>$order_status
                                </b></h5>
                                </div>
                        </div>
                    </div>
                </div>
                
                ";
                }
            }
            
        
                     
        
        ?>

            </div>
        </div>
    </div>
</section>