<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>Add Admin</h1>
    <br><br>
    <?php
if(isset($_SESSION['add']))//checking whether the session is set or not
{
    echo $_SESSION['add'];//display the session message if set 
    unset($_SESSION['add']);//removing session message
}
?>

<form action="" method="POST" > 
    <table class="tbl-30">
        <tr>
            <td>Full_Name: </td>
            <td>
                <div class="inputBox">
                    <input type="text" name="full_name" placeholder="Enter Your Name">
                </div>
            </td>
        </tr>

        <tr>
            <td>User_Name: </td>
            <td>
                <div class="inputBox">
                    <input type="text" name="username" placeholder="Your UserName">
                </div>
            </td>
        </tr>

        <tr>
            <td>Password: </td>
            <td>
                <div class="inputBox">
                    <input type="password" name="password" placeholder="Your Password">
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="2">
            <td>
                
                <input type="submit" name="submit" value="Add Admin"  class="btn-secondary">
                
            </td>
        </tr>


    </table>
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
</div>
</div>

<?php include('partials/footer.php'); ?>

<?php
   if(isset($_POST['submit']))
   {
       $full_name =mysqli_real_escape_string($conn,$_POST['full_name']) ;
       $username =mysqli_real_escape_string($conn, $_POST['username']);
       $password =mysqli_real_escape_string($conn,md5($_POST['password'])) ;

       $sql = "INSERT INTO tbl_admin SET 
            full_name='$full_name',
            username='$username',
            password= '$password'
        ";
        //3. Executing Query and saving Data into Datebase
$res = mysqli_query($conn, $sql) or die(mysqli_error());

//4. check whether the(Query is Executed) data is instead or not and display appropriate message

if($res==TRUE)
{
//Data Inserted
//echo "Data Inserted";
//Create a Session Variable to Display Message
$_SESSION['add'] = "Admin Added Successfully";
//Redirect Page to manage Admin 
header("location:".SITEURL.'admin/manage-admin.php');
}
else {
    //Failed to Insert data
    //echo "Failed to Insert Data";
    //Create a Session Variable to Display Message
    $_SESSION['add'] = "Failed to Add Admin";
    //Redirect Page to Add Admin 
    header("location:".SITEURL.'admin/add-admin.php');
    } 
   }
   
?>