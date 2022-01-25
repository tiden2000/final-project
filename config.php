<?php
    // Blockonmics API
    $apikey = "WAnsk4iUPjdHPsHX4wKmvWNXB2FjGtzFWWZ6dGtZWdc";
    $url = "https://www.blockonomics.co/api/";
    
    $options = array( 
        'http' => array(
            'header'  => 'Authorization: Bearer '.$apikey,
            'method'  => 'POST',
            'content' => '',
            'ignore_errors' => true
        )   
    );

    // Connection info
    $conn = mysqli_connect('final-year-project-325215:asia-southeast1:heroku-project', 'root', 'Chienbot123', 'finalprojectdb', '3306'); // enter your info
?>