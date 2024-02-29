<section class="h-100 mainSection" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black"><b>Products</b></h3>
                </div>


                <?php
                $query = "SELECT * FROM products";
                $query_result = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_result);

                if ($row == 0) {
                    echo "<h3 class = 'text-center m-1'>No Products Added</h3>";
                } else {
                    echo "
            <div class='container-fluid text-center '>
                        <div class='row HeadingBorder d-md-flex d-none mb-4'>
                            <div class='col-md-2'>
                                ID
                            </div>
                            <div class='col-md-4'>
                                PRODUCT

                            </div>

                            <div class='col-md-2'>
                                PRICE

                            </div>
                            <div class='col-md-2'>
                                EDIT

                            </div>
                            <div class='col-md-2'>
                            DELETE

                            </div>
                        </div>

                    </div>
                    
                    
                    ";

                    while ($reader = mysqli_fetch_assoc($query_result)) {

                        $product_id = $reader['product_id'];
                        $product_name = $reader['product_name'];
                        $product_price = $reader['product_price'];
                        $product_image = $reader['product_image1'];



                        echo "
                    
                    <div class='card rounded-3 mb-4'>
                    <div class='card-body p-4'>
                        <div class='row d-flex align-items-center'>
                            <div class='col-md-2 col-12 text-center'>
                                <h5 class='mb-0 ProductInViewProduct'><b><span class='d-inline d-md-none'>ID:</span> $product_id</b></h5>
                            </div>
                            <div class='col-md-3 col-12 '>
                            <h5 class='mb-0 ProductInViewProduct'><b><span class='d-inline d-md-none'>NAME:</span> $product_name</b></h5>
                                
                                
                            </div>
                            <div class='col-md-1 col-lg-1 col-xl-1 text-md-left text-center'>
                                                    <img src='./Products_images/$product_image'
                                                        class='img-fluid rounded-3 ImageInViewProduct' alt='Cotton T-shirt'>
                                                </div>
                                
                                <div class='col-md-2 col-12 text-center'>
                                    <h5 class='mb-0 ProductInViewProduct'><b><span class='d-inline d-md-none'>PRICE:</span> Rs. $product_price
                                    </b></h5>
                                </div>
                                <div class='col-md-2 p-2 p-md-0 col-6 text-center'>
                                <a href='index.php?edit_product=$product_id' class='text-danger ProductInViewProduct MobileViewButton'><i class='fa-solid fa-pen fa-lg'></i><span class='d-inline d-md-none mx-2'>Edit</span></a>
                                </div>
                                <div class='col-md-2 p-2 p-md-0 col-6 text-center'>
                                <a href='index.php?delete_product=$product_id' class='text-danger ProductInViewProduct MobileViewButton'><i class='fas fa-trash fa-lg'></i><span class='mx-2 d-inline d-md-none'>Delete</span></a>
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