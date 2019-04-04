<?php
    $host = 'localhost';
    $username = 'root';
    $pass = '';
    $db_name = 'social_network';

    $conn = new mysqli($host,$username,$pass,$db_name);
    if($conn->error){
        echo 'failed to connect database';
    }

    // $sql = "SELECT * FROM heart WHERE PostID = 0 AND UserID = 0 ";
    // $result = mysqli_query($conn,$sql);
    // $row = mysqli_fetch_array($result);
    // if($row['LikeID']==''){
    //     echo "ko co ket qua";
    // }else{
    //     echo " co ket qua";
    // }
?>