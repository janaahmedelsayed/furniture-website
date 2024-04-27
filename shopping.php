<?php
include 'functions/connection.php';
session_start();
$acc_id = $_SESSION['acc_id'];
$q = "SELECT * from payment WHERE acc_id='$acc_id'";
$r = mysqli_query($db, $q);
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>shopping cart</title>
	<link rel="stylesheet" type="text/css" href="shopping.css">

	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <link rel="stylesheet" href="cart.css"> 
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
   <link rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
<!--progress bar-->
<div class="wrapper">
	<div class="header">
		<ul>
			<li class="active form_1_progessbar">
				<div>
					<p>1</p>
				</div>
			</li>
			<li class="form_2_progessbar">
				<div>
					<p>2</p>
				</div>
			</li>
			<li class="form_3_progessbar">
				<div>
					<p>3</p>
				</div>
			</li>
		</ul>
	</div>
<!--frame 1-->
	<div class="form_wrap">
		<div class="form_1 data_info">
            
            <div class="card">
                <div class="row">
                    
                    <div class="col-md-8 cart">
                        
                        <div class="title">
                            <div class="row">
                                <div class="col"><h4><b>Shopping Cart</b></h4></div>
                                <div class="col align-self-center text-right text-muted">items</div>
                            </div>
                        </div>    
                        
                        <div class="row border-top border-bottom">
                        <?php   
                          $total_sal=0;
                                  
                                    if(isset($_SESSION['order_id'])){
                                        
                                    $oid= $_SESSION['order_id'];
                               $sql = "SELECT * from `order_details` as `od` INNER JOIN `products` as `p` on p.product_id=od.product_id
                                INNER join `categories` as `c` on c.cat_id=p.cat_id where od.order_id='$oid'; ";
                               $result = mysqli_query($db,$sql);
                               $i=0;
                                while($row= mysqli_fetch_array($result)){
                                    $sal=($row['price']-($row['price']*$row['discount']))*$row['quantity'];
                                    $total_sal+=$sal;
                                ?>
                                
                            <div class="row main align-items-center" id="rem">
                                <!-- row[img] -->
                                <div class="col-2"><img class="img-fluid" src="ikea_photos/<?php echo $row['img'];?>"></div>
                                <div class="col">
                                    <div class="row text-muted"><?php echo $row['product_name']?></div>
                                    <div class="row"><?php echo $row['cat_name']?></div>
                                </div>
                                
                                <div class="col">
                                    <form action="functions/calc.php?id1=<?php echo $row['product_id'];?>" method="Post">
                                    <input class= "input_" type="number" name='mynumber' id="mynumber" min="1" value=<?php echo $row['quantity'];?> >
                                   
                                </div>
                               
                                <div class="col">
                                    
                                   <p>$<?php echo $sal?></p>
                                    
                                </div>
                                <button id="calc"  class="calc" name="calc" style="float: right;width: 30px;"><i class='bx bx-edit' ></i></button>
                                    </form>

                                
                                <form action="functions/rem_item.php?id2=<?php echo $row['product_id'];?>" method='Post'>
                                <button input='submit' name='remove' style="color:red; float: right; margin-left: 20px; width=40px"><i class='bx bxs-comment-x'></i></button>
                                </form>
                               
                                
                            </div>
                            <?php
                                }}  
                            ?>
                        </div>
                   
    
                  
    
    
                        <div class="back-to-shop"><a href="categoey.php" style="font-size: 20px; color: #1d3557;" >&leftarrow;Back to shop</a>
                        
                        </div>
                    </div>
    
    
                    <div class="col-md-4 summary">
                        <div><h5><b>Summary</b></h5></div>
                        <hr>
                        <div class="row"> 
                            <div class="col" style="padding-left:10px;">ITEMS </div>
                            <div class="col text-right"> <?php echo $total_sal;?></div>
                        </div>
                        <form>
                            <p>SHIPPING</p>
                            <select><option class="text-muted">Standard-Delivery- &euro;5.00</option></select>
                        
                        </form>
                        <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                            <div class="col">TOTAL PRICE</div>
                            <div class="col text-right">&euro;  <?php $_SESSION['total']=$total_sal; echo $total_sal+5;?></div>
                        </div>
                    </div>
                </div>
                
            </div>
       
		</div>


        <!--frame 2-->
        <section id='fr2'>
		<div class="form_2 data_info" style="display: none;">
			<h2>Delivery Information</h2>
			<form>
				<div class="form_container">
					<div class="input_wrap">
						<label for="full_name">Full name</label >
						<input type="text" name="Full name" class="input" id="Full_name" value="<?php echo $_SESSION['fname'].' '.$_SESSION['lname'];?>" required>
					</div>
					<div class="input_wrap">
						<label for="phone_number">Phone number</label>
						<input type="tel" name="phone_number" class="input" id="phone_nmuber" value="0<?php echo $_SESSION['phone'];?>" required>
					</div>
					<div class="input_wrap">
						<label for="Address">Address</label>
						<input type="text" name="Address" class="input" id="Address" placeholder="city,government,street" value="<?php echo $_SESSION['address'];?>" required>
					</div>
				</div>
			</form>
		</div>
        </section>
        <!--frame 3-->
        <style>
                .text-warning {
                    font-size: 12px;
                    font-weight: 500;
                    color: red !important;
                }

                #cno {
                    transform: translateY(-10px);
                }

                .inp {
                    border-bottom: 1.5px solid #E8E5D2 !important;
                    font-weight: bold;
                    border-radius: 0;
                    border: 0;
                    width: 50%;
                    margin-left: 10px;
                }

                .form-group .inp:focus {
                    border: 0;
                    outline: 0;
                }

                .text-warning {
                    font-size: 17px;
                    font-weight: bold;
                    margin-left: 10px;
                    color: red !important;

                }

                .img1 {
                    transform: translate(200px, -10px);
                }
            </style>
            <div class="form_3 data_info" style="display: none;">
                <div class="container-fluid">
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-12">
                            <div class="card mx-auto">
                                <p class="heading" style="	color: #1d3557;
                            font-size: 20px;
                            font-weight: bold; margin-top: 10px; margin-left: 10px;">
                                    PAYMENT DETAILS</p>
                                <form class="card-details " method='post'>
                                    <div class="form-group mb-0">
                                        <p class="text-warning mb-0">Card Number</p> <br>
                                        <input class="inp" type="text" name="card-num" 
                                            id="cno" >

                                        <img class="img1" src="https://img.icons8.com/color/48/000000/visa.png  "
                                            width="64px" height="60px " />

                                    </div>

                                    <div class="form-group">
                                        <p class="text-warning mb-0">Cardholder's Name</p> <br>
                                        <input type="text" name="name" placeholder="Name" size="17"
                                            style="width: 50%; margin-left: 10px;">
                                    </div>
                                    <div class="form-group pt-2">
                                        <div class="row d-flex">
                                            <div class="col-sm-4">
                                                <p class="text-warning mb-0">Expiration</p><br>
                                                <input class="inp" type="text" name="exp" placeholder="MM/YYYY" size="7"
                                                    id="exp" minlength="7" maxlength="7">
                                            </div>
                                            <div class="col-sm-3">
                                                <p class="text-warning mb-0">Cvv</p><br>
                                                <input class="inp" type="password" name="cvv"
                                                    placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3"
                                                    maxlength="3">
                                            </div>

                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="btns_wrap">
            <div class="common_btns form_1_btns">
            <?php 
                           $oid=$_SESSION['order_id'];
                           $sql3="SELECT * from order_details WHERE order_id=$oid";
                        $res4=mysqli_query($db,$sql3);
                       $roo=mysqli_fetch_assoc($res4);
                       if($roo){
                       ?>
                <button type="button" id="next" name="next" class="btn_next">Next <span class="icon"><ion-icon
                            name="arrow-forward-sharp"></ion-icon></span></button>
                           <?php }?>
           
            </div>
            <div class="common_btns form_2_btns" style="display: none;">
                <button type="button" class="btn_back"><span class="icon"><ion-icon
                            name="arrow-back-sharp"></ion-icon></span>Back</button>
                <button type="button" class="btn_next">Next <span class="icon"><ion-icon
                            name="arrow-forward-sharp"></ion-icon></span></button>
            </div>
            <div class="common_btns form_3_btns" style="display: none;">

                <button type="button" class="btn_back"><span class="icon"><ion-icon
                            name="arrow-back-sharp"></ion-icon></span>Back</button>
                <button type="submit"  name='done' class="btn_done"  >Done</button>
                </form>
              


            </div>
        </div>
    </div>
    <?php
    if (isset($_POST["done"])) {
        if(empty($_POST['card-num'])||empty($_POST['name'])||empty($_POST['exp'])||empty($_POST['cvv'])) {
            echo "
            <script>
           
              confirm(\"Enter The Valid information!!!\");

            
          </script>";
        }
        else{
        while ($row = mysqli_fetch_assoc($r)) {
            $c=$_POST["card-num"];
            if ($row["Card_number"] == $c  && $row["holder_name"] == $_POST["name"] && $row["experation"] == $_POST["exp"] && $row["cvv"] == $_POST["cvv"]) {
                $timestamp = date('Y-m-d H:i:s',time());
					$_SESSION['time']=$timestamp;
                $t=$_SESSION['time'];
                $oid=$_SESSION['order_id'];
                $sql="UPDATE `orders` SET `total_price`='$total_sal',`order_date`='$t' WHERE order_id='$oid' ;";
                mysqli_query($db,$sql);
                $timestamp = date('Y-m-d H:i:s',time()+5);
					$_SESSION['time']=$timestamp;
					$x=$_SESSION['acc_id'];
					$sql="INSERT INTO `orders`(`acc_id`, `order_date`) VALUES ('$x','$timestamp') ";
                    $t=$_SESSION['time'];
						$result=mysqli_query($db,$sql);
						$sql2="SELECT order_id FROM orders where order_date='$t' ";
    					$res=mysqli_query($db,$sql2);
    					if($ro2= mysqli_fetch_array($res)){
       						 $_SESSION['order_id']=$ro2['order_id'];
    									}
                echo '
            <script>
            confirm("Valid operation !!!");
            window.location="shopping.php";
            </script>';
				exit();
            }
            else{
                echo '
                <script>
                confirm("in Valid operation !!!");
                window.location="shopping.php";

                </script>';
                    exit();
            }
        }
        }
    } 
    ?>


</script>
  <script src="js/popper.min.js"></script>
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="shopping.js"></script>

</body>

</html>