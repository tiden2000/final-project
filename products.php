<?php
include_once "config.php";
include_once "functions.php";
?>
<!DOCTYPE html>
<html>
    
</html>
<!-- Products -->
<main>
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
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">$<?php echo $row['price']; ?></h6>
                            <p class="card-text"><?php echo $row['description'] ?></p>
                            <a href="buy.php?id=<?php echo $row['id']; ?>" class="card-link">Buy now</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</main>