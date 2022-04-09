<?php 
      include('../config/constants.php'); 
      include('login-check.php');  //1.for login we have to comment this line if we are creating database go to login.php

 ?>

<html>
<head>
<title>Food Order Website - Home Page</title>

<link rel="stylesheet" href="../css/admin.css">
</head>

<body>
<!--Menu Section Starts -->
<div class="menu text-centre"> 
<div class="wrapper">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="manage-admin.php">Admin</a></li>
<li><a href="manage-category.php">Category</a></li>
<li><a href="manage-food.php">Food</a></li>
<li><a href="user-info.php">Users</a></li>
<li><a href="manage-order.php">Order</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</div>
</div>
