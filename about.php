<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $name = $_SESSION['username'];
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

<body style="background-color:white;" class="container-fluid">
    <div class="row" id='top-menu'>
        <div class="col">
          <a href="tel:123-456-7890">123-456-7890</a>
        </div>
  
        <div class="col">       
          <a href="mailto:company@mail.com">company@mail.com</a>
        </div>
  
        <div class="col-1">
          <?php
          if(isset($_SESSION['username'])) {echo "<a href='" . "seller.php" . "'>" . $_SESSION['username'] . "</a>";}
          else {echo "<a href='" . "register.php" . "'>" . "Register" . "</a>";}
          ?>
        </div>
  
        <div class="col-1">
          <?php
          if(isset($_SESSION['username'])) {echo "<a href='" . "logout.php" . "'>" . "Logout" . "</a>";}
          else {echo "<a href='" . "login.php" . "'>" . "Login" . "</a>";}
          ?>
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

    <h1 style="padding-left: 30px;">About Us</h1>
    <div class="row">
        <div class="col">
            <img src="img/about-us.jpg" alt="about" style="height: 600px; width: 550px; padding: 30px;"> 
        </div>
        <div class="col">
            <h3 style="border-bottom: 3px solid green; padding-bottom: 30px;">Our Story</h3>
            <p>Lorem Khaled Ipsum is a major key to success. They don’t want us to win. Always remember in the jungle there’s a lot 
                of they in there, after you overcome they, you will make it to paradise. Major key, don’t fall for the trap, stay focused. 
                It’s the ones closest to you that want to see you fail. Major key, don’t fall for the trap, stay focused. 
                It’s the ones closest to you that want to see you fail. 
                You see the hedges, how I got it shaped up? It’s important to shape up your hedges, it’s like getting a haircut, stay fresh.
            </p>
            <p style="padding-top: 150px;">Lorem Khaled Ipsum is a major key to success. They don’t want us to win. Always remember in the jungle there’s a lot 
                of they in there, after you overcome they, you will make it to paradise. Major key, don’t fall for the trap, stay focused. 
                It’s the ones closest to you that want to see you fail. Major key, don’t fall for the trap, stay focused. 
                It’s the ones closest to you that want to see you fail. 
                You see the hedges, how I got it shaped up? It’s important to shape up your hedges, it’s like getting a haircut, stay fresh.
            </p>
        </div>
    </div>

    <div style="background-image: url('img/about-background.jpg');">
        <div class="row" style="padding-top: 100px">
            <div class="col">
                <h3 style="text-align: center;">Our Services</h3>
                <div style="width: 60px; border-bottom: 3px solid green; margin-left: 715px; padding-top: 20px;"></div>
                <p style="text-align: center; padding-top: 30px;">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
                <p style="text-align: center;">Mirum est notare quam littera gothica</p>
            </div>
        </div>
    
        <div class="row">
            <div class="col-4">
                <div class="box">
                    <h4 style="color:green">01.</h4>
                    <h4>Sell fashion products</h4>
                    <p>Lorem Khaled Ipsum is a major key to success. We the best. Celebrate success right, the only way, apple</p>
                </div>
            </div>
            <div class="col-4">
                <div class="box">
                    <h4 style="color:green">02.</h4>
                    <h4>Custom works</h4>
                    <p>Lorem Khaled Ipsum is a major key to success. We the best. Celebrate success right, the only way, apple</p>
                </div>
            </div>
            <div class="col-4">
                <div class="box">
                    <h4 style="color:green">03.</h4>
                    <h4>Worldwide delivery</h4>
                    <p>Lorem Khaled Ipsum is a major key to success. We the best. Celebrate success right, the only way, apple</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 100px">
        <div class="col" style="border: 1px solid #d9d9d9; padding: 50px; text-align: center; margin: 10px;">
            <h4>Contact us</h4>
            <p>Lorem Khaled Ipsum is a major key to success. Congratulations, you played yourself. Cloth talk. You do know, you do know that they don’t want you to have lunch</p>
        </div>
        <div class="col" style="border: 1px solid #d9d9d9; padding: 50px; text-align: center; margin: 10px;">
            <h4>Work with us</h4>
            <p>Lorem Khaled Ipsum is a major key to success. Congratulations, you played yourself. Cloth talk. You do know, you do know that they don’t want you to have lunch</p>
        </div>
    </div>
</body>

<!-- Footer -->
<footer class="text-center text-lg-start bg-light text-muted">
    <!-- Section: Social media -->
    <section
      class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
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