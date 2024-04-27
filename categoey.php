<!DOCTYPE html>
<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'ikea');
$query = "SELECT * from categories";
$result = mysqli_query($conn, $query);


?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="category.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <style>
     
        @media (max-width: 768px) {
            .navbar-brand {
                float: none;
                margin: 0 auto;
            }

            #nav1 a,
            #nav2 {
                text-align: center;
            }

            #nav2 ul {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
            }

            #nav2 li {
                margin: 0.5rem;
            }

            .home h2 {
                font-size: 1.5em;
            }

        }
    </style>

  <title>Document</title>
</head>

<body>
  
  <script>
    function myFunction() {
      confirm("your Item added successfully go and check it!");
    }
  </script>
  <header>
  <nav class="navbar navbar-expand-lg " id="nav1">
      <div class="container">
        <div class="navbar-brand" style="float: left;"> <i class='bx bx-home-heart'></i>Ikea</div>
      </div>
      <a href="homepagegen.php" style="margin-right: 10px; color: white;"><i class='bx bx-arrow-back' style="font-size: 35px;"></i> </a>
      <?php if(isset($_SESSION['username'])){ ?>
      <a href="shopping.php" style="color: white;"><i class='bx bx-cart' style="font-size: 35px;" ></i> </a>
      <?php } ?>
    </nav>
    <nav id="nav2" class="topnav">
    <ul class="nav justify-content-center" >
    <li class="nav-item">
        <a class="nav-link active" href="#home">category</a>
      </li>
      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<li class=\"nav-item\">
        <a class=\"nav-link\" href=\"#{$row['cat_name']}\">{$row['cat_name']}</a>
      </li>";

      }
      
      ?>
     
     
     
    </ul>
</nav>
  </header>
  <section id="home" class="home">
    <h2>welcome in our category page <br> choose your favorite items with us </h2>
  </section>

  <?php
  mysqli_data_seek($result, 0);

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<section id='" . $row['cat_name'] . "' class='" . $row['cat_name'] . "'>


        <div class=\"container d-flex justify-content-center mt-50 mb-50\">
            <div class=\"row\">";
    $cat_id = $row['cat_id'];  // Assuming your category ID is in cat_id column
    $query1 = "SELECT * from products WHERE cat_id='$cat_id'";
    $result1 = mysqli_query($conn, $query1);

    while ($rowNested = mysqli_fetch_assoc($result1)) {
      echo "<div class=\"col-md-4 mt-2\">
        <div class=\"card\">
            <div class=\"card-body\">
                <div class=\"card-img-actions\">
                    <img src=\"ikea_photos/".$rowNested['img']."\" class=\"card-img img-fluid\" width=\"96\" height=\"350\" alt=\"\">
                </div>
            </div>

            <div class=\"card-body bg-light text-center\">
            <h3 class=\"mb-0 font-weight-semibold\">" . $rowNested['product_name'] . "</h3>

                <div class=\"mb-2\">

                    <h6 class=\"font-weight-semibold mb-2\">
                        <p class=\"text-default mb-2\">" . $rowNested['description'] . "</p>
                    </h6>
                </div>

                <h3 class=\"mb-0 font-weight-semibold\">$" . $rowNested['price'] . "</h3>

                <div class=\"star\">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
            </div>
                <div class=\" discount\">
                <p>Discount: " . ($rowNested['discount']*100) . "%</p>
                </div>
                <div class=\"in stock\">
                <b> IN STOCK :" . $rowNested['unit_in_stock'] . " </b>
                </div>
                <form action='functions/cart.php?root=../categoey.php&id=" . $rowNested['product_id'] . "' method='Post'>
                <button type=\"submit\" class=\"btn bg-cart\" > Add to cart <i class='bx bx-cart'></i></button>
                </form>
            </div>
        </div>
    </div>";
    }

    echo "</div>
    </div>
</section>";
  }


  ?>

  <script>
   let section = document.querySelectorAll('section');
let navlinks = document.querySelectorAll('header nav a');
window.onscroll = () => {
  section.forEach(sec => {
    let top = window.scrollY;
    let offset = sec.offsetTop - 250;
    let height = sec.offsetHeight;
    let id = sec.getAttribute('id');
    if (top >= offset && top < offset + height) {
      navlinks.forEach(links => {
        links.classList.remove('active');
        document.querySelector('header nav a[href*="' + id + '"]').classList.add('active');
      });
    }
  });
};

   
  </script>
  <script src="js/popper.min.js"></script>
  <script src="js/jquery-3.7.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
</body>

</html>