
<?php
    include "../dbConfig/dbConfig.php";  
    /**
     * Like tweeter
     */
    if(isset($_POST['status'])){
        $id_post = $_POST['id_post'];
        $id_user = $_POST['id_user'];
        if($_POST['status'] === "like"){
            mysqli_query($conn,"UPDATE post SET LikeCount = LikeCount + 1 WHERE PostID = '$id_post' ");
            mysqli_query($conn,"INSERT INTO heart(PostID,UserID) VALUES ('$id_post','$id_user')");
        }
        else if($_POST['status'] === "unlike"){
            mysqli_query($conn,"UPDATE post SET LikeCount = LikeCount - 1 WHERE PostID = '$id_post' ");
            mysqli_query($conn,"DELETE FROM heart WHERE PostID = '$id_post' AND UserID = '$id_user' ");    
        }
    }


?>