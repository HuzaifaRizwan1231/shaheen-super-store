<section class="h-100 mainSection" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black"><b>View Categories</b></h3>
                </div>


                <?php 
        

            $query = "SELECT * FROM categories";
            $query_result = mysqli_query($con,$query);
                $row = mysqli_num_rows($query_result);

        
        

                if ($row == 0){
                echo "<h3 class='text-center m-1'>No Categories Added</h3>";

                }
                else{
                echo"
                <div class='container-fluid text-center '>
                    <div class='row HeadingBorder mb-4'>
                        <div class='col-md-2 col-2 ProductInCart'>
                            ID
                        </div>
                        <div class='col-md-6 col-5 ProductInCart'>
                            NAME

                        </div>

                        <div class='col-md-2 col-2 ProductInCart'>
                            EDIT

                        </div>
                        <div class='col-md-2 col-3 ProductInCart'>
                            DELETE

                        </div>
                    </div>

                </div>


                ";

                while ($reader = mysqli_fetch_assoc($query_result)){
                    $category_id = $reader['category_id'];
                    $category_name = $reader['category_name'];

                echo "

                <div class='card rounded-3 mb-4'>
                    <div class='card-body p-4'>
                        <div class='row d-flex align-items-center'>
                            <div class='col-md-2 col-2 text-center'>
                                <h5 class='mb-0 ProductInCart'><b>$category_id</b></h5>
                            </div>
                            <div class='col-md-6 col-5 text-center'>
                                <h5 class='mb-0 ProductInCart'><b>$category_name</b></h5>
                                
                                
                            </div>
                            

                            <div class='col-md-2 col-2 text-center'>
                            <a href='index.php?edit_category=$category_id' class='text-danger'><i class='fa-solid fa-pen fa-lg '></i></a>
                            </div>
                            <div class='col-md-2 col-3 text-center'>
                            <a href='index.php?delete_category=$category_id' class='text-danger'><i class='fas fa-trash fa-lg '></i></a>
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
                <button class="SubmitButton shiftButton w-75" type="button"><a href="index.php?shift_category_of_products"
                        class="nav-link">Shift
                        products of one
                        Category to Another Category</a></button>
            </div>
        </div>
    </div>
</section>