<?php
    include "../dbConfig/dbConfig.php";
    include "../controller/PostController.php";
    include "../controller/UserController.php";
    include "../controller/common_function.php";
    
    if(!isset($_SESSION['username'])){
        header("Location:login.php");
    }else{
        $user_control = new UserController();
        $user_personalPage = mysqli_fetch_array($user_control->getUser($_GET['UserID'])); // user on personal page

        $user_control_session = new UserController();  // user session
        $user_session_row = $user_control_session->getCurrentUser($_SESSION['username']);
        $user = mysqli_fetch_array($user_session_row);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/personalPage.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- PersonalPage javascript -->
    <script src="../js/personalPage.js"></script>
    <link rel="shortcut icon" href="../icon/icons8-twitter-96.png">
    <script src="../js/index.js"></script>
    <link rel="stylesheet" href="../css/pop-up-edit-profile.css">
    <link rel="stylesheet" href="../css/home_style.css">
    <title><?php echo($user_personalPage['FullName']. "(@". $user_personalPage['UserName']. ") / Twitter"); ?></title>
</head>
<body>

    <!-- Pop-up-edit-profile -->

    <div style="display:none;" id="pop-up-edit-profile">
        <form action="../controller/personalPageController.php?User=<?php echo $user_personalPage["UserID"] ?>" method="post" enctype="multipart/form-data">
            <div id="header-pop-up-edit-profile">
                <img id="close-pop-up" style="margin-left: 5px; cursor: pointer;" src="..\icon\x-mark-icon.png" alt="">
                <span style="font-weight: bolder; font-size: 20px">Edit profile</span>
                <div style="padding-top:7px; padding-left: 8px; width: 50px ; height: 25px;justify-self: right; background-color:#1da1f2 ;border-radius: 20px;">
                    <input name="save" id="btn_save" type="submit" value="Save">
                </div>
            </div>
            <div id="body-pop-up-edit-profile">
                <div id="cover-photo-edit" style="background-image: url('../images/<?php echo $user_personalPage["cover_photo"]; ?>');">
                    <input id="btn_upload_cover_photo_hidden" name="cover_photo" type="file" hidden>
                    <img id="btn_upload_cover_photo" style="cursor:pointer;justify-self: center; align-self: center" src="..\icon\camera.png" alt="">
                </div>
                <div id="img-profile-edit" style="background-image: url('../images/<?php echo $user_personalPage["image_profile"]; ?>');" >
                    <input id="btn_upload_profile_photo_hidden" name="profile_photo" type="file" hidden>
                    <img id="btn_upload_profile" style="cursor:pointer;justify-self: center; align-self: center" src="..\icon\camera.png" alt="">
                </div>
                <!-- Name -->
                <div class="txt-edit-profile">
                    <div class="txt-edit-profile-label">
                        <div style=" margin-left: 5px; padding-right:10px ; padding-top: 5px">Name</div>
                        <div>
                            <input value="<?php echo $user_personalPage["FullName"]; ?>" style="margin-top:10px ; background-color: #f5f8fa; margin-left: 5px;outline: none; border: none;" name="fullname_edit" autocapitalize="sentences" autocomplete="on" autocorrect="on" maxlength="50" placeholder="Add your name" spellcheck="true" type="text" dir="auto" data-focusable="true">
                        </div>
                    </div>
                </div>
                <!-- Bio -->
                <div class="txt-edit-profile">
                    <div class="txt-edit-profile-label">
                        <div style=" margin-left: 5px; padding-right:10px ; padding-top: 5px">Bio</div>
                        <div>
                            <input value="<?php echo $user_personalPage["bio"]; ?>" style="margin-top:10px ; background-color: #f5f8fa; margin-left: 5px; border:none; outline: none" name="bio_edit" autocapitalize="sentences" autocomplete="on" autocorrect="on" maxlength="50" placeholder="Add your Bio" spellcheck="true" type="text" dir="auto" data-focusable="true">
                        </div>
                    </div>
                </div>
                <!-- Location -->
                <div class="txt-edit-profile">
                    <div class="txt-edit-profile-label">
                        <div style=" margin-left: 5px; padding-right:10px ; padding-top: 5px">Location</div>
                        <div>
                            <input value="<?php echo $user_personalPage["location"]; ?>" style="margin-top:10px ; background-color: #f5f8fa; margin-left: 5px; border: none; outline: none" name="location_edit" autocapitalize="sentences" autocomplete="on" autocorrect="on" maxlength="50" placeholder="Add your Location" spellcheck="true" type="text" dir="auto" data-focusable="true">
                        </div>
                    </div>
                </div>            
            </div>
        </form>
    </div>

    <!-- NAVIGATION-BAR -->
    <?php require "../php/blocks/navigation-bar.php"; ?>
    <main>
        <div id="top-personal-page">
            <div style="height: 280px; background-image: url('../images/<?php echo $user_personalPage['cover_photo'] ?>');">
                
                <div id="avatar-profile">
                    <img style="border: 5px solid #fff; margin-top : 150px; margin-left: 60px;width: 200px ; height: 200px; border-radius: 50%;" src="..\images\<?php echo $user_personalPage['image_profile'] ?>" alt="">
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
                <?php 
                    if($_SESSION["username"]===$user_personalPage['UserName']){
                ?>
                    <button id="edit-profile" style="justify-self: center;cursor:pointer;outline:none; border: 2px solid #1da1f2; border-radius: 20px; width: 120px; color:#fff; font-weight: bold;background-color: #1da1f2" >Edit Profile</button>
                <?php
                    }
                ?>
                <?php
                    if($_SESSION["username"]!==$user_personalPage['UserName']){
                ?>
                    <button id="follow-unfollow" style="justify-self: center;cursor:pointer;outline:none; border: 2px solid #1da1f2; border-radius: 20px; width: 120px; color:#fff; font-weight: bold;background-color: #1da1f2" >Follow</button>
                <?php
                    }
                ?>
            </div>
        </div>
        <div id="body-personal-page">
            <div id="left-side-personal-page">
                <div id="FullName_PersonalPage">
                    <span style="font-size: 25px; font-weight:bolder; "><?php echo $user_personalPage['FullName'] ?></span>
                </div>
                <div>
                    <span style="color: grey">@<?php echo $user_personalPage['UserName'] ?></span>
                </div>
                <div id="bio">
                    <p>
                        <?php echo $user_personalPage['bio'] ?>
                    </p>
                </div>
                <div id="location">
                    <img src="../icon/location_personal_page.png" alt="">
                    <span style="color: grey"><?php echo $user_personalPage['location'] ?></span>
                </div>
                <div id="joined-date" style="margin-top: 5px;">
                    <img src="../icon/join_date.png" alt="">
                    <span style="color: grey">Joined <?php echo $user_personalPage["CreatedDate"]?></span>
                </div>
            </div>
            <div id="center-personal-page">
                <!-- TWEET ON NEWSFEED SIDE -->
                <?php require "../php/blocks/post.php" ?>
            </div>
            <div id="right-side-personal-page">
                <!-- Right-side-page -->
                <?php require "../php/blocks/right-side.php"?>
            </div>
        </div>
    </main>
</body>
</html>