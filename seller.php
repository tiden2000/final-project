<?php

/*
*Php code in this page let seller add or update a product and display data from database

*Adding product: Data is taken from user input in the html input form and pasted into sql string

*Updating product: Seller select a product from drop down menu then press the button -->
sql string is executed based on product name and display other data of that product into another html form for product update -->
seller modify data and press update button to update the database

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
$seller = $_SESSION["username"];

// Code for adding product

if(isset($_POST['btn_add'])) {

    // Upload image to a seller folder based on their id
    $currentDirectory = getcwd();
    $uploadDirectory = "/users/sellers/" .$id . "/";

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

    // Add seller product to the database
    $name = $_POST["name"];
    $location = $_POST["location"];
    $price = $_POST["price"];
    $country = $_POST["country_list"];
    $type = $_POST["type"];
    $img = "users/sellers/" . $id . "/" . $fileName;  // Link to the image added by seller
    global $conn;
    $sql = "INSERT INTO products (name, location, price, img_link, seller, country, type)
    VALUES ('$name', '$location', $price, '$img', '$seller', '$country', '$type')";
    mysqli_query($conn, $sql);

    header("location: seller.php");
}

// Code for updating product

if(isset($_POST['btn_display'])) {  // Display product information in the input bar
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
    $_SESSION['name'] = $row['name'];
    $_SESSION['location'] = $row['location'];
    $_SESSION['price'] = $row['price'];
    $_SESSION['img_link'] = $row['img_link'];
    $_SESSION['country'] = $row['country'];
    $_SESSION['product_type'] = $row['type'];
}

if(isset($_POST['btn_update'])) {  // Update product using data in the input bar

    // Upload image to a seller folder based on their id
    $currentDirectory = getcwd();
    $uploadDirectory = "/users/sellers/" .$id . "/";

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
    $img = "users/sellers/" . $id . "/" . $fileName;  // Link to the image added by seller
    $country = $_POST['country_list_update'];
    $type = $_POST['up_type'];
    global $conn;
    $sql = "UPDATE products SET name='$name', location='$location', price='$price', img_link='$img' , country='$country', type='$type' WHERE name='$name_old'";
    $result=mysqli_query($conn,$sql);

    header("location: seller.php");
}

if(isset($_POST['btn_delete'])) {  // Delete product
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
        <button onclick="productHide()">Product Management</button>
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
        <button class="logout"><a href="logout.php">Sign Out of Your Account</a></button>
    </div>

    <div id="product_form" style="display:block; width:1000px;">
        <h2>Submit product</h2>
        <p>Please fill this form to submit a product.</p>

        <div class="row">
            <div class="col">
                <!--************* 
                *************
                *************
                Product Add Form
                *************
                *************
                *************-->
                <form action="" method="post" enctype="multipart/form-data" style="width:300px;">
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="name" class="form-control" value="">
                    </div>    
                    
                    <div class="form-group">
                        <label>Location</label>
                        <input type="text" name="location" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" class="form-control" value="" step="any">
                    </div>

                    <div style="margin-top:30px;">
                        Upload An Image:
                        <input type="file" name="the_file" id="fileToUpload" style="margin-top:10px;">
                    </div>

                    <!-- Country drop down menu -->
                    <label>Country</label>
                    <select name= "country_list" id= "country_list_id" class="form-control" required>
                        <?php
                            $sql = "SELECT * FROM country";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result)) {
                                echo "<option value='" . $row['nicename'] . "'>" . $row['nicename'] . "</option>";
                            }
                        ?>
                    </select>

                    <!-- Radio button options to choose product type-->
                    <label style="margin-top:30px;">Product Type</label><br>
                    <input type="radio" id="house" name="type" value="House">
                    <label for="house">House</label><br>
                    <input type="radio" id="apartment" name="type" value="Apartment">
                    <label for="apartment">Apartment</label><br>
                    <input type="radio" id="penthouse" name="type" value="Penthouse">
                    <label for="penthouse">Penthouse</label>
                    <input type="radio" id="commercial" name="type" value="Commercial">
                    <label for="commercial">Commercial</label>
                    <input type="radio" id="office" name="type" value="Office">
                    <label for="office">Office</label>
                    <br>


                    <div style="margin-top:30px;">
                        <input name="btn_add" type="submit" class="btn btn-primary" value="Submit Product">
                    </div>
                </form>
            </div>

            <div class="col">
                <!-- Product drop down menu -->
                <label>Choose Product</label>
                <form action="" method="post" enctype="multipart/form-data" style="width:300px;">
                    <select name= "product_list" id= "product_list_id" class="form-control" required>
                        <?php
                            $username = $_SESSION["username"];
                            $sql = "SELECT * FROM products WHERE seller = '$username'";
                            $result=mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($result)) {
                                echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>"; 
                            }
                        ?>
                    </select>
                    <input name="btn_display" type="submit" class="btn btn-primary" value="Open Product" style="margin-top:15px;">
                </form>

                <!--************* 
                *************
                *************
                Product Update Form
                *************
                *************
                *************-->
                <form enctype="multipart/form-data" action="" method="post" style="width:300px;">
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
                        <input name="btn_update" type="submit" class="btn btn-primary" value="Update Product" style="margin-top:20px;">
                    </div>

                    <div class="form-group">
                        <input name="btn_delete" type="submit" class="btn btn-primary" value="Delete Product">
                    </div>
                </form>
            </div>
        </div>
    </div>    
</body>
<?php include "footer.php"; ?>
</html>