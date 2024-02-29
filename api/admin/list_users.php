<section class="h-100 mainSection" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black"><b>Users</b></h3>
                </div>


                <?php 
          $query = "SELECT * FROM users";
          $query_result = mysqli_query($con,$query);
          $row = mysqli_num_rows($query_result);

        if ($row == 0){
            echo "<h3 class = 'text-center m-1'>No Users</h3>";
            
        }
        else{
            echo"
            <div class='container-fluid text-center '>
                        <div class='row HeadingBorder d-md-flex d-none mb-4'>
                            <div class='col-md-2'>
                                ID
                            </div>
                            <div class='col-md-4'>
                                EMAIL

                            </div>

                            <div class='col-md-2'>
                                NAME

                            </div>
                            <div class='col-md-2'>
                               PASSWORD

                            </div>
                            <div class='col-md-2'>
                            DELETE

                        </div>
                        </div>

                    </div>
                    
                    
                    ";

            while ($reader = mysqli_fetch_assoc($query_result)){
                
                $user_id = $reader['user_id'];
                $user_Email = $reader['user_login_id'];
                $user_FullName = $reader['user_fullName'];
                $user_Password = $reader['user_password'];
    
                

            
                    echo "
                    
                    <div class='card rounded-3 mb-4'>
                    <div class='card-body p-4'>
                        <div class='row d-flex align-items-center'>
                            <div class='col-md-2 col-12 text-center'>
                                <h5 class='mb-0 ProductInViewProduct'><b><span class='d-inline d-md-none'>ID:</span> $user_id</b></h5>
                            </div>
                            <div class='col-md-4 col-12 text-center m-0'>
                            <h5 class='mb-0 ProductInViewProduct'><b><span class='d-inline d-md-none'>EMAIL:</span> $user_Email
                            </b></h5>
                            
                                
                            </div>
                            
                                
                                <div class='col-md-2 col-12 text-center'>
                                    <h5 class='mb-0 ProductInViewProduct'><b><span class='d-inline d-md-none'>USER:</span> $user_FullName
                                    </b></h5>
                                </div>
                                <div class='col-md-2 col-12 text-center'>
                                <h5 class='mb-0 ProductInViewProduct'><b><span class='d-inline d-md-none'>PASSWORD:</span> $user_Password
                                </b></h5>
                                </div>
                                <div class='col-md-2 col-12 p-2 p-md-0 text-center'>
                                <a href='index.php?delete_user=$user_id' class='text-danger ProductInViewProduct MobileViewButton'><i class='fas fa-trash fa-lg '></i><span class='mx-2 d-inline d-md-none'>Delete</span></a>
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