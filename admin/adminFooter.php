<!-- Remove the container if you want to extend the Footer to full width. -->
<div class="container-fluid p-0 ">

    <!-- Footer -->
    <footer class="text-center text-lg-start text-white mt-5" style=" background-color: #002715">

        <!-- Section: Social media -->

        <!-- Section: Links  -->

        <div class="container text-center text-md-start ">
            <!-- Grid row -->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 mt-5">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold">Shaheen Super Store</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 60px; background-color: #7c4dff; height: 2px" />
                    <p>
                        A store where you can buy everything you need. With reasonable prices and swift delivery, we
                        ensure that you get the treatment you deserve .
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 mt-5 footerLinks">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Categories</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 60px; background-color: #7c4dff; height: 2px" />


                    <?php 
                            $query = "SELECT * FROM Categories LIMIT 4";
                            $result = mysqli_query($con,$query);
                            
                            while($reader = mysqli_fetch_assoc($result)){
                                $cat_name = $reader['category_name'];
                                $cat_id = $reader['category_id'];
                                echo"
                                <p>
                                <a href='index.php?category=$cat_id' class='text-white'>$cat_name</a>
                                </p>";
                            }
                        ?>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 mt-5 footerLinks">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Brands</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 60px; background-color: #7c4dff; height: 2px" />


                    <?php 
                            $query = "SELECT * FROM Brands LIMIT 4";
                            $result = mysqli_query($con,$query);
                            
                            while($reader = mysqli_fetch_assoc($result)){
                                $brand_name = $reader['brand_name'];
                                $brand_id = $reader['brand_id'];
                                echo"
                                <p>
                                <a href='index.php?brand=$brand_id' class='text-white'>$brand_name</a>
                                </p>";
                            }
                        ?>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 mt-5 footerLinks">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold">Contact</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto"
                        style="width: 60px; background-color: #7c4dff; height: 2px" />
                    <p><i class="fas fa-home mr-3"></i> Lahore, Punjab, Pakistan</p>
                    <p><i class="fas fa-envelope mr-3"></i> ShaheenSuper@gmail.com</p>
                    <p><i class="fas fa-phone mr-3"></i> + 92 322 5300 470</p>
                    <p><i class="fas fa-print mr-3"></i> + 92 322 5300 470 </p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>

        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2023 Copyright:
            <a class="text-white" href="index.php">shaheensuperstore.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

</div>
<!-- End of .container -->