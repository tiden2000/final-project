<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $name = $_SESSION['username'];
}
include_once "config.php";
include_once "functions.php";

// Search for product
if(isset($_POST['btn_search'])) {
  $search_sql = "";
  if(!empty($_POST['search_bar'])) {
    $search_str = $_POST['search_bar'];
    $search_sql = "SELECT * FROM `products` WHERE name LIKE '%$search_str%' ORDER BY `id` DESC";  // Display results that have keyword in any position 
  }
  else {
    $search_sql = "SELECT * FROM `products` ORDER BY `id` DESC";
  }
  $_POST['search_sql'] = $search_sql;
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
        <!-- Products -->
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
              <li><a href='/about.php'>ABOUT</a></li>
              <li><a href='http://'>CONTACT</a></li>
            </ul>
          </nav>
        </div>
      </div>

      <div>
        <form action="" method="post" enctype="multipart/form-data">
          <label for="search_bar">SEARCH: </label>
          <input type="text" name="search_bar" value="">
          <input name="btn_search" type="submit" class="btn btn-primary" value="SEARCH">
        </form>
      </div>
      <div style="margin-left: 190px;">
        <div class="row">
            <div class="product-hold">
                <?php
                // Get and display all products
                $sql = "";
                if(!empty($_POST['search_sql'])) {
                  $sql = $_POST['search_sql'];
                }
                else {
                  $sql = "SELECT * FROM `products` ORDER BY `id` DESC";
                }
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                ?>
                    <div class="product">
                        <img src="<?php echo $row['img_link']; ?>" alt="">
                        <h5><?php echo $row['name']; ?></h5>
                        <h6><?php echo $row['location']; ?></h6>
                        <p style="font-size:24px; font-weight:500; color:#ff8c1a;">$<?php echo $row['price'] ?></p>
                        <p style="color:#00b300;">Sold by: <?php echo $row['seller'] ?></p>
                        <a href="buy.php?id=<?php echo $row['id']; ?>"><button class="details">More Details                                                     ----></button></a>
                        <a href="buy.php?id=<?php echo $row['id']; ?>"><button class="buy">Buy now                                                            ----></button></a>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
        
    </body>
</html>