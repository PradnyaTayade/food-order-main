
<!DOCTYPE html>
<html>
    <head>
        <title>User Sign-up!!</title>
        <?php include 'css/style.php' ?>
        <?php include 'links/links.php'?>
    </head>
    <body>
    <?php
    include('config/constants.php');
    if(isset($_POST['submit']))
    { 
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $username=mysqli_real_escape_string($conn,$_POST['username']);
        $address=mysqli_real_escape_string($conn,$_POST['address']);
        $email=mysqli_real_escape_string($conn,$_POST['email']);
        $contact=mysqli_real_escape_string($conn,$_POST['mobile']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        $cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);

        $pass=password_hash($password,PASSWORD_BCRYPT);
        $cpass=password_hash($cpassword,PASSWORD_BCRYPT);

        $emailquery="select * from tbl_user where email='$email'";
        $query=mysqli_query($conn,$emailquery);
        $emailcount =mysqli_num_rows($query);

        if($emailcount>0){
            ?>
                   <script>
                       alert("Email already exists");
                       </script>
                    <?php

        }else{
            if($password=== $cpassword){
               $insertquery="insert into tbl_user(name,username,address,
               email,contact,password,cpassword) values ('$name','$username','$address','$email',
               '$contact','$pass','$cpass')";
               $iquery= mysqli_query($conn,$insertquery);

               if($iquery){
                   ?>
                    <script>
                       alert("Account created successfully");
                    </script>
                    
                   <?php
               }else{
                   ?>
                   <script>
                       alert("Account not created");
                       </script>
                    <?php   
               }





            }else{
                ?>
                <script>
                       alert("Passwords are not matching");
                </script>

                <?php
            }
        }

    }
    
    



    


    ?>

        <div class="card bg-light">
            <br>
            <br>
            <article class="card-body mx-auto" style="max-width:400px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center"> Get started with your free account</p>
            <p class="divider-text">
                <span class="bg-light"></span>
            </p>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i></span>
                    </div>
                    <input name="name" class="form-control" placeholder="Name" type="text" required>
                    </div><!--form-group input group//-->
                    <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user-circle-o "></i></span>
                    </div>
                    <input name="username" class="form-control" placeholder="Username" type="text" required>
                    </div><!--form-group input group//-->
                    <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-address-book "></i></span>
                    </div>
                    <input name="address" class="form-control" placeholder="Address" type="text" required>
                    </div><!--form-group input group//-->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input name="email" class="form-control" placeholder="Email Address" type="email" required>
                        </div><!--form-group // -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            </div>
                            <input name="mobile" class="form-control" placeholder="Phone number" type="number" required>
                            </div><!--form- group//-->
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                <input class="form-control" placeholder="Create Password" type="password" name="password" value="" required>
                                </div><!--form-group//-->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                <input class="form-control" placeholder="Repeat password" type="password" name="cpassword" required>
                                </div><!--form-group//-->
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
                                    </div><!--form-group//-->
                                    <p class="text-center">Have an account?<a href="login.php">Log In</a></p>
                                <br>
                                <br>
                                </form>
                            </article>
                            </div><!--card//-->
                        </div>
                    </div>
                </div>
    </body>
</html>