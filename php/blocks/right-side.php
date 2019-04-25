
 
    <div class="right-side">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <div id= "who-to-follow">
            <div id = "head-who-to-follow" style="font-size :22px ; border-bottom: 1px solid #e6ecf0; padding: 10px 10px 5px 5px; font-weight: bolder; font-family: 'PT Sans', sans-serif;">
                Who to follow
            </div>
            <!-- Right-side-profile -->
            <?php
                $follow = new followController;
                $all = $follow->suggestPeople($user['UserID'],"index");
                while(($row_array = mysqli_fetch_array($all))){
            ?>
                <div id="right-side-profile">
                    <a style="color: #000;font-weight: bolder;text-decoration: none" href="/twitter_clone_source/php/personalPage.php?UserID=<?php echo $row_array['UserID'] ?>">
                        <img style="border-radius: 50%; height: 40px; width: 40px" src="/twitter_clone_source/images/<?php echo $row_array['image_profile'] ?>" alt="">
                    </a>
                    <div>
                        <span style="">
                            <a style="color: #000;font-weight: bolder;text-decoration: none" href="/twitter_clone_source/php/personalPage.php?UserID=<?php echo $row_array['UserID'] ?>">
                                <?php echo $row_array['FullName'] ?>
                            </a>
                        </span> 
                            <br>
                        <span>
                            <a style="text-decoration: none; color: grey" href="/twitter_clone_source/php/personalPage.php?UserID=<?php echo $row_array['UserID'] ?>">
                                @<?php echo $row_array['UserName'] ?>
                            </a>    
                        </span>
                    </div>
                    <div class="btn_follow follow" data-id= "<?php echo $row_array['UserID'] . '.' .$user['UserID'] ?>">
                        Follow
                    </div>
                </div>
            
            <?php
                }
            ?>
        </div>
    </div>
