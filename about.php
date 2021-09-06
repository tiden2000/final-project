<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  $name = $_SESSION['username'];
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

<body style="background-color:white;" class="container-fluid">

<?php include "header.php"; ?>

  <h1 style="padding-left: 30px;">About Us</h1>
  <div class="row">
      <div class="col">
          <img src="img/about-us.jpg" alt="about" style="height: 600px; width: 550px; padding: 30px;"> 
      </div>
      <div class="col">
          <h3 style="border-bottom: 3px solid green; padding-bottom: 30px;">Our Story</h3>
          <p>Lorem Khaled Ipsum is a major key to success. They don’t want us to win. Always remember in the jungle there’s a lot 
              of they in there, after you overcome they, you will make it to paradise. Major key, don’t fall for the trap, stay focused. 
              It’s the ones closest to you that want to see you fail. Major key, don’t fall for the trap, stay focused. 
              It’s the ones closest to you that want to see you fail. 
              You see the hedges, how I got it shaped up? It’s important to shape up your hedges, it’s like getting a haircut, stay fresh.
          </p>
          <p style="padding-top: 150px;">Lorem Khaled Ipsum is a major key to success. They don’t want us to win. Always remember in the jungle there’s a lot 
              of they in there, after you overcome they, you will make it to paradise. Major key, don’t fall for the trap, stay focused. 
              It’s the ones closest to you that want to see you fail. Major key, don’t fall for the trap, stay focused. 
              It’s the ones closest to you that want to see you fail. 
              You see the hedges, how I got it shaped up? It’s important to shape up your hedges, it’s like getting a haircut, stay fresh.
          </p>
      </div>
  </div>

  <div style="background-image: url('img/about-background.jpg');">
      <div class="row" style="padding-top: 100px">
          <div class="col">
              <h3 style="text-align: center;">Our Services</h3>
              <div style="width: 60px; border-bottom: 3px solid green; margin-left: 715px; padding-top: 20px;"></div>
              <p style="text-align: center; padding-top: 30px;">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</p>
              <p style="text-align: center;">Mirum est notare quam littera gothica</p>
          </div>
      </div>
  
      <div class="row">
          <div class="col-4">
              <div class="box">
                  <h4 style="color:green">01.</h4>
                  <h4>Sell fashion products</h4>
                  <p>Lorem Khaled Ipsum is a major key to success. We the best. Celebrate success right, the only way, apple</p>
              </div>
          </div>
          <div class="col-4">
              <div class="box">
                  <h4 style="color:green">02.</h4>
                  <h4>Custom works</h4>
                  <p>Lorem Khaled Ipsum is a major key to success. We the best. Celebrate success right, the only way, apple</p>
              </div>
          </div>
          <div class="col-4">
              <div class="box">
                  <h4 style="color:green">03.</h4>
                  <h4>Worldwide delivery</h4>
                  <p>Lorem Khaled Ipsum is a major key to success. We the best. Celebrate success right, the only way, apple</p>
              </div>
          </div>
      </div>
    </div>
    <div class="row" style="padding: 100px">
        <div class="col" style="border: 1px solid #d9d9d9; padding: 50px; text-align: center; margin: 10px;">
            <h4>Contact us</h4>
            <p>Lorem Khaled Ipsum is a major key to success. Congratulations, you played yourself. Cloth talk. You do know, you do know that they don’t want you to have lunch</p>
        </div>
        <div class="col" style="border: 1px solid #d9d9d9; padding: 50px; text-align: center; margin: 10px;">
            <h4>Work with us</h4>
            <p>Lorem Khaled Ipsum is a major key to success. Congratulations, you played yourself. Cloth talk. You do know, you do know that they don’t want you to have lunch</p>
        </div>
    </div>
</body>

<?php include "footer.php"; ?>
</html>