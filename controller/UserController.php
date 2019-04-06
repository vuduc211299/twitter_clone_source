<?php
    include "../dbConfig/dbConfig.php";

    class UserController{
        private $UserID;
        private $UserName;
        private $image_profile;
        private $FullName;
        public function getCurrentUser($session){
            $conn = new mysqli('localhost','root','','social_network');
            $sql = "SELECT * FROM user WHERE UserName = '".$session."'";
            return mysqli_query($conn,$sql);
        }
        public function getUser($UserID){
            $conn = new mysqli('localhost','root','','social_network');
            $sql = "SELECT * FROM user WHERE UserID = '$UserID' ";
            $result = $conn->query($sql);
            return $result;
        }
        public function getUserName(){
            return $UserName;
        }
        public function getUserID(){
            return $UserID;
        }
    }
?>