<?php include('../config/constants.php');  ?>

<html>
    <head>
        <title>Admin Login - Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">

    </head>

    <body>

          <div class="login">
              <h1 class="text-center">Admin Login</h1>
              <br><br>

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
            <br><br>   
             <!-- Login form starts here-->
            <form action="" method="POST" class="text-center">
             Username: <br>
             <div class="inputBox">
             <input type="text" name="username" placeholder="Enter Username">
             </div><br><br>
             Password: <br>
             <div class="inputBox">
             <input type="password" name="password" placeholder="Enter Password">
             </div><br><br>
             <input type="submit" name="submit" value="Login" class="btn-primary">
             <br><br>
            </form>
            <!-- Login form ends here-->
          </div>
</body>
</html>


<?php

//check whether submit is click or not

if(isset($_POST['submit']))
{
    $username =mysqli_real_escape_string($conn,$_POST['username']) ;
    $raw_password=md5($_POST['password']);
    $password =mysqli_real_escape_string($conn,$raw_password) ;


    $sql = "SELECT * FROM tbl_admin WHERE username ='$username' AND password='$password'";

    $res = mysqli_query($conn, $sql);


    $count = mysqli_num_rows($res);

    if($count==1)
    {
        $_SESSION['login'] ="<div class='success'>Login Successfully</div>";
        $_SESSION['user'] = $username; //2. comment this as well and go to login check.php
        header('location:'.SITEURL.'admin/');
    }
    else{
        $_SESSION['login']= "<div class='error' text='center'>Username or Password did not match</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
}
