<?php
    include "..\dbConfig\dbConfig.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in</title>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="..\css\login_style.css">
    <link rel="shortcut icon" href="../icon/icons8-twitter-96.png">
    <script src="../js/login.js"></script>
</head>
<body>
    <div class="container">
        <div class="left-side">
            <div class="text-left-side">Follow your interests.</div>
            <div class="text-left-side">Hear what people are talking about.</div>
            <div class="text-left-side">Join the conversation.</div>
        </div>
        <div class="right-side">
            <div class="head-right-side">
                <form action="../controller/common_function.php" method="post">         
                    <div class="form-user"><input id="username_input" placeholder="username" style="outline:none ;border:none" type="text" name="username" id=""></div> 
                    <div class="form-user"><input id="password_input" placeholder="password" style="outline:none ;border:none" type="password" name="pass" id=""></div> 
                    <div class="btn_login" style="cursor:pointer"><input style="cursor:pointer;outline:none; border:none; color:#1da1f2; font-weight: bold;background-color: #fff" type="submit" value="Log in" name="btn_login"></div>  
                </form>
            </div>
            <div class="bottom-right-side">
                <div class="text-logo">
                    <div><img src="..\icon\icons8-twitter-96.png" alt=""></div>
                    <div style="font-size: 1.5em; font-weight:bold ;font-family: 'Source Sans Pro', 'Arial', 'sans-serif'">See what's happening in <br>
                         the world right now</div>
                </div>
                <div class="text-button">
                    <div style="font-size: 1.5em; font-weight:bold ;font-family: 'Source Sans Pro', 'Arial', 'sans-serif'">Join Twitter today.</div>
                        <div id="sign-up" class="btn_login" style="cursor: pointer; width: 100%; padding: 5px;
                        height: 25px;justify-self:center; border: 1px solid #1da1f2; 
                        background-color :#1da1f2 ;display: grid;justify-content: center
                        ; border-radius: 10px">
                        
                            <input value="Sign up" type="submit" name = "sign_up" style=" cursor:pointer; border:none; background-color:#1da1f2; outline:none ; color:#fff">
                        
                        </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer>

    </footer>
</body>
</html>