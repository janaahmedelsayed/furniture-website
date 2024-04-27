<?php
include "connection.php";
session_start();

if(!isset($_SESSION['username'])){
    header("location: ../login.php");
    exit();
}

$id=$_GET['id'];
echo $id;
$sql="SELECT p.*,c.cat_name from `products` as `p` INNER JOIN `categories` as `c`on c.cat_id=p.cat_id where product_id=$id";
$result=mysqli_query($db,$sql);
while( $row = mysqli_fetch_array($result)){
    $acc_id=$_SESSION['acc_id'];
    $t=$_SESSION['time'];
    $sql2="SELECT order_id FROM orders where order_date='$t' ";
    $res=mysqli_query($db,$sql2);
    if($ro2= mysqli_fetch_array($res)){
        $_SESSION['order_id']=$ro2['order_id'];
    }
    $oid=$_SESSION['order_id'];
    $product_id=$row['product_id'];
    $price=$row['price'];
    $discount=$row['discount'];
    $cat_name=$row['cat_name'];
    $q=1;
    $sql2="INSERT INTO `order_details`(`order_id`, `product_id`, `price`, `quantity`, `discount`) VALUES
     ('$oid','$product_id','$price','$q','$discount');";
    $result2=mysqli_query($db,$sql2);

}

$root=$_GET['root'];
?>
<script>
    confirm("your Item added successfully go and check it!");
    window.location='<?php echo $root.'#'.$cat_name?>';

   

</script>';






