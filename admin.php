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
    $_SESSION['country'] = $row['country'];
    $_SESSION['product_type'] = $row['type'];
}

if(isset($_POST['btn_update_product'])) {

    $seller_id;
    $seller = $_SESSION['seller'];
    $sql = "SELECT * FROM users WHERE username = '$seller'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)) {
        $seller_id = $row['id'];
    }

    // Upload image to a seller folder based on their id
    $currentDirectory = getcwd();
    $uploadDirectory = "/users/sellers/" .$seller_id . "/";
    echo $uploadDirectory;

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed 

    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

    if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
    }

    if ($fileSize > 4000000) {
        $errors[] = "File exceeds maximum size (4MB)";
    }

    if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            echo "The file " . basename($fileName) . " has been uploaded";
        }
        else {
            echo "An error occurred. Please contact the administrator.";
        }
    }
    else {
        foreach ($errors as $error) {
            echo $error . "These are the errors" . "\n";
        }
    }

    $path = $_SESSION['img_link'];  // Delete old image
    if(file_exists($path)) {
        unlink($path);
    }

    $name_old = $_SESSION['name'];
    $name = $_POST['up_name'];
    $location = $_POST['up_location'];
    $price = $_POST['up_price'];
    $img = "users/sellers/" . $seller_id . "/" . $fileName;  // Link to the image added by seller
    $country = $_POST['country_list_update'];
    $type = $_POST['up_type'];
    global $conn;
    $sql = "UPDATE products SET name='$name', location='$location', price='$price', img_link='$img' , country='$country', type='$type' WHERE name='$name_old'";
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
    $_SESSION['user_type'] = $row['type'];
}

