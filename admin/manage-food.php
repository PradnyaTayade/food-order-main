
<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Food</h1>
            <br /><br />
            <a href="<?php echo SITEURL ?>admin/add-food.php" class="btn-primary">Add Food</a>
            <br /><br />

            <?php
                  if(isset($_SESSION['add']))//checking whether the session is set or not
                  {
                  echo $_SESSION['add'];//display the session message if set 
                  unset($_SESSION['add']);//removing session message

                  }
                  if(isset($_SESSION['delete']))
                  {
                  echo $_SESSION['delete'];
                  unset($_SESSION['delete']);
                  
                  }
                  if(isset($_SESSION['upload']))
                  {
                  echo $_SESSION['upload'];
                  unset($_SESSION['upload']);
                  }
                  if(isset($_SESSION['unauthorize']))
                  {
                  echo $_SESSION['unauthorize'];
                  unset($_SESSION['unauthorize']);
                  }
                  if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                  }                  
            ?>
<table class="tbl-full">
<tr>
<th class="text-center">S.N.</th>
<th class="text-center">Title</th>
<th class="text-center">Price</th>
<th class="text-center">Image</th> 
<th class="text-center">Featured</th>
<th class="text-center">Active</th> 
<th class="text-center">Actions</th>
</tr>

<?php
       
       $sql = "SELECT * FROM  tbl_food WHERE active='Yes'";

       $res = mysqli_query($conn, $sql);
       
       $count = mysqli_num_rows($res);
    
       $sn=1;

        if($count>0)
        {
            
            while($rows=mysqli_fetch_assoc($res))
             {
                     $id=$rows['id'];
                     $title=$rows['title'];
                     $price=$rows['price'];
                     $image_name=$rows['image_name'];
                     $featured =$rows['featured'];
                     $active =$rows['active'];
                     ?>

<tr>

<td><?php echo $sn++; ?> </td>
<td><?php echo $title; ?></td>
<td><?php echo $price; ?></td>
<td>
    <?php 
         
        if($image_name=="")
        {
            echo "<div class ='error'>Image Not Added</div>";
        }
        else
        {
            ?>
            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
            <?php
        }
    ?>
</td>
<td><?php echo $featured; ?></td>
<td><?php echo $active; ?></td>

<td>
    <a href="<?php echo SITEURL; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
    <a href="<?php echo SITEURL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo  $image_name;?>" class="btn-danger">Delete Food</a>
</td>
</tr>

<?php
             }

             }
        else
        {
            echo "<tr> <td colspan='7' class='error'> Food not Added Yet. </td> </tr>";
        }
                                        
?>
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
</div>
</div>

<?php include('partials/footer.php'); ?>