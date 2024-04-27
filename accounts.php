<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include "functions/connection.php";
$p1 = $_SESSION["password"];
$id =$_SESSION['acc_id'];
echo $id;
$qu = "SELECT * from acc_table WHERE acc_id='$id'";
$re = mysqli_query($db, $qu);
while ($row1 = mysqli_fetch_assoc($re)) {
  $f_name1 = $row1["f_name"];
  $l_name1 = $row1["l_name"];
  $email1 = $row1["email"];
  $u_name = $row1["username"];
  $phone1 = $row1["phone"];
  $add = $row1["address"];
  $p1 = $row1["password"];

}

      //$conn = mysqli_connect('localhost', 'root', '', 'ikea');?>

      

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Accounts</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
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
        <a class="navbar-brand" href="index.php">
          <h1 class="tm-site-title mb-0">Product Admin</h1>
        </a>
        <button class="navbar-toggler ml-auto mr-0" type="button" data-toggle="collapse"
          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto h-100">
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="fas fa-tachometer-alt"></i> Dashboard
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="products.php">
                <i class="fas fa-shopping-cart"></i> Products
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="accounts.php">
                <i class="far fa-user"></i> Accounts
              </a>
            </li>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link d-block" href="functions/logout.php">
                Admin, <b>Logout</b>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-lg-6 offset-lg-3 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <h2 class="tm-block-title">Add New Admin Account</h2>
            <p class="text-white">Complete the form below to add a new admin account:</p>

            <!-- New form for adding admin account -->
            <form id="adminForm" method="POST">
              <div class="form-group">
                <label for="new_admin_userName" class="text-white">Admin User Name:</label>
                <input type="text" class="form-control" id="new_admin_userName" name="new_admin_UserName" required>
              </div>
              <div class="form-group">
                <label for="new_admin_firstName" class="text-white">Admin First Name:</label>
                <input type="text" class="form-control" id="new_admin_firstName" name="new_admin_FirstName" required>
              </div>
              <div class="form-group">
                <label for="new_admin_lastName" class="text-white">Admin Last Name:</label>
                <input type="text" class="form-control" id="new_admin_lastName" name="new_admin_LastName" required>
              </div>
              <div class="form-group">
                <label for="new_admin_email" class="text-white">Admin Email:</label>
                <input type="email" class="form-control" id="new_admin_email" name="new_admin_email" required>
              </div>
              <div class="form-group">
                <label for="new_admin_password" class="text-white">Admin Password:</label>
                <input type="password" class="form-control" id="new_admin_password" name="new_admin_password" required>
              </div>
              <div class="form-group">
                <label for="new_admin_phone" class="text-white ">Phone:</label>
                <input type="text" class="form-control" id="new_admin_phone" name="new_admin_Phone" required>
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
        // Retrieve values from the submitted form
        $user = $_POST["new_admin_UserName"];
        $firstname = $_POST["new_admin_FirstName"];
        $lastname = $_POST["new_admin_LastName"];
        $email = $_POST["new_admin_email"];
        $password = $_POST["new_admin_password"];
        $phone = $_POST["new_admin_Phone"];
    
        // SQL query to insert values into the acc_table
        $sql = "INSERT INTO `acc_table`(`f_name`, `l_name`, `email`, `position`, `username`, `password`, `phone`)
                VALUES ('$firstname', '$lastname', '$email', 'admin', '$user', '$password', '$phone')";
    
        // Execute the SQL query
        $result = mysqli_query($db, $sql);
    
        // You can handle the result if needed
       
        echo '
        <script>
        alert("Account addedd successfully!");
        window.location="accounts.php";
        </script>';
    exit();
}
    
    
      ?>


    <!-- row -->
    <div class="col-lg-6 offset-lg-3 tm-block-col tm-col-account-settings mb-4">
      <div class="tm-bg-primary-dark tm-block tm-block-settings">
        <h2 class="tm-block-title">Account Settings</h2>
        <form  method="POST" class="tm-signup-form row">
          <div class="form-group col-lg-6">
            <label for="first_name"> First Name</label>
            <input id="first_name" name="first_name" type="text" class="form-control validate"
              value="<?php echo $f_name1 ?>" />
          </div>
          <div class="form-group col-lg-6">
            <label for="last_name"> last Name</label>
            <input id="last_name" name="last_name" type="text" class="form-control validate"
              value="<?php echo $l_name1 ?>" />
          </div>
          <div class="form-group col-lg-6">
            <label for="user_name"> User Name</label>
            <input id="user_name" name="user_name" type="text" class="form-control validate"
              value="<?php echo $u_name ?>" />
          </div>
          <div class="form-group col-lg-6">
            <label for="email"> Email</label>
            <input id="email" name="email" type="email" class="form-control validate" value="<?php echo $email1 ?>" />
          </div>
          <div class="form-group col-lg-6">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" class="form-control validate" />
          </div>
          <div class="form-group col-lg-6">
            <label for="password2">Re-enter Password</label>
            <input id="password2" name="password2" type="password" class="form-control validate" />
          </div>
          <div class="form-group col-lg-6 offset-lg-3 ">
            <label for="phone">Phone</label>
            <input id="phone" name="phone" type="tel" class="form-control validate" value="<?php echo $phone1 ?>" />
          </div>
          <div class="col-12">
            <label class="tm-hide-sm">&nbsp;&nbsp;&nbsp;</label>
            <button type="submit" class="btn btn-primary btn-block text-uppercase" name="update">
              Update Your Profile
            </button>
          </div>
          <div class="col-12 mt-3">
            <button type="submit" class="btn btn-primary btn-block text-uppercase"
              name="delete">
              Delete Your Account 
            </button>
          </div>
        </form>
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
  <?php
// ... Your existing PHP code ...

if (isset($_POST["update"])) {
    // Handle update logic
    if ( !empty($_POST["user_name"]) && !empty($_POST["first_name"]) && !empty($_POST["last_name"]) && !empty($_POST["email"])) {
        if ($_POST["password"] == $_POST["password2"] && !empty($_POST["password"])) {
            $p1 = $_POST["password"];
        } else if ($_POST["password"] != $_POST["password2"]) {
            echo '
                <script>
                alert("The update Not happened");
                window.location="accounts.php";
                </script>';
            exit(); 
        }
        $f1 = $_POST["first_name"];
        $l1 = $_POST["last_name"];
        $e = $_POST["email"];
        $u1 = $_POST["user_name"];
        $ph = $_POST["phone"];
        $q50 = "UPDATE acc_table SET f_name='$f1',l_name='$l1',email='$e',phone='$ph',password='$p1',username='$u1' where acc_id='$id'";
        mysqli_query($db, $q50);
        echo '
            <script>
            alert("Account updated successfully!");
            window.location="accounts.php";
            </script>';
        exit();
    }
    
}
if(isset($_POST["delete"])){
  //$conn = mysqli_connect('localhost', 'root', '', 'contnet');
$q70 = "DELETE from acc_table WHERE acc_id='$id'";

  $r=mysqli_query($db, $q70);
  session_destroy();
    echo '
      
  <script>
  alert("your account is deleted");
  window.location="login.php";
  </script>';
        exit();
  
      
  
  
  
      }


      ?>



  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- https://getbootstrap.com/ -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


  <!-- Modal for confirmation -->
 
</body>

</html>