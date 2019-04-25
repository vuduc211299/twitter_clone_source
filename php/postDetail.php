<?php
     include "../dbConfig/dbConfig.php";
     include "../controller/common_function.php";
     include "../controller/UserController.php";

     // check session
    if(!$_SESSION['username']){
        header('Location:login.php');
    }else{
        $current_user = new UserController();
        $user = $current_user->getCurrentUser($_SESSION['username']);
        $user = $user->fetch_array();
        $profileURL = "../images/".$user['image_profile'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
    <?php require('../php/blocks/navigation-bar.php') ?>
    
</body>
</html>