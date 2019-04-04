<?php

    include "../dbConfig/dbConfig.php";  
    /**
    * reply to tweet
    */
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $targetDir = '../images/';
        $filename = basename($_FILES['upload-img-comment']['name']); // global
        $targetFileName = $targetDir . $filename;  // path of file to uploads
                            
    }
    if(isset($_POST['post-tweet-comment'])){
        move_uploaded_file($_FILES['upload-img-comment']['tmp_name'],$targetFileName);
        $content = $_POST['content-tweet-comment'];
        $image_content = $_POST['upload-img-comment'];
        $userID = $_GET['idUser'];
        $postID = $_GET['idPost'];
        if($content != '' || $image_content!=null){
            $sql = "INSERT INTO comment(UserID,PostID,LikeCount,CommentContent,ImageComment) VALUES('$userID','$postID',0,'$content','$filename')";
            // Update CommmetCount by Post
            $sql1_update_comment_count = "UPDATE post SET CommentQuantity = CommentQuantity + 1 WHERE PostID = '$postID'";
            $result = $conn->query($sql);
            $result1 = $conn->query($sql1_update_comment_count);
            if($result == true&&$result1==true){
                header("Location:../php/index.php");
            }else{
                echo "<script>alert('comment failed')</script>";
            }
        }
            
    }
?>