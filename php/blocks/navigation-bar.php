<!DOCTYPE html>
<html lang="en">
<head>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script text="javascript" src="..\js\index.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- javascript for home page -->
    <script text="javascript" src="/twitter_clone_source/js/index.js"></script>
    <link rel="stylesheet" href="/twitter_clone_source/css/home_style.css">
    <style>
        header{
            width: 100%;
            z-index: 3;
            position: fixed;
            padding-top: 5px;
            background-color:#fff;
            margin-top: -10px;
            font-family: 'PT Sans', sans-serif;
            width: 100%;
            display: grid;
            grid-template-columns: 6% 6% 6% 6% 35% 20% 10%;
            height: 60px;
            justify-items: center;
            align-items: center;
            justify-content: center;
            font-family: 'PT Sans', sans-serif;
            border-bottom: 1px solid #bbb;
        }
        #tweet-bar,#search{
            width : 450px;
            padding: 5px;
            border: none;
            border-radius: 20px;
            border: 1.5px solid rgb(230, 236, 240);
            background-color:  rgb(230, 236, 240);
        }
        #live-search{
            margin-top: 47px;
            width: 470px;
            display: none;
            position: fixed;
            background-color: #fff;
            height: auto;
            justify-content: center;
            margin-left: 400px;
        }   
    </style>
</head>
<body>
    <header>
        <div class="nav-bar-icon"> <button class="btn" id ="home-page"> <img  class = "nav-icon" src="/twitter_clone_source\icon\icons8-home-page-64.png" alt="">  </button></div>
        <div class="nav-bar-icon"> <button class="btn"> <img  class = "nav-icon" src="/twitter_clone_source\icon\icons8-hashtag-large-40.png" alt=""> </button></div>
        <div class="nav-bar-icon"> <button class="btn"> <img  class = "nav-icon" src="/twitter_clone_source\icon\icons8-notification-40.png" alt=""> </button></div>
        <div class="nav-bar-icon"> <button class="btn"> <img  class = "nav-icon" src="/twitter_clone_source\icon\icons8-speech-bubble-48.png" alt=""> </button></div>
        <div id="search">
            <input id = "input-search" style="background-color: rgb(230, 236, 240); border:none; outline: none ; width: 100%"  type="text" placeholder="search">
        </div>
        <div class="nav-bar-icon" id="profile"><span style="font-weight: bold; font-size: 20px"><?php echo $user['FullName'] ?></span><img style="border-radius: 50%; height: 30px; width: 30px" class = "nav-icon" src="/twitter_clone_source/images/<?php echo $user["image_profile"] ?>" alt=""></div>
        <div class="nav-bar-icon">
            <form action="/twitter_clone_source/controller/common_function.php" method="post">
                <div id="div-log-out" style="cursor:pointer; padding: 5px; border: 1px solid #1da1f2; background-color: #1da1f2 ; border-radius: 20px"><input style="cursor:pointer;outline:none; border:none; color:#fff; font-weight: bold;background-color: #1da1f2" type="submit" value="Log out" name="btn_logout" id="log_out"></div> 
            </form>
        </div> 
        <div style = "border-radius: 5px" id="live-search">
            Try searching for people, keywords
        </div>
    </header>    
</body>
</html>
