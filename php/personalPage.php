<?php
    include "../dbConfig/dbConfig.php";
    include "../controller/PostController.php";
    include "../controller/UserController.php";
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }else{
        $post = new PostController();
        $allPost = $post->getPostByUserID($_GET['UserID']);
        $user_control = new UserController();
        $user = mysqli_fetch_array($user_control->getUser($_GET['UserID']));
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/personalPage.css">
    <title>Twitter</title>
</head>
<body>
    <!-- NAVIGATION-BAR -->
    <?php require "../php/blocks/navigation-bar.php"; ?>
    <main>
        <div id="top-personal-page">
            <div id = "cover-photo">
                
                <div id="avatar-profile">
                    <img style="border: 5px solid #fff; margin-top : 180px; margin-left: 60px;width: 200px ; height: 200px; border-radius: 50%;" src="..\images\<?php echo $user['image_profile'] ?>" alt="">
                </div>
                
            </div>
            <div id="nav-under-cover-photo">
                <div>

                </div>
                <div id="tweet-follow">
                    <div style="text-align: center">
                        <span>Tweets</span><br/>
                        <span>12</span>
                    </div>
                    <div style="text-align: center">
                        <span>Following</span><br/>
                        <span>12</span>
                    </div>
                    <div style="text-align: center">
                        <span>Followers</span><br/>
                        <span>12</span>
                    </div>
                </div>
                
                <button style="cursor:pointer;outline:none; border: 2px solid #1da1f2; border-radius: 20px; width: 120px; color:#fff; font-weight: bold;background-color: #1da1f2" >Follow</button>
                
            </div>
        </div>
        <div id="body-personal-page">
            <div id="left-side-personal-page">

            </div>
            <div id="center-personal-page">

            </div>
            <div id="right-side-personal-page">

            </div>
        </div>
    </main>
</body>
</html>