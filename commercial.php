<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $name = $_SESSION['username'];
}
include_once "config.php";
include_once "functions.php";
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

<div class="listing-introduction">
    <div class="row">
        <div class="col">
            <div class="image">
                <img src="img/commercial_listing.jpg" alt="" >
                <div class="overlay">
                    <div class="text">Commercials</div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="listing">
                <p>Lorem Khaled Ipsum is a major key to success.
                    Celebrate success right, the only way, apple. They don’t want us to eat.
                    They key is to have every key, the key to open every door. How’s business? Boomin.
                    The other day the grass was brown, now it’s green because I ain’t give up. Never surrender.
                    Celebrate success right, the only way, apple. Surround yourself with angels.</p>
            </div>
        </div>
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
            $no_of_records_per_page = 4;
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
              $sql = "SELECT * FROM products WHERE type='Commercial' ORDER BY `id` DESC LIMIT $offset, $no_of_records_per_page";  // SQL statement for forming pages
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