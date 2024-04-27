<?php 
include("functions/connection.php");
if(isset($_POST['delete']))
{
   $id=$_GET["id"];
   $sql_query = "DELETE FROM `products` WHERE  product_id='$id'";
   if(mysqli_query($db, $sql_query))
   {
    echo '<script> alert("Record Deleted");
    window.location="products.php";
    </script>';
    
    exit();
   }
  

}

if(isset($_POST['delete1']))
{
   $id1=$_GET["id1"];
   $sql_query = "DELETE FROM `categories` WHERE  cat_id='$id1'";
   if(mysqli_query($db, $sql_query))
   {
    echo '<script> alert("Record Deleted");
    window.location="products.php";
    </script>';
    
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
    <title>Product Page </title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
  </head>

  <body id="reportsPage">
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
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">PRODUCT PRICE</th>
                    <th scope="col">PRODUCT ID</th>

                    <th scope="col">IN STOCK</th>
                    <th scope="col">REMOVE EDIT</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql="SELECT  `product_id`,`product_name`,  `price`, `unit_in_stock` FROM `products` ";
                  $result=mysqli_query($db,$sql);
                  while($row=mysqli_fetch_array($result)){
                  ?>
                  <tr>
                    <th scope="row"></th>
                    <td class="tm-product-name"><?php echo $row['product_name'] ;?></td>
                    <td><?php echo $row['price'] ;?></td>
                    <td><?php echo $row['product_id'] ;?></td>

                    <td><?php echo $row['unit_in_stock'] ;?></td>
                    <td>
                      <form action="products.php?id=<?php echo $row['product_id']?>" method="post">
                      
                      <button name="delete" type="submit" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </button>
                      </form>

                      <form action="edit-product.php?id=<?php echo $row['product_id']?>" method="post">
                      <button name="edit" type="submit" class="tm-product-delete-link">
                        <i class="fas fa-edit"></i>
                      </button>
                      </form>
                    </td>
                  </tr>
                  <?php }?>
                 
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
              href="add-product.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
                    
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title">Product Categories</h2>
            <div class="tm-product-table-container">
              <table class="table tm-table-small tm-product-table">
              <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">CATEGORY NAME</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $sql="SELECT  `cat_id`,`cat_name` FROM `categories` ";
                  $result1=mysqli_query($db,$sql);
                  while($row=mysqli_fetch_array($result1)){
                  ?>
                  <tr>
                    <th scope="row"></th>
                    <td class="tm-product-name"><?php echo $row['cat_name'] ;?></td>

                    <td>
                      <form action="products.php?id1=<?php echo $row['cat_id']?>" method="post">
                      
                      <button name="delete1" type="submit" class="tm-product-delete-link">
                        <i class="far fa-trash-alt tm-product-delete-icon"></i>
                      </button>
                      </form>
                    </td>
                  </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
            <!-- table container -->

                <!-- Add Category Button -->
                <a href="add-category.php" class="btn btn-primary btn-block text-uppercase mb-3">
                  Add category
                </a>


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
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    
  </body>
</html>