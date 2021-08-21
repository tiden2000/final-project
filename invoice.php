<?php
/*
Payment page

This code is designed to be easily understandable at the expense of speed, 
for large productions this can be done with one sql request, instead of several

*/
include_once "config.php";
include_once "functions.php";
// Check code
if(!isset($_GET['code'])){
    exit();
}
$code = mysqli_escape_string($conn, $_GET['code']);
// Get invoice information
$address = getAddress($code);

$product = getInvoiceProduct($code);

$status = getStatus($code);

$price = getInvoicePrice($code);

// Status translation

$statusval = $status;
$info = "";
if($status == 0){
    $status = "<span style='color: orangered; font-size: 24px;' id='status'>PENDING</span>";
    $info = "<p>You payment has been received. Invoice will be marked paid on two blockchain confirmations.</p>";
}else if($status == 1){
    $status = "<span style='color: orangered; font-size: 24px;' id='status'>PENDING</span>";
    $info = "<p>You payment has been received. Invoice will be marked paid on two blockchain confirmations.</p>";
}else if($status == 2){
    $status = "<span style='color: green; font-size: 24px;' id='status'>PAID</span>";
}else if($status == -1){
    $status = "<span style='color: red; font-size: 24px;' id='status'>UNPAID</span>";
}else if($status == -2){
    $status = "<span style='color: red; font-size: 24px;' id='status'>Too little paid, please pay the rest.</span>";
}else {
    $status = "<span style='color: red; font-size: 24px;' id='status'>Error, expired</span>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitcoin store</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <!-- Invoice -->

        <div class='payment-box'>
            <div class="row">
                <div class="col" style="background-color:#e6e6e6;">
                    <h3 style="margin: auto; font-size: 36px;">INVOICE</h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <p style="font-size: 24px;">Total Price:</p>
                </div>
                <div class="col">
                <p style="font-size: 24px;"><?php echo round(USDtoBTC($price), 8); ?> ₿</p>
                </div>
            </div>
            
            <div class="row">
            <p style="font-size: 24px; margin: auto;">Address: <span style="color: blue;" id="address"><?php echo $address; ?></span></p>
            </div>
            <?php
            // QR code generation using google apis
            $cht = "qr";
            $chs = "300x300";
            $chl = $address;
            $choe = "UTF-8";

            $qrcode = 'https://chart.googleapis.com/chart?cht=' . $cht . '&chs=' . $chs . '&chl=' . $chl . '&choe=' . $choe;
            ?>
            <div class="qr-hold">
                <img src="<?php echo $qrcode ?>" alt="My QR code">
            </div>
            
            
            <p>Status: <?php echo $status; ?></p>
            <?php echo $info; ?>
            <div id="info"></div>
            <h3>What you're paying for:</h3>
            <h4><?php echo getProduct($product); ?></h4>
        </div>

        
    <script>
        var status = <?php echo $statusval; ?>
        
        // Create socket variables
        if(status < 2 && status != -2){
        var addr =  document.getElementById("address").innerHTML;
        var timestamp = Math.floor(Date.now() / 1000)-5;
        var wsuri2 = "wss://www.blockonomics.co/payment/"+ addr+"?timestamp="+timestamp;
        // Create socket and monitor
        var socket = new WebSocket(wsuri2, "protocolOne")
            socket.onmessage = function(event){
                console.log(event.data);
                response = JSON.parse(event.data);
                //Refresh page if payment moved up one status
                if (response.status > status)
                  setTimeout(function(){ window.location=window.location }, 1000);
            }
        }
        
    </script>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>