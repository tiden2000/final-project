<?php

/*
*Php code in this page let admin update a product or update an account

*Updating product: Similar code in seller.php

*Updating account: Work similarly to product update functions

*Note: $POST variables are variables that store user input data taken from input forms. $SESSION variables are used to store data taken from database
to be pasted into input form. Genrally, $SESSION variables are used to transfer data between php scripts in the same files.
*/

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";

$id = $_SESSION["id"];
$admin = $_SESSION["username"];

// Code for product management form

if(isset($_POST['btn_display_seller'])) {
    if(!empty($_POST['seller_list'])) {
        $_SESSION['seller'] = $_POST['seller_list'];
    }
    else {
        echo 'Please select a seller.';
    }
}

if(isset($_POST['btn_display_product'])) {  // Display product information in the input bar
    $selected = "";
    if(!empty($_POST['product_list'])) {
        $selected = $_POST['product_list'];
    }
    else {
        echo 'Please select an existing product.';
    }
    global $conn;
    $sql = "SELECT * FROM products WHERE name = '$selected'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    echo "<br>";
    // Session data that will display product data on the input form
    $_SESSION['name'] = $row['name'];
    $_SESSION['location'] = $row['location'];
    $_SESSION['price'] = $row['price'];
    $_SESSION['img_link'] = $row['img_link'];
}

if(isset($_POST['btn_update_product'])) {
    $name_old = $_SESSION['name'];
    $name = $_POST['up_name'];
    $location = $_POST['up_location'];
    $price = $_POST['up_price'];
    global $conn;
    $sql = "UPDATE products SET name='$name', location='$location', price='$price' WHERE name='$name_old'";
    $result=mysqli_query($conn,$sql);
    header("location: admin.php");
}

if(isset($_POST['btn_delete_product'])) {
    $path = $_SESSION['img_link'];
    if(file_exists($path)) {
        unlink($path);
    }
    $name_old = $_SESSION['name'];
    global $conn;
    $sql = "DELETE FROM products WHERE name='$name_old'";
    $result=mysqli_query($conn,$sql);
    echo $sql;
}

// Code for account management form

if(isset($_POST['btn_display_type'])) {
    $str = "";
    if(!empty($_POST['type'])) {
        $type = $_POST['type'];
        $str = "SELECT * FROM users WHERE type='$type'";
        $_SESSION['sql'] = $str;
    }
}

if(isset($_POST['btn_display_user'])) {
    $selected = "";
    if(!empty($_POST['user_list'])) {
        $selected = $_POST['user_list'];
    }
    else {
        echo 'Please select an existing user.';
    }
    global $conn;
    $sql = "SELECT * FROM users WHERE username = '$selected'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    echo "<br>";
    $_SESSION['username'] = $row['username'];
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['type'] = $row['type'];
}

if(isset($_POST['btn_update_account'])) {
    $id_old = $_SESSION['user_id'];
    $id = $_POST['up_id'];
    $name = $_POST['up_username'];
    $type = $_POST['up_type'];
    global $conn;
    $sql = "UPDATE users SET id=$id, username='$name', type='$type' WHERE id=$id_old";
    $result=mysqli_query($conn,$sql);
    header("location: admin.php");
}