if(isset($_POST['btn_search_user'])) {
    $str = "";
    if(!empty($_POST['search_name'])) {
        $name = $_POST['search_name'];
        $str = "SELECT * FROM users WHERE username='$name'";
        $_SESSION['sql'] = $str;
    }
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

<body>

<?php include "header.php"; ?>

    <div class="tab-buttons">
        <button onclick="productHide()">Product Update</button>
        <script>
            function productHide() {
            var product = document.getElementById("product_form");
            var account = document.getElementById("account_form");
                if (product.style.display === "none") {
                    product.style.display = "block";
                    account.style.display = "none";
                } else {
                    product.style.display = "none";
                }
            }
        </script>

        <button onclick="accountHide()">Account Update</button>
        <script>
            function accountHide() {
            var account = document.getElementById("account_form");
            var product = document.getElementById("product_form");
                if (account.style.display === "none") {
                    account.style.display = "block";
                    product.style.display = "none";
                } else {
                    account.style.display = "none";
                }
            }
        </script>
        <button class="logout"><a href="logout.php">Sign Out of Your Account</a></button>
    </div>

    <div id="product_form" style="display:block">
        <h2>Edit submitted product</h2>
        <p>Please fill this form to edit a product.</p>

        <div class="row">

            <div class="col">
                <!-- Seller drop down menu -->
                <form action="" method="post" enctype="multipart/form-data">
                <label for="seller_list">Select A Seller</label>
                    <select name= "seller_list" id= "seller_list_id" class="form-control" required>
                        <?php
                            $sql = "SELECT * FROM users WHERE type = 'Seller'";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result))
                            echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>"; 
                        ?>
                    </select>
                    <input name="btn_display_seller" type="submit" class="btn btn-primary" value="Open Seller" style="margin-top:15px;">
                </form>

                <!-- Product drop down menu -->
                <form action="" method="post" enctype="multipart/form-data">
                <label for="product_list">Select A Product</label>
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
                    <input name="btn_display_product" type="submit" class="btn btn-primary" value="Open Product" style="margin-top:15px;">
                </form>
            </div>

            <div class="col-8">
                <!-- Update product form -->
                <form enctype="multipart/form-data" action="" method="post" style="margin-left:100px">
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

                    <!-- Country drop down menu -->
                    <label>Country</label>
                    <select name= "country_list_update" id= "country_list_update_id" class="form-control" required>
                        <?php
                            $sql = "SELECT * FROM country";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result)) {
                                if($_SESSION['country'] == $row['nicename']) {
                                    echo "<option value='" . $row['nicename'] . "' selected>" . $row['nicename'] . "</option>"; // Display country data of a product and give it default selection in the drop down 
                                }
                                else {
                                    echo "<option value='" . $row['nicename'] . "'>" . $row['nicename'] . "</option>";
                                }
                            }
                        ?>
                    </select>

                    <!-- Radio button options to choose product type-->
                    <label style="margin-top:30px;">Product Type</label><br>
                    <input type="radio" id="up_house" name="up_type" value="House"<?php if(isset($_SESSION['product_type']) and $_SESSION['product_type'] == "House") {echo "checked";}?>>
                    <label for="up_house">House</label><br>
                    <input type="radio" id="up_apartment" name="up_type" value="Apartment"<?php if(isset($_SESSION['product_type']) and $_SESSION['product_type'] == "Apartment") {echo "checked";}?>>
                    <label for="up_apartment">Apartment</label><br>
                    <input type="radio" id="up_penthouse" name="up_type" value="Penthouse"<?php if(isset($_SESSION['product_type']) and $_SESSION['product_type'] == "Penthouse") {echo "checked";}?>>
                    <label for="up_penthouse">Penthouse</label>
                    <input type="radio" id="up_commercial" name="up_type" value="Commercial"<?php if(isset($_SESSION['product_type']) and $_SESSION['product_type'] == "Commercial") {echo "checked";}?>>
                    <label for="up_commercial">Commercial</label>
                    <input type="radio" id="up_office" name="up_type" value="Office"<?php if(isset($_SESSION['product_type']) and $_SESSION['product_type'] == "Office") {echo "checked";}?>>
                    <label for="up_office">Office</label>
                    <br>

                    <div style="margin-top:30px;">
                        Upload A New Image:
                        <input type="file" name="the_file" id="fileToUpload" style="margin-top:10px; margin-bottom:10px;">
                    </div>

                    <div>
                        <p>Current Product Image:</p>
                        <img src="<?php if(isset($_SESSION['img_link'])) {echo $_SESSION['img_link'];} ?>" alt="" style="width:500px; height:300px;">
                    </div>

                    <div class="form-group">
                        <input name="btn_update_product" type="submit" class="btn btn-primary" value="Update Product" style="margin-top:20px;">
                    </div>

                    <div class="form-group">
                        <input name="btn_delete_product" type="submit" class="btn btn-primary" value="Delete Product">
                    </div>
                </form>
            </div>

        </div>

        
    </div>


    
    <!-- Account Management Form-->
    <div id="account_form" style="display:none">
        <div class="row">
            <div class="col">
                <!-- Seller drop down menu -->
                <form action="" method="post" enctype="multipart/form-data">
                <label for="user_list">Select Account</label>
                    <select name= "user_list" id= "user_list_id" class="form-control" required style="width:300px;">
                        <?php
                            $sql = "";
                            if(!empty($_POST['type'])) {
                                $sql = $_SESSION['sql'];
                            }
                            else if(!empty($_POST['search_name'])) {
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

                    <div class="form-group">
                        <label>Search User</label>
                        <input type="text" name="search_name" class="form-control" value="">
                    </div>

                    <!-- Radio button options to choose user type-->
                    <label>Account Type</label><br>
                    <input type="radio" id="admin" name="type" value="Admin">
                    <label for="admin">Admin</label><br>
                    <input type="radio" id="seller" name="type" value="Seller">
                    <label for="seller">Seller</label><br>
                    <input type="radio" id="user" name="type" value="User">
                    <label for="user">User</label>
                    <br>

                    <input name="btn_search_user" type="submit" class="btn btn-primary" value="Search User" style="width:300px;margin-bottom:15px;;">
                    <input name="btn_display_type" type="submit" class="btn btn-primary" value="Open This Type Of Users" style="width:300px;margin-bottom:15px;">
                    <input name="btn_display_user" type="submit" class="btn btn-primary" value="Open User Account Information" style="width:300px;">
                </form>
            </div>

            <div class="col">
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
                        <label>Type</label>
                        <input type="text" name="up_type" class="form-control" value="<?php if(isset($_SESSION['user_type'])){echo $_SESSION['user_type'];}?>" step="any">
                    </div>

                    <div class="form-group">
                        <input name="btn_update_account" type="submit" class="btn btn-primary" value="Update Account">
                    </div>

                    <div class="form-group">
                        <input name="btn_delete_account" type="submit" class="btn btn-primary" value="Delete Account">
                    </div>
                </form>
            </div>
        </div>
    </div>    
</body>
<?php include "footer.php"; ?>
</html>