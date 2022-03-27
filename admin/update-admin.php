<?php include('partials/menu.php'); ?>

<div class="main-content">
        <div class="wrapper">
            <h1>Update Admin</h1>

            <br></br>

            <?php
            //1. Get the ID of selected admin
            $id=$_GET['id'];

            //2.Create SQL Query to Get the Details
            $sql="SELECT * FROM tbl_admin WHERE id=$id";

            //3. Execute the query
            $res=mysqli_query($conn,$sql);

            //Check whether the Query is Executed or not 

          if($res==true)
          {
              //Check whether the data is Available or not 
              $count = mysqli_num_rows($res);
              //Check whether we have admin data or not
              if($count==1) 
              {
                $rows=mysqli_fetch_assoc($res);// echo "Admin Available";
                 

                 $full_name=$rows['full_name'];
                 $username=$rows['username'];
              }
              else
              {
                header("location:".SITEURL.'admin/manage-admin.php');
              }
            }

         ?>

    <form action="" method="POST"> 

    <table class="tbl-30">
        <tr>
            <td>Full_Name: </td>
            <td>
                <div class="inputBox">
                    <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                </div>
            </td>
        </tr>

        <tr>
            <td>User_Name: </td>
            <td>
                <div class="inputBox"> 
                        <input type="text" name="username" value="<?php echo $username; ?>">
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="2">
            <td>
                <input type="hidden" name="id" value="<?php echo$id;?>">
                <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
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
        <br>
        <br>
</form>
</div>
</div>



<?php
   if(isset($_POST['submit']))
   {
       $full_name =mysqli_real_escape_string($conn,$_POST['full_name']) ;
       $username =mysqli_real_escape_string($conn,$_POST['username']);
       $password = md5($_POST['password']);

       $sql= "UPDATE tbl_admin SET
       full_name='$full_name',
       username='$username' 
       WHERE id=$id";

       $res=mysqli_query($conn,$sql);
       if($res==TRUE)
    {
//Data Inserted
//echo "Data Inserted";
//Create a Session Variable to Display Message
      $_SESSION['update'] ="<div class='success'>Admin Updated Successfully.</div>";
//Redirect Page to manage Admin 
      header('location:'.SITEURL.'admin/manage-admin.php');
    }
else {
    //Failed to Insert data
    //echo "Failed to Insert Data";
    //Create a Session Variable to Display Message
    $_SESSION['update'] = "<div class='error'>Failed to Upadte Admin.Try Again Later.</div>";
    //Redirect Page to Add Admin 
    header("location:".SITEURL.'admin/update-admin.php');
    } 

   //3. redirect to manage-admin page with message (success/error)
   

   }
?>

<?php include('partials/footer.php'); ?>