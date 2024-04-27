<?php
session_start();
include("functions/connection.php");

        $sql_query1="SELECT * FROM categories;";
        $result=$db->query($sql_query1);

 if(isset($_POST['add_product']))
 {
    $name=$_POST["product_name"];
    $price=$_POST["product_price"];
    $quantity=$_POST["product_quantity"];
    $description=$_POST["product_desc"];
    $discount=$_POST["product_discount"];
    $selected_value=$_POST["product_category"];

    $image=$_POST['image'];
    

  
    $sql_query = "INSERT INTO `products` (`product_id`, `product_name`, `cat_id`, `price`, `discount`, `description`, `img`, `unit_in_stock`) VALUES (NULL, '$name', '$selected_value', '$price', '$discount', '$description', '$image', '$quantity');";
   
    if(mysqli_query($db, $sql_query))
    {
     echo "<script> alert('added new record !!!');
     window.location=' add-product.php';
      </script>";
        
        exit();
    }

 }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Add Product</title>
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
              <a class="nav-link active" href="products.html">
                <i class="fas fa-shopping-cart"></i> Products
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="accounts.html">
                <i class="far fa-user"></i> Accounts
              </a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link d-block" href="login.html">
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
                <h2 class="tm-block-title d-inline-block">Add Product</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="add-product.php" method="post" class="tm-edit-product-form">
                  <!-- product_name -->
                  <div class="form-group mb-3">
                    <label
                      for="name"
                      >Product Name
                    </label>
                    <input
                      id="name"
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
                      >Price
                    </label>
                    <input
                      id="name"
                      name="product_price"
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
                      type="float"
                      class="form-control validate"
                      required
                    />
                  </div>
                  <!-- product_Description -->
                  <div class="form-group mb-3">
                    <label
                      >Description</label
                    >
                    <textarea
                      name="product_desc"
                      class="form-control validate"
                      rows="3"
                      required
                    ></textarea>
                  </div>
                  <!-- product_category -->
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
                    if($result->num_rows > 0)
                    {
                      while($row = $result->fetch_assoc())
                      {
                        echo '<Option value ="'.$row["cat_id"].'">'.$row["cat_name"].'</Option>';   
                      }
                    }

                    ?>
                    </select>
                  </div>
                  <!-- units in stock quantity -->
                  <div class="row">
                         <div class="form-group mb-3 col-xs-12 col-sm-6">
                          <label
                            for="stock"
                            >Units In Stock
                          </label>
                          <input
                            id="stock"
                            name="product_quantity"
                            type="text"
                            class="form-control validate"
                            required
                          />
                        </div>
                  </div>
                  <!-- image div -->
                  <div class="form-group mb-3">
                    <label
                      class="mb-0"
                      >Upload Image
                    </label>
                    <input
                      required name="image"
                      type="file"
                      class="form-control mb-2 "
                    />
                  </div>
                  </div>
              
              <div class="col-12">
                <button type="submit"  name="add_product" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
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