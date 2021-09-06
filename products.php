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
  
  if(!empty($_POST['country_list'])
  and !empty($_POST['type_list'])
  and !empty($_POST['min_price'])
  and !empty($_POST['max_price']))
  {
    $search_sql = "";

    $search_str = $_POST['search_bar'];

    $country = $_POST['country_list'];
    $any_country;
    if($country == "Any") {$any_country = true;}
    else {$any_country = false;}

    $type = $_POST['type_list'];
    $any_type;
    if($type == "Any") {$any_type = true;}
    else {$any_type = false;}

    $min_price = $_POST['min_price'];

    $max_price = $_POST['max_price'];

    $search_sql = "SELECT * FROM `products` WHERE name LIKE '%$search_str%' AND country='$country' AND type='$type' AND price>=$min_price AND price<=$max_price ORDER BY `id` DESC";
    if($any_country == true) {
      $search_sql = str_replace("AND country='Any'", "", $search_sql);
    }
    if($any_type == true) {
      $search_sql = str_replace("AND type='Any'", "", $search_sql);
    }

    $_POST['search_sql'] = $search_sql;
  }
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

<?php include "header.php"; ?>

<img src="img/products_img.jpg" alt="" style="margin-left:-20px; width:102.3%; height:500px;">
<div class="centered" style="margin-top:80px;">Property Catalogue</div>

<!-- Search bar -->
<div class="search">
  <div class="container">
  <form action="" method="post" enctype="multipart/form-data">

    <div class="row">

    <!-- Country Drop-down -->
      <div class="col">
        <label for="country_list">Country</label>
        <select name= "country_list" id= "country_list_id" class="form-control" required>
          <?php
              echo "<option value='" . "Any" . "'>" . "Any" . "</option>"; 
              $sql = "SELECT * FROM country";
              $result=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_array($result))
              echo "<option value='" . $row['nicename'] . "'>" . $row['nicename'] . "</option>"; 
          ?>
        </select>
      </div>

      <!-- Property Type Drop-down -->
      <div class="col">
        <label for="type_list">Type</label>
        <select name= "type_list" id= "type_list_id" class="form-control" required>
          <?php
              echo "<option value='" . "Any" . "'>" . "Any" . "</option>";
              echo "<option value='" . "House" . "'>" . "House" . "</option>";
              echo "<option value='" . "Apartment" . "'>" . "Apartment" . "</option>";
              echo "<option value='" . "Penthouse" . "'>" . "Penthouse" . "</option>";
              echo "<option value='" . "Commercial" . "'>" . "Commercial" . "</option>";
              echo "<option value='" . "Office" . "'>" . "Office" . "</option>";
          ?>
        </select>
      </div>

      <!-- Name Input -->
      <div class="col">
        <label for="search_bar">Name</label><br>
        <input type="text" name="search_bar" value="" style="margin-top:1px; width:250px; height:35px;">
      </div>

      <!-- Minimun And Maximum Price Input -->
      <div class="col">
        <label for="min_price">Minimum Price: </label>
        <input type="text" name="min_price" value="1" style="margin-top:3px;">

        <label for="max_price">Maximum Price: </label>
        <input type="text" name="max_price" value="10000000">
      </div>
    </div>

    <!-- Submit Button -->
    <div class="row">
      <input name="btn_search" type="submit" class="btn btn-primary" value="SEARCH PROPERTY" style="background-color: #3dd978; margin-top:30px; width:100%; height:40px;">
    </div>

    </form>
  </div>
</div>

  <div style="margin-left: 200px;">
    <div class="row">
        <div class="product-hold">
            <?php

            // Get the current page number
            if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }

            // Number of products (sql records) to be displayed per page
            $no_of_records_per_page = 6;
            $offset = ($pageno-1) * $no_of_records_per_page;

            // Get total number of pages
            $total_pages_sql = "SELECT COUNT(*) FROM products";
            $result = mysqli_query($conn,$total_pages_sql);
            $total_rows = mysqli_fetch_array($result)[0];
            $total_pages = ceil($total_rows / $no_of_records_per_page);



            // Get and display all products
            $sql = "";
            if(!empty($_POST['search_sql'])) {
              $sql = $_POST['search_sql'] . " LIMIT $offset, $no_of_records_per_page";
            }
            else {
              $sql = "SELECT * FROM products ORDER BY `id` DESC LIMIT $offset, $no_of_records_per_page";  // SQL statement for forming pages
            }
            $result_data = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result_data)){
            ?>
                <div class="product">
                    <a href="details.php?id=<?php echo $row['id']; ?>"><img src="<?php echo $row['img_link']; ?>" alt=""></a>

                    <h5><?php echo $row['name']; ?></h5>

                    <h6 ><?php echo $row['country']; ?></h6>

                    <h6 style="margin-top:7px;"><?php echo $row['location']; ?></h6>

                    <p style="font-size:24px; font-weight:500; color:#ff8c1a;">$<?php echo $row['price'] ?></p>

                    <h6 style="margin-top:0px;"><?php echo $row['type']; ?></h6>
                    
                    <p style="color:#00b300;">Sold by: <?php echo $row['seller'] ?></p>

                    <a href="details.php?id=<?php echo $row['id']; ?>"><button class="details">More Details                                                     ----></button></a>

                    <a href="buy.php?id=<?php echo $row['id']; ?>"><button class="buy">Buy now                                                            ----></button></a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
  </div>

  <div class="page-button">  <!-- 'next' and 'previous' buttons for pages -->
      <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><--- Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next ---></a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
      </ul>
  </div>
    
</body>
<?php include "footer.php"; ?>
</html>