<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Users</h1>
            <div class="col-4 text-center">
                <?php
                $sql="SELECT * FROM tbl_user";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);



                ?>

                <h1><?php echo $count;?></h1>
                Number of users
            </div>
            <br /><br /><br >
<br /><br />
            
<table class="tbl-full">
<tr>
   <th>S.N.</th>
   
   <th>Name</th>
   
   <th>Username</th>
   
   <th>Email</th>
   
   <th>Contact</th>
   
   <th>Address</th>
</tr>

<?php
       
       $sql = "SELECT * FROM  tbl_user ORDER BY id DESC";

       $res = mysqli_query($conn, $sql);
       
       $count = mysqli_num_rows($res);
    
       $sn=1;

        if($count>0)
        {
            
            while($row=mysqli_fetch_assoc($res))
             {
                     $id=$row['id'];
                     $name=$row['name'];
                     $username=$row['username'];
                     $user_email=$row['email'];
                     $user_contact=$row['contact'];
                     $user_address=$row['address'];
                     
     ?>

<tr>
<td><?php echo $sn++; ?> </td>
<td><?php echo $name; ?></td>
<td><?php echo $username; ?></td>
<td><?php echo $user_email; ?></td>
<td><?php echo $user_contact; ?></td>
<td><?php echo $user_address; ?></td>

</tr>

<?php
             }
        }
        else{
              echo "<tr><td colspan='2' class='error'>There are no users</td></tr>";
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