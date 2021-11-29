<?php
// Initialize the session
session_start();
/*
This page takes a product ID and creates a details page for that product, then redirects the user there
*/

include_once "config.php";
include_once "functions.php";

if(!isset($_GET['id'])){
    // If no ID found, exit
    exit();
}
$id = mysqli_real_escape_string($conn, $_GET['id']);  // Get product id from database

global $conn;
$sql = "SELECT * FROM `products` WHERE `id`='$id'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $POST['name'] = $row['name'];
    $POST['location'] = $row['location'];
    $POST['price'] = $row['price'];
    $POST['img_link'] = $row['img_link'];
    $POST['country'] = $row['country'];
}
$sql = "SELECT * FROM `product_details` WHERE `product_id`='$id'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $POST['description'] = $row['description'];
    $POST['area'] = $row['area'];
    $POST['bedrooms'] = $row['bedrooms'];
    $POST['bathrooms'] = $row['bathrooms'];
    $POST['garages'] = $row['garages'];
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

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<script>

    /* This script adds google map and defaults a marker to the country of the product
    How it works:
    -Map is initialized
    -A function that convert a location text string into coordinate that google map can receive
    -An html input as location text string and a submit button to submit the input
    -When page loads, php get country name of the prodduct and give data to the html input
    -A script to auto click the submit button for above input thus marking the correct country
     */
    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {  // Initialize and add the map
            zoom: 4,
            center: { lat: -34.397, lng: 150.644 },
        });
        const geocoder = new google.maps.Geocoder();
        document.getElementById("submit").addEventListener("click", () => {  // Set map marker when click submit button
            geocodeAddress(geocoder, map);
        });

        window.onload=function(){  // Auto click submit button on page load
        document.getElementById("submit").click();
        };
    }
    
    function geocodeAddress(geocoder, resultsMap) {  // This function converts location text to coordinate
    const address = document.getElementById("address").value;
    geocoder
        .geocode({ address: address })
        .then(({ results }) => {
        resultsMap.setCenter(results[0].geometry.location);
        new google.maps.Marker({
            map: resultsMap,
            position: results[0].geometry.location,
        });
        })
        .catch((e) =>
        alert("Geocode was not successful for the following reason: " + e)
        );
    }
</script>
    
</head>
<body style="background-color:white;" class="container-fluid">

    <?php include "header.php"; ?>

    <div class="details_page">

        <input id="address" type="textbox" value="<?php echo $POST['country'] ?>" style="display:none;"/>  <!-- Country input for google map -->
        <input id="submit" type="button" value="Geocode" style="display:none;"/>  <!-- Submit button for above input -->  <!-- Input and Submit are hidden as they are not required to actually take user input -->

        <h5 style="font-size: 24px; margin-top:50px;"><?php echo $POST['name']?></h5>  <!-- Product Name -->

        <p style="font-size: 30px; color:orange; float:right;">$<?php echo $POST['price']?></p>  <!-- Product Price -->

        <h6 style="font-size: 20px; color:gray; margin-top:30px;"><?php echo $POST['location']?></h6>  <!-- Product Location -->

        <!-- Product Details (area, bedroom, bathroom, garage) -->
        <p style="margin-left: 50px;" class="interior"><img src="img/area.png" alt="" class="interior_icons"><?php echo $POST['area'] . " m2"?></p>
        <p class="interior"><img src="img/bedroom.png" alt="" class="interior_icons"><?php echo $POST['bedrooms']?></p>
        <p class="interior"><img src="img/bathroom.png" alt="" class="interior_icons"><?php echo $POST['bathrooms']?></p>
        <p style="margin-top: 22px;" class="interior"><img src="img/garage.png" alt="" class="interior_icons"><?php echo $POST['garages']?></p>
        
        <img style="width:800px;" src="<?php echo $POST['img_link']; ?>" alt="">  <!-- Product Image -->

        <!-- Product Description -->
        <h6 style="font-size: 24px; color:green; margin-top:50px;">Property Description</h2>
        <p style="line-height: 1.5; width:100%;"><?php echo $POST['description']?></p>

        <!-- Buy Button -->
        <a href="buy.php?id=<?php echo $id ?>"><button class="buy" style="margin-bottom: 100px; width:100%; margin-top: 50px;">PURCHASE</button></a>

        <!-- Google Map -->
        <div id="map"></div>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmhw71F5AtKpr4xq8avgECGKPSEGHKbxQ&callback=initMap&libraries=&v=weekly"
            async
        ></script>

        <!-- Return -->
        <a href="products.php"><button class="details" style="margin-top: 100px;">Return To Browsing ----></button></a>
    </div>

</body>
<?php include "footer.php"; ?>
</html>