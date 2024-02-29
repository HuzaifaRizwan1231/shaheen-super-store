
<section class="h-100 mainSection" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-10 col-12">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black"><b>Order History</b></h3>
                </div>


                <?php 
        $user_id = $_SESSION["user_id"];
        $query = "SELECT * FROM orders WHERE user_id = $user_id";
        $query_result = mysqli_query($con,$query);
        $row = mysqli_num_rows($query_result);
        
        if ($row == 0){
            echo "<h3 class = 'text-center m-1'>No Order History</h3>";
            
        }
        else{
            echo"
            <div class='container-fluid text-center '>
                        <div class='row HeadingBorder ProductInCart mb-4'>
                          
                            <div class='col-md-6 col-6'>
                                PRODUCT

                            </div>

                            <div class='col-md-3 col-3'>
                                PRICE

                            </div>
                            <div class='col-md-3 col-3'>
                                STATUS

                            </div>
                        </div>

                    </div>
                    
                    
                    ";

            while ($reader = mysqli_fetch_assoc($query_result)){
                $order_id = $reader['order_id'];
                $order_status = $reader['order_status'];
                
                
                $product_id = $reader['product_id'];
                $query2="SELECT * FROM products WHERE product_id = $product_id";
                $result2 = mysqli_query($con,$query2);
                $reader2 = mysqli_fetch_assoc($result2);
                $product_name = $reader2['product_name'];
                $product_price = $reader2['product_price'];
                
                

            
                    echo "
                    
                    <div class='card rounded-3 mb-4'>
                    <div class='card-body p-4'>
                        <div class='row d-flex justify-content-between align-items-center'>
                          
                            <div class='col-md-3 col-3 text-center'>
                                <p class='mb-2 ProductInCart'><b>$product_name</b></p>
                                
                            </div>
                            <div class='col-md-3 col-3 text-center '>
                                                    <img src='./admin/Products_images/".$reader2['product_image1']."'
                                                        class='img-fluid rounded-3 ProductImageInCart' alt='Cotton T-shirt'>
                                                </div>
                                
                                <div class='col-md-3 col-3 text-center'>
                                    <h5 class='mb-0 ProductInCart'><b>Rs. $product_price
                                    </b></h5>
                                </div>
                                <div class='col-md-3 col-3 text-center'>
                                <h5 class='mb-0 ProductInCart'><b> $order_status</b></h5>
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