 <?php 
//include constant.php file here 
include('../config/constants.php');

//1.get the id of admin to be deleted
echo $id = $_GET['id'];
//2. create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";
//Execute the query
    $res = mysqli_query($conn, $sql);
//  check whether query executed succ or not
if($res==TRUE)
{
//Data Inserted
//echo "Data Inserted";
//Create a Session Variable to Display Message
$_SESSION['delete'] ="<div class='success'>Admin Deleted Successfully.</div>";
//Redirect Page to manage Admin 
header('location:'.SITEURL.'admin/manage-admin.php');
}
else {
    //Failed to Insert data
    //echo "Failed to Insert Data";
    //Create a Session Variable to Display Message
    $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin.Try Again Later.</div>";
    //Redirect Page to Add Admin 
    header("location:".SITEURL.'admin/add-admin.php');
    } 

   //3. redirect to manage-admin page with message (success/error)
   
?>