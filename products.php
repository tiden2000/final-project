<?php
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
    <body>
        <div class="row">
            <div class="product-hold">
                <?php
                // Get and display all products
                $sql = "SELECT * FROM `products` ORDER BY `id` DESC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="product">
                        <div class="card" style="width: 95%;margin:0 auto;">
                            <div class="card-body">
                                <img src="<?php echo $row['img_link']; ?>" alt="" style="width 200px; height:200px;">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted"><?php echo $row['location']; ?></h6>
                                <p class="card-text">$<?php echo $row['price'] ?></p>
                                <a href="buy.php?id=<?php echo $row['id']; ?>" class="card-link">Buy now</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </body>
</html>