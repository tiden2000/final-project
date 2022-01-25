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

    $servername = "34.87.175.108";
    $username = "root";
    $password = "Chienbot123";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully";
?>