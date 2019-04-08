<?php
    $host = 'localhost';
    $username = 'root';
    $pass = '';
    $db_name = 'social_network';

    $conn = new mysqli($host,$username,$pass,$db_name);
    if($conn->error){
        echo 'failed to connect database';
    }

?>