<?php
    include "..\dbConfig\dbConfig.php";
    include "..\controller\common_function.php";
    include "..\controller\PostController.php";
    include "..\controller\UserController.php";
    
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
    <title>Home</title>
    <link rel="stylesheet" href="..\css\home_style.css">
    <!-- bootstrap cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/comment.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script text="javascript" src="..\js\index.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../icon/icons8-twitter-96.png">
    <!-- font google -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
</head>
<body> 
    <!-- Pop up tweet-->
    <div id = "pop-up">
        <div  class="" id="form">
            <form action="..\controller\common_function.php?id=<?php echo $user['UserID']?>" method="POST"  style="height: auto" enctype="multipart/form-data">
                <div id="head-form">
                    <div style="cursor: pointer;justify-self: left; margin-left: 15px;" id = 'close-pop-up'><img src="/twitter_clone_source/icon/x-mark-icon.png" alt=""></div>
                        <div style=" margin-right: 10px; justify-self: right; width: 45px; border: 1px solid #1da1f2; border-radius:20px; padding: 5px"> 
                            <input style="cursor:pointer;outline:none; border:none; color:#1da1f2; font-weight: bold;background-color: #fff" id="pop-up-tweet" name = "post-tweet" type="submit" value="tweet">
                        </div>
                    </div>
                    <div id="body-form">
                        <div style="justify-self: center; margin-top: 20px"><img style="border-radius: 50%; height: 30px; width: 30px" src="<?php echo $profileURL ?>" alt=""></div>
                        <div style="justify-content: center; display: grid;">
                            <textarea name = 'content-tweet' style="padding: 10px;border-radius: 10px 10px 0px 0px ;resize:none; margin-top: 20px ; background-color: #e6ecf0;  border:none; outline: none ;" type="text" placeholder="What's happening ?" rows="10" cols="70"></textarea>
                            <!-- Preview Image -->

                            <div style="border-radius: 0px 0px 10px 10px ;width:528px ;height: auto; display: grid;  justify-content: center; align-content: center; background-color: #e6ecf0 ;" id = "image-holder"></div>

                            <!-- ______ -->
                            <div id="image-gif-bar">
                                <input id="fileUpload" name="upload-img-post" type="file" hidden>
                                <img style="cursor:pointer" id = "btn_upload" src="..\icon\img-40.png" alt="">
                                <img src="/twitter_clone_source/icon/img-40.png" alt="">
                                <img src="/twitter_clone_source/icon/img-40.png" alt="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <header>
            <!-- _______NAVIGATION BAR_________ -->
            <div class="nav-bar">
                <div class="nav-bar-icon"> <button class="btn" id ="home-page"> <img  class = "nav-icon" src="..\icon\icons8-home-page-64.png" alt="">  </button></div>
                <div class="nav-bar-icon"> <button class="btn"> <img  class = "nav-icon" src="..\icon\icons8-hashtag-large-40.png" alt=""> </button></div>
                <div class="nav-bar-icon"> <button class="btn"> <img  class = "nav-icon" src="..\icon\icons8-notification-40.png" alt=""> </button></div>
                <div class="nav-bar-icon"> <button class="btn"> <img  class = "nav-icon" src="..\icon\icons8-speech-bubble-48.png" alt=""> </button></div>
                <div id="search">
                    <input id = "input-search" style="background-color: #e6ecf0; border:none; outline: none ; width: 100%"  type="text" placeholder="search">
                </div>
                <div class="nav-bar-icon" id="profile"><span style="font-weight: bold; font-size: 20px"><?php echo $user['FullName'] ?></span><img style="border-radius: 50%; height: 30px; width: 30px" class = "nav-icon" src="../images/<?php echo $user["image_profile"] ?>" alt=""></div>
                <div class="nav-bar-icon">
                    <form action="../controller/common_function.php" method="post">
                        <div id="div-log-out" style="cursor:pointer; padding: 5px; border: 1px solid #1da1f2; background-color: #1da1f2 ; border-radius: 20px"><input style="cursor:pointer;outline:none; border:none; color:#fff; font-weight: bold;background-color: #1da1f2" type="submit" value="Log out" name="btn_logout" id="log_out"></div> 
                    </form>
                </div>
            </div>
            <div style = "border-radius: 5px" id="live-search">
                Try searching for people, keywords
            </div>
        </header>
        <main>
            <div class="main-container">
                <!-- _________NEWS FEED________ -->
                <div class="newsfeed-side">
                    <div id="title-newsfeed-side">
                        <div style="font-size: 25px ; font-weight:800">Home</div>
                        <div> <button class="btn-news-feed"><img src="..\icon\icons8-star-half-empty-40.png" alt=""></button></div>
                    </div>
                    <!--  TWEET new tweet -->
                        <div id="tweet-newsfeed-side">
                                <div> <button class="btn-news-feed"> <img style="border-radius: 50%; height: 30px; width: 30px" src="../images/<?php echo $user["image_profile"] ?>" alt=""></button></div>
                                <div style="width:300px; background-color: #e6ecf0 ; cursor: pointer" id="tweet-bar">
                                    <input class="open-pop-up" id="tweet" style=" cursor: pointer; background-color: #e6ecf0;  border:none; outline: none ; width: 100%" type="text" placeholder="What's happening ?">
                                </div>

                                <div class="open-pop-up"> 
                                    <input id="fileUpload" name="upload-img-post" type="file" hidden>
                                    <img style="cursor:pointer" id = "btn_upload" src="..\icon\img-40.png" alt="">         
                                </div>
                                <div class="open-pop-up" style="border: 1px solid #1da1f2; border-radius:20px; padding: 5px"> 
                                    <input style="cursor:pointer;outline:none; border:none; color:#1da1f2; font-weight: bold;background-color: #fff" name = "post-tweet" type="button" value="tweet">
                                </div>
                        </div>
                        

            
                <!-- ________GET TWEET__________ -->
                <?php  require "../php/blocks/post.php"; ?>


                </div>
                <!-- ________RIGHT SIDE_________ -->
                <?php  require "../php/blocks/right-side.php"; ?>
            </div>
        </main>

    
</body>
</html>