if(isset($_POST['btn_delete_account'])) {
    $id_old = $_SESSION['user_id'];
    global $conn;
    $sql = "DELETE FROM users WHERE id=$id_old";
    $result=mysqli_query($conn,$sql);
    echo $sql;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>

    <button onclick="productHide()">Open Product Form</button>
    <script>
        function productHide() {
        var x = document.getElementById("product_form");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

    <button onclick="accountHide()">Open Account Form</button>
    <script>
        function accountHide() {
        var x = document.getElementById("account_form");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>

    <div class="wrapper" id="product_form" style="display:none">
        <h2>Edit submitted product</h2>
        <p>Please fill this form to edit a product.</p>

        <!-- Seller drop down menu -->
        <form action="" method="post" enctype="multipart/form-data">
            <select name= "seller_list" id= "seller_list_id" class="form-control" required>
                <?php
                    $sql = "SELECT * FROM users WHERE type = 'Seller'";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($result))
                    echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>"; 
                ?>
            </select>
            <input name="btn_display_seller" type="submit" class="btn btn-primary" value="Open Seller">
        </form>

        <!-- Product drop down menu -->
        <form action="" method="post" enctype="multipart/form-data">
            <select name= "product_list" id= "product_list_id" class="form-control" required>
                <?php
                    $username = $_SESSION["username"];
                    $seller = $_SESSION['seller'];
                    $sql = "SELECT * FROM products WHERE seller = '$seller'";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($result))
                    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>"; 
                ?>
            </select>
            <input name="btn_display_product" type="submit" class="btn btn-primary" value="Open Product">
        </form>

        <!-- Update product form -->
        <form action="" method="post">
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="up_name" class="form-control" value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}?>">
            </div>    
            
            <div class="form-group">
                <label>Location</label>
                <input type="text" name="up_location" class="form-control" value="<?php if(isset($_SESSION['location'])){echo $_SESSION['location'];}?>">
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="number" name="up_price" class="form-control" value="<?php if(isset($_SESSION['price'])){echo $_SESSION['price'];}?>" step="any">
            </div>

            <div class="form-group">
                <input name="btn_update_product" type="submit" class="btn btn-primary" value="Update Product">
            </div>

            <div class="form-group">
                <input name="btn_delete_product" type="submit" class="btn btn-primary" value="Delete Product">
            </div>
        </form>
        
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </div>


    
    <!-- Account Management Form-->
    <div class="wrapper" id="account_form" style="display:none">
        <!-- Seller drop down menu -->
        <form action="" method="post" enctype="multipart/form-data">
            <select name= "user_list" id= "user_list_id" class="form-control" required>
                <?php
                    $sql = "";
                    if(!empty($_POST['type'])) {
                        $sql = $_SESSION['sql'];
                    }
                    else {
                        $sql = "SELECT * FROM users";
                    }
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($result))
                    echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>"; 
                ?>
            </select>

            <!-- Radio button options to choose user type-->
            <label>Account Type</label><br>
            <input type="radio" id="admin" name="type" value="Admin">
            <label for="admin">Admin</label><br>
            <input type="radio" id="seller" name="type" value="Seller">
            <label for="seller">Seller</label><br>
            <input type="radio" id="user" name="type" value="User">
            <label for="user">User</label>
            <br>

            <input name="btn_display_type" type="submit" class="btn btn-primary" value="Open This Type Of Users">
            <input name="btn_display_user" type="submit" class="btn btn-primary" value="Open User Account Information">
        </form>

        <!-- Update account form -->
        <form action="" method="post">

            <div class="form-group">
                <label>ID</label>
                <input type="text" name="up_id" class="form-control" value="<?php if(isset($_SESSION['user_id'])){echo $_SESSION['user_id'];}?>">
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="up_username" class="form-control" value="<?php if(isset($_SESSION['username'])){echo $_SESSION['username'];}?>">
            </div>    
            
            <div class="form-group">
                <label>Password</label>
                <p>*Password cannot be displayed and edited on page due to security risks</p>
            </div>

            <div class="form-group">
                <label>Type</label>
                <input type="text" name="up_type" class="form-control" value="<?php if(isset($_SESSION['type'])){echo $_SESSION['type'];}?>" step="any">
            </div>

            <div class="form-group">
                <input name="btn_update_account" type="submit" class="btn btn-primary" value="Update Account">
            </div>

            <div class="form-group">
                <input name="btn_delete_account" type="submit" class="btn btn-primary" value="Delete Account">
            </div>
        </form>
    </div>    
</body>
</html>