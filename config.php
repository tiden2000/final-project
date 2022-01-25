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
    $conn = mysqli_connect('27.3.0.248', 'root', '', 'finalprojectdb'); // enter your info
?>