<?php
    $post = new PostController();
    if(isset($_GET['UserID'])){ // posts are presented on user page
        $allpost = $post->getPostByUserID($_GET['UserID']);
       
    }else{
        $allpost = $post->getAllPost();  // posts are presented on home page
       
    }
    while ($row_allpost = mysqli_fetch_array($allpost)) {
    // flag to check whether user like post or unlike
    $flag = $post->checkLikePost($row_allpost['PostID'],$user['UserID']);                       
    $likeCount = $post->getQuantityLikeByPost($row_allpost['PostID']);
?>
    <div class="post-newsfeed-side">
        <?php
            $user_get = $post->getUserByPost($row_allpost['UserID']);
            $row_user = mysqli_fetch_array($user_get);
        ?>
        <div id = "img-profile-tweet"><a style=" text-decoration: none" href="/twitter_clone_source/php/personalPage.php?UserID=<?php echo $row_user['UserID'] ?>"><img style="border-radius: 50%; height: 40px; width: 40px" src="/twitter_clone_source/images/<?php echo $row_user['image_profile']?>" alt="img-profile"></a></div>
            <div style="width: 100% ;" id="tweet-content">
                    <div style="font-weight: bold; font-size: 20px"  id ="header-tweet">
                        <span><a class="fullname" style="color: #000; text-decoration: none" href="/twitter_clone_source/php/personalPage.php?UserID=<?php echo $row_user['UserID'] ?>"><?php echo $row_user['FullName'] ?></a></span>
                        <span style="font-weight:500 ; font-size: 18px;color: grey ;font-family: Arial, Helvetica, sans-serif;  "><?php echo "@". $row_user['UserName'] ?></span>
                    </div>
                    
                    <div id ="content-tweet">
                        <div id="content-tweet-text">
                            <p style="width: 100%; line-height: 1.325">
                                <?php
                                    echo $row_allpost['PostContent'];
                                ?>   
                            </p>
                                </div>
                                <div id="content-tweet-img">
                                    <img style="width:100%; height: 400px; border-radius:6%; border:0.5px solid #bbb" srcset="/twitter_clone_source/images/<?php echo $row_allpost['image_post'] ?>" alt="">
                                </div>
                            </div>

                             <!-- Reaction tweet -->
                             
                            <div id="interact-tweet">
                                <div class="btn_like" style="display:grid; grid-template-columns: 50% 50% ; align-content:center;cursor:pointer">
                                    <img  data-id="<?php echo $row_allpost['PostID'] . '.' .$user['UserID'] ?>" src="<?php if($flag == true){echo("/twitter_clone_source/icon/liked-icon.png");} else{echo("/twitter_clone_source/icon/like-icon.png");}?>" alt="">
                                    <span id="likecount" style="margin-left:7px;">
                                        <?php echo $likeCount ?>
                                    </span>
                                </div>
                                <div class="comment-tweet" style="display:grid; grid-template-columns: 50% 50% ; align-content:center;cursor:pointer"><img class="btn_comment" src="/twitter_clone_source/icon/comment-icon.png" alt="">
                                    <span style="margin-left:7px;"><?php echo $post->checkNumberCommentByPost($row_allpost['PostID']) ?></span>
                                </div>
                                <div style="display:grid; grid-template-columns: 50% 50% ;  align-content:center;cursor:pointer"><img class="btn_share" src="/twitter_clone_source/icon/share-icon.png" alt=""><span style="margin-left:7px;">0</span></div>
                            </div>

                            <?php $post_id = $row_allpost['PostID'] ?>
                            <!-- Pop up reply to tweet-->
                            <div class = "pop-up-comment">
                                <div  class="" id="form-comment">
                                    <form action="/twitter_clone_source/controller/replyToTweet.php?idUser=<?php echo $user['UserID']?>&idPost=<?php echo $post_id ?>" method="POST"  style="height: auto" enctype="multipart/form-data">
                                        <div id="head-form-comment">
                                            <div style="cursor: pointer;justify-self: left; margin-left: 15px;" class = 'close-pop-up-comment'><img src="/twitter_clone_source/icon/x-mark-icon.png" alt=""></div>
                                                <div style=" margin-right: 10px; justify-self: right; width: 45px; border: 1px solid #1da1f2; border-radius:20px; padding: 5px"> 
                                                    <input style="cursor:pointer;outline:none; border:none; color:#1da1f2; font-weight: bold;background-color: #fff" id="pop-up-tweet-comment" name = "post-tweet-comment" type="submit" value="Reply">
                                                </div>
                                        </div>
                                        <div id="body-form-comment">
                                            <div style="justify-self: center; margin-top: 10px"><img style="border-radius: 50%; height: 30px; width: 30px" src="/twitter_clone_source/images/<?php echo $user['image_profile'] ?>" alt=""></div>
                                                <div id="wrap-txt-reply-to-tweet">
                                                    <textarea name = 'content-tweet-comment' id="txt-area-reply-to-tweet"  type="text" placeholder="Tweet your reply"></textarea>
                                                    <!-- Preview Image -->

                                                <div style="border-radius: 0px 0px 10px 10px ;width:528px ;height: auto; display: grid;  justify-content: center; align-content: center; background-color: #e6ecf0 ;" id = "image-holder-comment"></div>                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div> 
                    
                <?php
                    }
                ?> 