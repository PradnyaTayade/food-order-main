<?php
session_start();



//Create Constants to store Non Repeating Values
//define('SITEURL','/food-order-main/');
define('LOCALHOST',$_SERVER['RDS_HOSTNAME']);
define('DB_USERNAME',$_SERVER['RDS_USERNAME']);
define('DB_PASSWORD',$_SERVER['RDS_PASSWORD']);
define('DB_NAME',$_SERVER['RDS_DB_NAME']);


       $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
       $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());

 ?>
