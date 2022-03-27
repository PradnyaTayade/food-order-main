<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <?php include 'css/style.php' ?>
    <?php include 'links/links.php'?>
</head>
<body>
<?php
include('config/constants.php');
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $username_search ="select * from tbl_user where username='$username'";
    $query=mysqli_query($conn,$username_search);
    $count=mysqli_num_rows($query);
    $username_pass=mysqli_fetch_assoc($query);
    $db_pass=$username_pass['password'];
    $pass_decode= password_verify($password, $db_pass);
    if($count==1 && $pass_decode){
        
            
            $_SESSION['login'] ="<div class='success'>Login Successfully</div>";
            $_SESSION['user'] = $username; //2. comment this as well and go to login check.php
            header('location:'.SITEURL.'index.php');
            
        


    }
    else{
        $_SESSION['login']= "<div class='error' text='center'>Username or Password did not match</div>";
        header('location:'.SITEURL.'login.php');
    }



}
?>
<div class="card bg-light">
<br>
<br>
<br>
<br>
<br>
  <article class="card-body mx-auto" style="max-width:400px;">
        <h4 class="card-title mt-3 text-center">USER LOGIN</h4>
        <p class="text-center"> Get started with your free account</p>
        <?php
                 if(isset($_SESSION['login']))
                 {
                 echo $_SESSION['login'];
                 unset($_SESSION['login']);
                 }
                if(isset($_SESSION['no-login'])){
                    echo $_SESSION['no-login'];
                    unset($_SESSION['no-login']);

                }
               ?>
        <p class="divider-text">
            <span class="bg-light"></span>
         </p>
   <form action="" method="POST">
   <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user-circle-o "></i></span>
                    </div>
                    <input name="username" class="form-control" placeholder="Username" type="text" required>
                    </div><!--form-group input group//-->
                    <div class="form-group input-group">
                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                <input class="form-control" placeholder="Password" type="password" name="password" value="" required>
                                </div><!--form-group//-->
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
                                    </div><!--form-group//-->
                                    <p class="text-center">Don't have an account?<a href="user-signup.php">Sign-up</a></p>
                                
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </form>
                            </article>
</div>
</body>
</html>