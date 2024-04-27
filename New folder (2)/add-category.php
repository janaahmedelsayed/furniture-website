<?php
session_start();
include("functions/connection.php");

 if(isset($_POST['add_cat']))
 {
    $name=$_POST["name_cat"];
   
    $sql_query = "INSERT INTO `categories`( `cat_name`) VALUES ('$name')";
     if(mysqli_query($db, $sql_query))
    {
        echo '<script> alert("Record Added");
        window.location=" add-category.php";
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
    <title>Add Category</title>
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
                        <h2 class="tm-block-title d-inline-block">Add Category</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                    <form action="add-category.php" method="Post" >

                            <div class="form-group mb-3">
                                <label
                                        for="name"
                                >Category Name
                                </label>
                                <input
                                        id="name"
                                        name="name_cat"
                                        type="text"
                                        class="form-control validate"
                                        required
                                />
                            </div>
                            <div class="form-group mb-3">
                                <label
                                >Description</label
                                >
                                <textarea
                                        class="form-control validate"
                                        rows="3"
                                        required
                                ></textarea>
                            </div>
                            <!-- -->
                            <div class="form-group mb-3">
                                <label
                                        for="category" name="category"
                                >Category type</label>
                                <select
                                        class="custom-select tm-select-accounts"
                                        id="category"
                                >
                                    <option selected>Select category type</option>
                                    <option value="1" name="new_arrival">New Arrival</option>
                                    <option value="2" name="most_popular">Most Popular</option>
                                    <option value="3" name="trending">Trending</option>
                                </select>
                            </div>
                      </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                        <div class="tm-product-img-dummy mx-auto">
                            <i
                                    class="fas fa-cloud-upload-alt tm-upload-icon"
                                    onclick="document.getElementById('fileInput').click();"
                            ></i>
                        </div>
                       <div class="custom-file mt-3 mb-3">
                            <input id="fileInput" type="file" style="display:none;" />
                            <input
                                    type="button"
                                    class="btn btn-primary btn-block mx-auto"
                                    value="UPLOAD Category IMAGE"
                                    onclick="document.getElementById('fileInput').click();"
                            />
                        </div> 
                    </div>
                    <div class="col-12">
                        <button type="submit" name='add_cat' class="btn btn-primary btn-block text-uppercase">Add Category Now</button>
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
