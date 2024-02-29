<section class="h-100 mainSection" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black"><b>View Brands</b></h3>
                </div>


                <?php 
        

                $query = "SELECT * FROM brands";
                $query_result = mysqli_query($con,$query);
                $row = mysqli_num_rows($query_result);

        
        

                if ($row == 0){
                echo "<h3 class='text-center m-1'>No Brands Added</h3>";

                }
                else{
                echo"
                <div class='container-fluid text-center '>
                    <div class='row HeadingBorder mb-4'>
                        <div class='col-md-2'>
                            ID
                        </div>
                        <div class='col-md-6'>
                            NAME

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

                while ($reader = mysqli_fetch_assoc($query_result)){
                    $brand_id = $reader['brand_id'];
                    $brand_name = $reader['brand_name'];

                echo "

                <div class='card rounded-3 mb-4'>
                    <div class='card-body p-4'>
                        <div class='row d-flex align-items-center'>
                            <div class='col-md-2 col-lg-2 col-xl-2 text-center'>
                                <h5 class='mb-0'><b>$brand_id</b></h5>
                            </div>
                            <div class='col-md-6 col-lg-6 col-xl-6 text-center'>
                                <h5 class='mb-0'><b>$brand_name</b></h5>
                               
                                
                            </div>
                            

                            <div class='col-md-2 col-lg-2 col-xl-2 text-center'>
                            <a href='index.php?edit_brand=$brand_id' class='text-danger'><i class='fa-solid fa-pen fa-lg'></i></a>
                            </div>
                            <div class='col-md-2 col-lg-2 col-xl-2 text-center'>
                            <a href='index.php?delete_brand=$brand_id' class='text-danger'><i class='fas fa-trash fa-lg'></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                ";
                }
            }
                




                ?>

            </div>
            <div class="col-md-12 mt-4 text-center">
                <button class="SubmitButton w-75" type="button"><a href="index.php?shift_brand_of_products"
                        class="nav-link">Shift
                        products of one
                        Brand to Another Brand</a></button>
            </div>
        </div>
    </div>
</section>