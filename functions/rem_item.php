<?php
include "connection.php";
session_start();
$id=$_GET['id2'];
$sql ="DELETE FROM `order_details` WHERE product_id=$id ";
$result=mysqli_query($db,$sql);
header("location: ../shopping.php");
    exit();    