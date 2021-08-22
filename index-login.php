<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset='UTF-8' name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href='css/style.css'>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src='js/script.js'></script>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>

<body style="background-color:#f8f3f3;" class="container-fullwidth">

  <div>

    <div class="row" id='top-menu'>
      <div class="col">
        <a href="tel:123-456-7890">123-456-7890</a>
      </div>

      <div class="col">       
        <a href="mailto:company@mail.com">company@mail.com</a>
      </div>

      <div class="col-1">
        <a href=""><?php echo $_SESSION["username"]?></a>
      </div>

      <div class="col-1">
        <a href="logout.php">Sign Out</a>
      </div>
    </div>


    <div class="row">
      <div id='navbar'>
        <a href="index.php"><img src="img/logo.png" alt="logo" id='logo'></a>
        <nav id='menu'>
          <input type='checkbox' id='responsive-menu' onclick='updatemenu()'><label></label>
          <ul>
            <li><a href='/index.php'>HOME</a></li>
            <li><a class='dropdown-arrow' href='http://'>LISTINGS</a>
              <ul class='sub-menus'>
                <li><a href='http://'>House</a></li>
                <li><a href='http://'>Apartment</a></li>
                <li><a href='http://'>Penthouse</a></li>
                <li><a href='http://'>Commercial</a></li>
              </ul>
            </li>
            <li><a class='dropdown-arrow' href='/products.php'>PROPERTIES</a>
              <ul class='sub-menus'>
                <li><a href='http://'>Services Sub Menu 1</a></li>
                <li><a href='http://'>Services Sub Menu 2</a></li>
                <li><a href='http://'>Services Sub Menu 3</a></li>
              </ul>
            </li>
            <li><a href='/about.html'>ABOUT</a></li>
            <li><a href='http://'>CONTACT</a></li>
          </ul>
        </nav>
      </div>
    </div>

    <div id='explore'>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" style="width: 100%;">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/house1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/house2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/house3.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
      </div>
    </div>


    <div style="text-align: center;">
      <p style="border-bottom: 1px solid black;border-radius: 10px;padding: 50px;font-size: 24px;">OUR POPULAR PARTNERS</p>
      <img src="img/stars.png" alt="stars" style="width: 200px; align-items: center; width: 0 auto;">
    </div>


    <div class="row">
      <div class="col">
        <div class="zoom">
          <img src="img/brand1.jpg" alt="brand1" id='brand'>
        </div>
      </div>

      <div class="col">
        <div class="zoom">
          <img src="img/brand2.jpg" alt="brand2" id='brand'>
        </div>
      </div>

      <div class="col">
        <div class="zoom">
          <img src="img/brand3.jpg" alt="brand3" id='brand'>
        </div>
      </div>

      <div class="col">
        <div class="zoom">
          <img src="img/brand4.jpg" alt="brand4" id='brand'>
        </div>
      </div>

      <div class="col">
        <div class="zoom">
          <img src="img/brand5.jpg" alt="brand5" id='brand'>
        </div>
      </div>

      <div class="col">
        <div class="zoom">
          <img src="img/brand6.jpg" alt="brand6" id='brand'>
        </div>
      </div>
    </div>


    <div id='explore'>
      <div class="row">
        <div class="col">
          <div class="zoom2">
            <img src="img/house.jpeg" alt="house" style="width: 700px; height:400px;">
            <div class="centered">House</div>
          </div>
        </div>

        <div class="col">
          <div class="zoom2">
            <img src="img/apartment.jpg" alt="apartment" style="width: 600px; height:400px;">
            <div class="centered">Apartment</div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col">
          <div class="zoom2">
            <img src="img/penthouse.jpg" alt="penthouse" style="width: 400px; height:400px;">
            <div class="centered">Penthouse</div>
          </div>
        </div>

        <div class="col">
          <div class="zoom2">
            <img src="img/commercial.jpg" alt="commercial" style="width: 400px; height:400px;">
            <div class="centered">Commercial</div>
          </div>
        </div>

        <div class="col">
          <div class="zoom2">
            <img src="img/office.jpg" alt="office" style="width: 400px; height:400px;">
            <div class="centered">Office</div>
          </div>
        </div>
      </div>
    </div>

    <div id='service'>
      <div class="row">
        <div class="col-sl-1" id="about-box">
          <h3>A young & creative distribution of realty based in SF.</h3>
          <h4 style="color: #00cc00;">TRUSTED BY 10K+ CLIENTS</h4>
          <p>Learning is cool, but knowing is better, and I know the key to success. The key to more success is to have a lot of pillows</p>
          <a href="http://stackoverflow.com"><button>Learn more about us --></button></a>
        </div>

        <div class="col">

          <div class="row">
            <div class="col" style="margin: 30px;">
              <h3>Premium Support</h3>
              <p>Celebrate success right, the only way, apple. The key to success is to keep your head above</p>
            </div>
            <div class="col" style="margin: 30px;">
              <h3>Update everytime</h3>
              <p>It’s the ones closest that want to see you fail. Every chance I get, I water the plants</p>
            </div>
          </div>

          <div class="row">
            <div class="col" style="margin: 30px;">
              <h3>Discount for member</h3>
              <p>Lorem Khaled Ipsum is a major key to success. Cloth talk. Look at the sunset, life is amazing</p>
            </div>
            <div class="col" style="margin: 30px;">
              <h3>Guaranteed Services</h3>
              <p>It’s the ones closest to you that want to see you fail. Every chance I get, I water the plants</p>
            </div>
          </div>
        </div>
      </div>
      <img src="img/buildings.png" alt="buildings" class="bottom-right">
    </div>
  </div>
</body>

<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
  <!-- Section: Social media -->
  <section
    class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
    style="margin-left: 600px;"
  >
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
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
            <i class="fas fa-gem me-3"></i>Company name
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
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
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
          <h6 class="text-uppercase fw-bold mb-4">
            Contact
          </h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

</html>