<?php
// Initialize the session
session_start();

if(isset($_POST['btn_contact_submit'])) {
    $name = $_POST['first_name'] . " " . $_POST['last_name'];
    $sender = $_POST['email'];
    $message = $_POST['message'];
    $details = $_POST['paragraph_text'];
    $header = "From: " . $sender;
    mail("tiden2000@gmail.com", $message, $details, $header);
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
</head>
<body style="background-color:#f2f2f2;" class="container-fluid">
<?php include "header.php"; ?>

    <div class="contact">
        <div class="row">
            <div class="col">
                <div class="contact-form">

                    <div class="row">
                        <div class="col">
                            <label>First Name</label><br>
                            <input type="text" name="first_name" value="">
                        </div>
                        <div class="col">
                            <label>Last Name</label><br>
                            <input type="text" name="last_name" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Your Email</label><br>
                            <input type="text" name="email" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Message</label><br>
                            <input type="text" name="message" value="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label>Details</label><br>
                            <textarea name="paragraph_text" cols="50" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input name="btn_contact_submit" type="submit" class="contact-submit">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col">
                <div class="contact-introduction">
                    <h1 style="color: green;">Contact Us</h1>
                    <p></p>
                    <p>Send a message to our email to answer your questions.</p>
                    <p>Our Email Address: company@mail.com</p>
                    <p>Or contact us through our phone number.</p>
                    <p>Our Phone Number: 123-456-7890</p>
                </div>
            </div>
        </div>
    </div>

</body>
<?php include "footer.php"; ?>