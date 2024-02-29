<?php 
                    $product_id = $_GET['view_details'];
                    $query = "SELECT * FROM products WHERE product_id = '$product_id'";
                    $result = mysqli_query($con,$query);
                    $reader = mysqli_fetch_assoc($result);

                    $product_name = $reader['product_name'];
                    $product_desc = $reader['product_description'];
                    $product_price = $reader['product_price'];
                    $product_image1 = $reader['product_image1'];
                    $product_image2= $reader['product_image2'];
                    $product_image3 = $reader['product_image3'];
                    $product_brand_id = $reader['product_brand_id'];
                    $product_category_id = $reader['product_category_id'];

                    $query = "SELECT * FROM brands WHERE brand_id = '$product_brand_id'";
                    $result = mysqli_query($con,$query);
                    $reader = mysqli_fetch_assoc($result);
                    $product_brand_name = $reader['brand_name'];
                    
                    $query = "SELECT * FROM categories WHERE category_id = '$product_category_id'";
                    $result = mysqli_query($con,$query);
                    $reader = mysqli_fetch_assoc($result);
                    $product_category_name = $reader['category_name'];

                ?>
<div class="container mainSection">


    <!-- content -->
    <section class="py-5">
        <div class="container">
            <div class="row gx-5">
                <aside class="col-lg-6">
                    <div class="border rounded-4 mb-3 d-flex justify-content-center">
                        <a data-fslightbox="mygalley" class="rounded-4" data-type="image" href="#">
                            <img id="main-image"
                                class="rounded-4 fit productImage" src="./admin/Products_images/<?php echo $product_image1?>" />
                        </a>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <button data-fslightbox="mygalley" onclick="image1_click()" class="bg-white  p-0 mx-1 rounded-2 p-images"
                            target="_blank" data-type="image" href="#">
                            <img id="image-1" width="60" height="60" class="rounded-2 object-fit-contain "
                                src="./admin/Products_images/<?php echo $product_image1?>" />
                        </button>
                        <button data-fslightbox="mygalley" onclick="image2_click()" class="bg-white p-0 mx-1 rounded-2 p-images"
                            target="_blank" data-type="image" href="#" class="item-thumb">
                            <img id="image-2" width="60" height="60" class="rounded-2 object-fit-contain"
                                src="./admin/Products_images/<?php echo $product_image2?>" />
                        </button>
                        <button data-fslightbox="mygalley" onclick="image3_click()"
                            class="bg-white  p-0 mx-1 rounded-2 p-images" target="_blank" data-type="image" href="#"
                            class="item-thumb">
                            <img id="image-3" width="60" height="60" class="rounded-2 object-fit-contain"
                                src="./admin/Products_images/<?php echo $product_image3?>" />
                        </button>



                    </div>
                    <!-- thumbs-wrap.// -->
                    <!-- gallery-wrap .end// -->
                </aside>

                <main class="col-lg-6">
                    <div class="ps-lg-3">
                        <h4 class="title text-dark mb-3">
                            <b><?php echo $product_name;?></b>
                        </h4>


                        <div class="mb-3">
                            <span class="h5"><b>Rs. <?php echo $product_price;?></b></span>

                        </div>

                        <p>
                            <?php echo $product_desc;?>
                        </p>

                        <div class="row">

                            <dt class="col-3">Category</dt>
                            <dd class="col-9"><?php echo $product_category_name;?></dd>

                            <dt class="col-3">Brand</dt>
                            <dd class="col-9"><?php echo $product_brand_name;?></dd>
                        </div>

                        <hr />



                        <a href="index.php?add_to_cart=<?php echo $product_id?>" class="ProductButtonCart"> <i
                                class="me-1 fa fa-shopping-basket"></i> Add to
                            cart </a>

                    </div>
                </main>
            </div>
        </div>
    </section>
    <!-- content -->



</div>