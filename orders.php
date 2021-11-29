<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
/*
Payment page

This code is designed to be easily understandable at the expense of speed, 
for large productions this can be done with one sql request, instead of several

*/
include_once "config.php";
include_once "functions.php";

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
<body style="background-color:white;" class="container-fluid">

<?php include "header.php"; ?>
<!-- Invoice -->
    <div class="row" style="margin-left:100px; margin-bottom:50px;">
        <h1 style="width:100%;">Previous Purchases</h1>
        <?php
        $user_id = $_SESSION['id'];
        $ip = getIp();
        $sql = "SELECT * FROM `orders` WHERE `user_id`='$user_id' ORDER BY `id` DESC";
        $result = mysqli_query($conn, $sql);
        // Check number of orders
        if(mysqli_num_rows($result)==0){
            // No previous orders
            ?>
            <p>No previous orders</p>
            <?php
        }else {
            ?>
            <table class="table table-striped" style="width:900px;">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Invoice</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <th scope="row"><?php echo getProduct(getInvoiceProduct($row['invoice'])); ?></th>
                            <td><a href="invoice.php?code=<?php echo $row['invoice']; ?>"><?php echo $row['invoice']; ?></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
        }
        ?>
    </div>

    <?php include "footer.php"; ?>
</body>
</html>