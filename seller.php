<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "config.php";
$id = $_SESSION["id"];

if($_SERVER["REQUEST_METHOD"] == "POST") {

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
    $img = "users/sellers/" . $id . "/" . $fileName;  // Link to the image added by seller
    global $conn;
    $sql = "INSERT INTO products (name, location, price, img_link)
    VALUES ('$name', '$location', $price, '$img')";
    mysqli_query($conn, $sql);
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
    <div class="wrapper">
        <h2>Submit product</h2>
        <p>Please fill this form to submit a product.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
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
                <input type="number" name="price" class="form-control" value="">
            </div>

            <div>
                Upload a File:
                <input type="file" name="the_file" id="fileToUpload">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
        <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </div>    
</body>
</html>