<?php
include "functions/connection.php";
include "functions/display_topsales.php";
include "functions/display_newarrival.php";

session_start();
if (isset($_SESSION['username'])) {

  if ($_SESSION['position'] == 'customer') {
    header("location: homepageuser.php");
    exit();
  } else {
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="project.css">
    <title>Document</title>
</head>
<body >

    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand"> <i class='bx bx-home-heart'></i>Ikea</a>
          <ul class="nav">
            <li >
                <a href="#home" class="nav-link">home</a>
            </li>
            <li >
                <a href="categoey.php" class="nav-link">product</a>
            </li>
            <li >
                <a href="#about" class="nav-link">About us</a>
            </li>
            <li >
                <a href="login.php" class="nav-link">log in</a>
            </li>
          </ul>

        </div>
      </nav>
      <section class="home" id="home">
        <h2>make your comfort Is our happiness </h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br> Iure distinctio ex repellat ullam, nobis pariatur perferendis vel dolore sed iste.</p><br>

      </section>
      <div class="newarrival">
        <h3><i class='bx bx-pin'  style="margin-top: 30px;"></i> NEW ARRIVAL</h3>
      </div>
      <div id="carouselExampleControls" class="carousel carousel-dark slide" data-ride="carousel">
        <div class="carousel-inner">
       
          <!-- begin gen loop -->
          <?php for( $a=0;$a<3;$a++){
            if ($a ==0) {
              echo '<div class="carousel-item active ">';
            } else {
              echo ' <div class="carousel-item ">';
            }
            ?>
        <div class="cards-wrapper" >
          <!-- begin -->
          <?php for( $i=0;$i<3;$i++){?>
        <div class="card" style="  margin-left: 50px;">
               <div class="image-wrapper">
               <a href="ikea_photos/<?php echo $display_news[$i+($a*3)]['img'];?>" target="_blank">
          <img src="ikea_photos/<?php echo $display_news[$i+($a*3)]['img'];?>" alt="Fjords" style="width:100%">
  </a>
</div> 
  <div class="card-body">
    <h5 class="card-title">Card title <span class="price"> price :<i class='bx bx-dollar' ></i><?php echo $display_news[$i+($a*3)]['price'];?></span></h5>
    <p class="card-text"><?php echo $display_news[$i+($a*3)]['description'];?></p>
    
    <a href="login.php" class="btn btn-primary">Add to cart <i class='bx bx-cart' ></i></a>
  </div>
  </div>

  <?php }?>
  <!-- end -->
</div>
</div>
<?php }?>
<!-- end gen loop -->
<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
</div>


<br>
<div class="bestseller">
    <h3> <i class='bx bxl-sketch' style="margin-top: 30px;"></i> Best SELLER</h3>
  </div>
  <div id="carouselControls" class="carousel carousel-dark slide" data-ride="carousel">
        <div class="carousel-inner">
       
          <!-- begin gen loop -->
          <?php for( $a=0;$a<3;$a++){
            if ($a ==0) {
              echo '<div class="carousel-item active ">';
            } else {
              echo ' <div class="carousel-item ">';
            }
            ?>
        <div class="cards-wrapper">
          <!-- begin -->
          <?php for( $i=0;$i<3;$i++){
            ?>
            
        <div class="card" style="  margin-left: 50px;">
               <div class="image-wrapper">
                <!-- write the img from database -->
                <a href="ikea_photos/<?php echo $display_topsales[$i+($a*3)]['img'];?>" target="_blank">
          <img src="ikea_photos/<?php echo $display_topsales[$i+($a*3)]['img'];?>" alt="Fjords" style="width:100%">
  </a>
</div> 
  <div class="card-body">
    <h5 class="card-title">Card title <span class="price"> price :<i class='bx bx-dollar' ></i><?php echo $display_topsales[$i+($a*3)]['price'];?></span></h5>
    <p class="card-text"><?php echo $display_topsales[$i+($a*3)]['description'];?></p>
    
    <a href="login.php" class="btn btn-primary">Add to cart <i class='bx bx-cart' ></i></a>
  </div>
  </div>

  <?php }?>
  <!-- end -->
</div>
</div>
<?php }?>
<!-- end gen loop -->
<a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="false"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="false"></span>
          <span class="sr-only">Next</span>
        </a>
</div>

</section>
<section class="about" id="about">
    <div class="about-img">
        <img src="about.jpg" alt="">
    </div>
    <div class="about-text">
        <h2>About Us</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique molestiae reprehenderit ullam impedit, voluptas nesciunt praesentium odio eum explicabo architecto aut laboriosam? Explicabo quibusdam provident voluptatibus aliquid similique quas vitae.</p><br>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, autem eos! Accusamus minus, animi labore aliquid incidunt nulla doloremque quidem, libero expedita assumenda voluptatum temporibus! Voluptatibus obcaecati optio deleniti a.</p><br>
    </div>
    
</section>
<br>
<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span class="conn">Get connected with us on social networks:</span>
      </div>
      <!-- Left -->
  
      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
            <i class='bx bxl-facebook-circle' style="font-size: 50px;"></i>
                </a>
        <a href="" class="me-4 text-reset">
            <i class='bx bxl-twitter' style="font-size: 50px;"></i>
                </a>
        <a href="" class="me-4 text-reset">
            <i class='bx bxl-google' style="font-size: 50px;" ></i>
                </a>
        <a href="" class="me-4 text-reset">
            <i class='bx bxl-instagram' style="font-size: 50px;"></i>
                </a>
        <a href="" class="me-4 text-reset">
            <i class='bx bxl-linkedin-square' style="font-size: 50px;"></i>
                </a>
        <a href="" class="me-4 text-reset">
            <i class='bx bxl-github' style="font-size: 50px;"></i>
                </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->
  
    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Ikea
            </h6>
            <p>
              Here you can use rows and columns to organize your footer content. Lorem ipsum
              dolor sit amet, consectetur adipisicing elit.
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="#!" class="text-reset">Chairs</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Sofas</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Tables</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Beds</a>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!" class="text-reset">Pricing</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Settings</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Orders</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Help</a>
            </p>
          </div>
          <!-- Grid column -->
  
          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class='bx bxs-home'></i> Egypt,cairo,korba</p>
            <p>
                <i class='bx bx-envelope' ></i>
                              Ikea@gmail.com
            </p>
            <p><i class='bx bxs-phone' ></i>+20 01091645257</p>
            <p><i class='bx bxs-phone' ></i>+20 01061107459</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->
  
    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: #1d3557; color: white;">
      © 2023 Copyright: Ikea company
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

        <script src="js/popper.min.js"></script>
        <script src="js/jquery-3.7.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
     

</body>
</html>
<?php }?>