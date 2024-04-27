<?php
include "functions/connection.php";
session_start();

if (isset($_SESSION['username'])) {

  if ($_SESSION['position'] == 'customer') {
    header("location: homepageuser.php");
    exit();
  } else if($_SESSION['position'] == 'admin') {
    header("location: index.php");
    exit();

  }
} else {
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title> Ikea Log In page</title>
    <link rel="stylesheet" href="login.css">
  </head>

  <body>

    <div class="container">
      <h1>Welcome back !</h1>

      <h2> <i class='bx bx-log-in'></i> sign in</h2>

      <form action="functions/sign.php" method="post">
        <label for="email"> <i class='bx bx-envelope'></i> E-mail</label>
        <input type="email" id="email" name="email" required>

        <label for="password"> <i class='bx bxs-key'></i> Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" name="Login" value='Login'>
        <p>Don't have an account? <a href="signup.php"> Sign Up</a></p>
      </form>
    </div>

  </body>

  </html>
  <?php
}
?>