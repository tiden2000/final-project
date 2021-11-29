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

    <?php include "header.php"; ?>

    <div class='carousel'>
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
            <div class="carousel-item">
                <img class="d-block w-100" src="img/house4.jpg" alt="Fourth slide">
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
          <img src="img/brand1.jpg" alt="brand1" id='brand' style="-webkit-animation: fadein 0.5s; animation: fadein 0.5s;">
        </div>
      </div>

      <div class="col">
        <div class="zoom">
          <img src="img/brand2.jpg" alt="brand2" id='brand' style="-webkit-animation: fadein 1s; animation: fadein 1s;">
        </div>
      </div>

      <div class="col">
        <div class="zoom">
          <img src="img/brand3.jpg" alt="brand3" id='brand' style="-webkit-animation: fadein 1.5s; animation: fadein 1.5s;">
        </div>
      </div>

      <div class="col">
        <div class="zoom">
          <img src="img/brand4.jpg" alt="brand4" id='brand' style="-webkit-animation: fadein 2s; animation: fadein 2s;">
        </div>
      </div>

      <div class="col">
        <div class="zoom">
          <img src="img/brand5.jpg" alt="brand5" id='brand' style="-webkit-animation: fadein 2.5s; animation: fadein 2.5s;">
        </div>
      </div>

      <div class="col">
        <div class="zoom">
          <img src="img/brand6.jpg" alt="brand6" id='brand' style="-webkit-animation: fadein 3s; animation: fadein 3s;">
        </div>
      </div>
    </div>

    <div id='explore'>
      <div class="row">
        <div class="col">
          <div class="zoom2">
            <img src="img/house.jpeg" alt="house" style="width: 650px; height:400px;">
            <div class="centered"><a href="house.php">House</a></div>
          </div>
        </div>

        <div class="col">
          <div class="zoom2">
            <img src="img/apartment.jpg" alt="apartment" style="width: 625px; height:400px;">
            <div class="centered"><a href="apartment.php">Apartment</a></div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col">
          <div class="zoom2">
            <img src="img/penthouse.jpg" alt="penthouse" style="width: 350px; height:400px;">
            <div class="centered"><a href="penthouse.php">Penthouse</a></div>
          </div>
        </div>

        <div class="col">
          <div class="zoom2">
            <img src="img/commercial.jpg" alt="commercial" style="width: 350px; height:400px;">
            <div class="centered"><a href="commercial.php">Commercial</a></div>
          </div>
        </div>

        <div class="col">
          <div class="zoom2">
            <img src="img/office.jpg" alt="office" style="width: 500px; height:400px;">
            <div class="centered"><a href="office.php">Office</a></div>
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
      
    </div>
    <img src="img/buildings.png" alt="buildings" class="bottom-right">

</body>

<div style="height:100px;"></div>
<?php include "footer.php"; ?>
</html>