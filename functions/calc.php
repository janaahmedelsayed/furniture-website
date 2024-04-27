<?php
include "connection.php";
session_start();
$id=$_GET['id1'];

echo $id;
 $q=$_POST['mynumber'];
$acc_id=$_SESSION['acc_id'];
$oid= $_SESSION['order_id'];
 $sql="UPDATE `order_details` SET `quantity`='$q' WHERE product_id=$id and order_id=$oid;";
     $result=mysqli_query($db,$sql);

    header("location: ../shopping.php");
        exit();
?>

