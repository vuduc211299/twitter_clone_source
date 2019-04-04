<?php
    include "../dbConfig/dbConfig.php";


    class PostController
    {
        
        public function getAllPost(){
            $conn = new mysqli('localhost','root','','social_network');
            $sql = "SELECT * FROM post ORDER BY POSTID DESC";
            return mysqli_query($conn,$sql);
        }

        public function getUserByPost($UserID){
            $conn = new mysqli('localhost','root','','social_network');
            $sql = "SELECT * FROM user WHERE UserID = '$UserID' ";
            return mysqli_query($conn,$sql);
        }
        public function getQuantityLikeByPost($PostID){
            $conn = new mysqli('localhost','root','','social_network');
            $sql = "SELECT LikeCount FROM post WHERE PostID = '$PostID' ";
            $likeCount = mysqli_query($conn,$sql);
            $row_likeCount = mysqli_fetch_array($likeCount);
            return $row_likeCount['LikeCount'];
        }

        public function checkLikePost($PostID,$UserID){
            $conn = new mysqli('localhost','root','','social_network');
            $sql = "SELECT * FROM heart WHERE PostID = '$PostID' AND UserID = '$UserID' ";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);
            return $row['LikeID'];
        }
        public function checkNumberCommentByPost($PostID){
            $conn = new mysqli('localhost','root','','social_network');
            $sql = "SELECT CommentQuantity FROM post WHERE PostID = '$PostID' ";
            $quantityComment = mysqli_query($conn,$sql);
            $rowQuantityComment = mysqli_fetch_array($quantityComment);
            return $rowQuantityComment['CommentQuantity'];
        }
    }
    

?>