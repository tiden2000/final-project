<?php
/*
This page takes a product ID and creates an invoice for that product, then redirects the user there
*/

include_once "config.php";
include_once "functions.php";

if(!isset($_GET['id'])){
    // If no ID found, exit
    exit();
}
$id = mysqli_real_escape_string($conn, $_GET['id']);  // Get product id from database

$price = getPrice($id);  // Get the product price from product id

$code = createInvoice($id, $price);  // Generate an invoice code

echo "<script>window.location='invoice.php?code=".$code."'</script>";
?>