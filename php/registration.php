<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/registration.css">
    <title>Sign up</title>
    <link rel="shortcut icon" href="../icon/icons8-twitter-96.png">
    <script src="../js/registration.js"></script>
</head>
<body>
<div class="container">
    <div class="card bg-light">
            <?php   if(isset($_GET['status'])){
                    if($_GET['status'] == 'failed'){
            ?>  
                <div id="status">
                    <span style="color: red">Invalid Input , please fill out blank </span>
                </div>
            <?php
                    }
                    
                }
            ?>
            <?php   if(isset($_GET['status'])){
                    if($_GET['status'] == 'success'){
            ?>  
                <div id="status">
                    <span style="color: green">Sign Up successfully</span>
                </div>
            <?php
                    }
                    
                }
            ?>
        <article class="card-body mx-auto" style="max-width: 400px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Get started with your free account</p>
            <form action="../controller/registrationController.php" method="post" enctype="multipart/form-data">
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input id='fullname' name="fullname" class="form-control" placeholder="Full name" type="text">
                </div> <!-- form-group// -->
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                    </div>
                    <input id="username" name="username" class="form-control"  placeholder="Username" >
                </div> <!-- form-group// -->
                <div id="text-warning-username" style="display: none; color: red">username must be more 6 characters</div>
                <!-- form-group end.// -->
                <div id="form-password" class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input id="password" name = "password" class="form-control" placeholder="Create password" type="password">
                    
                </div> <!-- form-group// -->
                <div id="text-warning" style="display: none; color: red">password must be more 6 characters</div>
                <div id="form-confirm-password" class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                    <input id = "confirm-password" name="confirm-password" class="form-control" placeholder="Repeat password" type="password">
                </div> <!-- form-group// -->
                <div  class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> image profile </span>
                    </div>
                    <input name="image" class="form-control" type="file">
                </div> <!-- form-group// -->
                <div  class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> Birthday </span>
                    </div>
                    <input name="date" class="form-control" type="date">
                </div> <!-- form-group// -->
                                                     
                <div class="form-group"  id="btn_signUp" >
                    <button name = "signUp" type="submit" class="btn btn-primary btn-block">Create Account</button>
                </div> <!-- form-group// -->     
            </form> 
                <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>                                                                 
            
        </article>
    </div> <!-- card.// -->

</div> 
<!--container end.//-->

</body>
</html>

