<?php 

session_start();
include "functions/connection.php";
//$db= mysqli_connect('localhost', 'root', '', 'ikea');

  $id=$_GET["id"];
  $sql_query = "SELECT * FROM `products` WHERE product_id='$id'";
  $result=mysqli_query($db,$sql_query);
  while($row=mysqli_fetch_assoc($result)) {
  $name=$row["product_name"];
  $price=$row["price"];
  $quantity=$row["unit_in_stock"];
  $description=$row["description"];
  $discount=$row["discount"];

  $image=$row['img'];
  }
  if(isset($_POST['update']))
  {
     $name=$_POST["product_name"];
     $price=$_POST["product_price"];
     $quantity=$_POST["product_quantity"];
     $description=$_POST["product_desc"];
     $discount=$_POST["product_discount"];
     $selected_value=$_POST["product_category"];
 
     $image=$_POST['image'];
     
 echo "$name";
     $sql_query = "UPDATE products SET  `product_name`='$name', `cat_id`='$selected_value', `price`='$price', `discount`='$discount', `description` ='$description', `img`='$image', `unit_in_stock`='$quantity' WHERE product_id='$id'";
    $r=mysqli_query($db,$sql_query);
  
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Edit Product</title>
  <link
          rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Roboto:400,700"
  />
  <!-- https://fonts.google.com/specimen/Roboto -->
  <link rel="stylesheet" href="css/fontawesome.min.css" />
  <!-- https://fontawesome.com/ -->
  <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css" type="text/css" />
  <!-- http://api.jqueryui.com/datepicker/ -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- https://getbootstrap.com/ -->
  <link rel="stylesheet" href="css/templatemo-style.css">
</head>

<body>
<nav class="navbar navbar-expand-xl">
  <div class="container h-100">
    <a class="navbar-brand" href="index.html">
      <h1 class="tm-site-title mb-0">Product Admin</h1>
    </a>
    <button
            class="navbar-toggler ml-auto mr-0"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
    >
      <i class="fas fa-bars tm-nav-icon"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto h-100">
        <li class="nav-item">
          <a class="nav-link" href="index.html">
            <i class="fas fa-tachometer-alt"></i> Dashboard
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="products.php">
            <i class="fas fa-shopping-cart"></i> Products
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="accounts.php">
            <i class="far fa-user"></i> Accounts
          </a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link d-block" href="login.php">
            Admin, <b>Logout</b>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container tm-mt-big tm-mb-big">
  <div class="row">
    <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
      <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
        <div class="row">
          <div class="col-12">
            <h2 class="tm-block-title d-inline-block">Edit Product</h2>
          </div>
        </div>
        <div class="row tm-edit-product-row">
          <div class="col-xl-6 col-lg-6 col-md-12">
          <form action="edit-product.php?id=<?php echo $id; ?>" method="post" class="tm-edit-product-form">
              <!-- product_name -->             
            <div class="form-group mb-3">
                <label
                        for="name"
                >Product Name
                </label>
                <input
                        id="name"
                        value="<?php echo $name?>"
                        name="product_name"
                        type="text"
                        class="form-control validate"
                        required
                />
              </div>
              <!-- product_price -->  
              <div class="form-group mb-3">
                <label
                        for="name"
                >Product Price
                </label>
                <input
                        id="name"
                        name="product_price"
                        value="<?php echo $price?>"
                        type="float"
                        class="form-control validate"
                        required
                />
              </div>
              <!-- product_discount --> 
              <div class="form-group mb-3">
                    <label
                      for="name"
                      >Discount
                    </label>
                    <input
                      id="name"
                      name="product_discount"
                        value="<?php echo $discount?>"
                      type="float"
                      class="form-control validate"
                      required
                    />
                  </div>
               <!-- product_description --> 
               <div class="form-group mb-3">
                    <label
                      >Description</label
                    >
                    <textarea
                      name="product_desc"
                      class="form-control validate"
                      

                      rows="3"
                      required
                    ><?php echo $description?></textarea>
                  </div>
                  <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="stock"
                            >Units In Stock
                          </label>
                          <input
                            id="stock"
                            name="product_quantity"
                            value="<?php echo $quantity;?>"
                            type="int"
                            class="form-control validate"
                            required
                          />
                        </div>
               
                    
               <!-- product_quantity --> 
               <div class="row">
                    <!-- product_cat --> 
               <div class="form-group mb-3">
                    <label
                      for="category" name="category"
                      >Category</label
                    >
                    <select
                      class="custom-select tm-select-accounts"
                      id="category"
                      name="product_category"
                    >
                    <option selected>Select category</option>
                    <?php
                     $sql_query1="SELECT * FROM categories;";
                     $result=$db->query($sql_query1);
                    if($result->num_rows > 0)
                    {
                      while($row = $result->fetch_assoc())
                      {
                        echo '<Option value ="'.$row["cat_id"].'">'.$row["cat_name"].'</Option>';   
                      }
                    }

                    ?>
                </div>     
            </div>
           <!-- product_quantity --> 
          <div class="form-group mb-3">
                    <label
                      class="mb-0"
                      >Update Image
                    </label>
                    <input
                      value="sadsadasd"
                         name="image"
                      type="file"
                      class="form-control mb-2 "
                    />
                  </div>
          <div class="col-12">
            <button type="submit" name="update" class="btn btn-primary btn-block text-uppercase">Update Now</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="tm-footer row tm-mt-small">
  <div class="col-12 font-weight-light">
    <p class="text-center text-white mb-0 px-4 small">
      Copyright &copy; <b>2023</b> All rights reserved.
    </p>
  </div>
</footer>

<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
<!-- https://jqueryui.com/download/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
</body>
</html>
