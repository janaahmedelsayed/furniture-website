<!DOCTYPE html>
<html lang="en">
  <?php
  include "functions/connection.php";
 
//$conn = mysqli_connect('localhost', 'root', '', 'ikea');?>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Accounts</title>
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
    <div class="" id="home">
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
                <a class="nav-link" href="products.html">
                  <i class="fas fa-shopping-cart"></i> Products
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="accounts.html">
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
      <div class="container mt-5">
        <div class="row tm-content-row">
          <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
              <h2 class="tm-block-title">Add New Admin Account</h2>
              <p class="text-white">Complete the form below to add a new admin account:</p>

              <!-- New form for adding admin account -->
              <form id="adminForm" method="POST">
                <div class="form-group">
                <div class="form-group">
                  <label for="adminName" class="text-white " >UserName:</label>
                  <input type="text" class="form-control" id="new_admin_userName" name="new_admin_UserName" required>
                </div>
                  <label for="adminName" class="text-white " >First Name:</label>
                  <input type="text" class="form-control" id="new_admin_firstName" name="new_admin_FirstName" required>
                </div>
                <div class="form-group">
                  <label for="adminName" class="text-white " >Last Name:</label>
                  <input type="text" class="form-control" id="new_admin_last_Name" name="new_admin_LastName" required>
                </div>
                <div class="form-group">
                  <label for="adminEmail" class="text-white">Email:</label>
                  <input type="email" class="form-control" id="new_admin_email" name="new_admin_email" required>
                </div>
                <div class="form-group">
                  <label for="adminpassword" class="text-white">Password:</label>
                  <input type="password" class="form-control" id="new_admin_password" name="new_admin_password" required>
                </div>
                <div class="form-group">
                  <label for="adminName" class="text-white " >Phone:</label>
                  <input type="text" class="form-control" id="new_admin_phone" name="new_admin_Phone" required>
                </div>
                <div class="form-group">
                  <label for="adminName" class="text-white " >Address:</label>
                  <input type="text" class="form-control" id="new_admin_address" name="new_admin_Address" required>
                </div>
                <!-- Add more fields as needed for the admin account details -->

                <!-- Submit button to add new admin -->
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="add_admin">Add Admin</button>
                </div>
              </form>
            </div>  
          </div>
        </div>
      </div>
      <?php 
      if(isset($_POST['add_admin'])){
        $user=$_POST["new_admin_UserName"];
        $firstname = $_POST["new_admin_FirstName"];
        $lastname= $_POST["new_admin_LastName"];
$email = $_POST["new_admin_email"];
$password = $_POST["new_admin_password"];
$phone= $_POST["new_admin_Phone"];
$address= $_POST["new_admin_Address"];


$sql="INSERT INTO `acc_table`( `f_name`, `l_name`, `email`, `position`, `username`, `password`, `phone`, `address`)
VALUES ('$firstname','$lastname','$email','admin','$user','$password','$phone','$address')";
$result = mysqli_query($db, $sql);





      }
      ?>

      <!-- row -->
        <div class="row justify-content-center">
          <div class="tm-block-col tm-col-avatar col-lg-6 mb-4">
            <div class="tm-bg-primary-dark tm-block tm-block-avatar">
              <h2 class="tm-block-title">Change Avatar</h2>
              <div class="tm-avatar-container">
                <img
                  src="img/avatar.png"
                  alt="Avatar"
                  class="tm-avatar img-fluid mb-4"
                />
                <a href="#" class="tm-avatar-delete-link">
                  <i class="far fa-trash-alt tm-product-delete-icon"></i>
                </a>
              </div>
              <button class="btn btn-primary btn-block text-uppercase">
                Upload New Photo
              </button>
            </div>
          </div>
          <div class="tm-block-col tm-col-account-settings col-lg-6 mb-4">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title">Account Settings</h2>
              <form action="" class="tm-signup-form row">
                <div class="form-group col-lg-6">
                  <label for="first_name"> First Name</label>
                  <input
                    id="first_name"
                    name="first_name"
                    type="text"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="last_name"> last Name</label>
                  <input
                          id="last_name"
                          name="last_name"
                          type="text"
                          class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="user_name"> User Name</label>
                  <input
                          id="user_name"
                          name="user_name"
                          type="text"
                          class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="email"> Email</label>
                  <input
                    id="email"
                    name="email"
                    type="email"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="address">Address</label>
                  <input
                          id="address"
                          name="address"
                          type="text"
                          class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="password">Password</label>
                  <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="password2">Re-enter Password</label>
                  <input
                    id="password2"
                    name="password2"
                    type="password"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-6">
                  <label for="phone">Phone</label>
                  <input
                    id="phone"
                    name="phone"
                    type="tel"
                    class="form-control validate"
                  />
                </div>
                <div class="col-12">
                  <label class="tm-hide-sm">&nbsp;&nbsp;&nbsp;</label>
                  <button
                    type="button"
                    class="btn btn-primary btn-block text-uppercase"
                    onclick="updateAccount()"

                  >
                    Update Your Profile
                  </button>
                </div>
                <div class="col-12 mt-3">
                  <button
                    type="button"
                    class="btn btn-primary btn-block text-uppercase"
                    onclick="confirmDelete()"
                  >
                    Delete Your Account
                  </button>
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
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
  </body>
</html>
