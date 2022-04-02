
<?php

include('../config/constants.php');

if(isset($_GET['id']) AND isset($_GET['image_name'])){
   // echo "process to delete";
   //get id and image name
   $id=$_GET['id'];
   $image_name=$_GET['image_name'];
   //remove the image if available
   //check weather the image is available or not and delete if available
   if($image_name!=""){
       $path="../images/food/".$image_name;
       $remove=unlink($path);
       //check weather image is removed or not
       if($remove==false){
           $_SESSION['upload']="<div class='error'>Failed to remove image file.</div>";
           header('location:'.SITEURL.'admin/manage-food.php');
           die();
       }
   }
   //delete food from database
   $sql = "DELETE FROM tbl_food WHERE id=$id";
   $res = mysqli_query($conn, $sql);
   if($res==true){
       $_SESSION['delete']="<div class='success'>Food deleted sucessfully.</div>";
       header('location:'.SITEURL.'admin/manage-food.php');
   }
   else{
    $_SESSION['delete']="<div class='error'>Failed to delete</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
   }
}
else{
    $_SESSION['unauthorize']="<div class='error'>Unauthorized access.</div>";
    header('location:'.SITEURL.'admin/manage-food.php');
}
?>
