<?php
    include "../dbConfig/dbConfig.php";

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $targetDir = '../images/';
        $corver_photoPath = basename($_FILES['cover_photo']['name']); // update cover photo
        $targetcorver_photoPath = $targetDir . $corver_photoPath;  // path of file to uploads 
        $profile_photoPath = basename($_FILES['profile_photo']['name']); // update profile photo
        $targetprofile_photoPath = $targetDir . $profile_photoPath;  // path of file to uploads                       
    }
    if(isset($_POST['save'])){
        move_uploaded_file($_FILES['cover_photo']['tmp_name'],$targetcorver_photoPath);
        move_uploaded_file($_FILES['profile_photo']['tmp_name'],$targetprofile_photoPath);
        $fullname = $_POST['fullname_edit'];
        $bio = $_POST['bio_edit'];
        $location = $_POST['location_edit'];
        $userid = $_GET['User'];
        $sql = "UPDATE user SET image_profile = '$profile_photoPath', cover_photo = '$corver_photoPath', FullName = '$fullname', bio = '$bio', location = '$location' WHERE UserID = '$userid' ";
        $result = $conn->query($sql);
        if($result == true){
            header("Location:../php/personalPage.php?UserID= $userid ");
        }
    }

    function getFollowing($user_personal_page){
        $conn = new mysqli('localhost','root','','social_network');
        $sql = "SELECT * FROM follow WHERE UserID = '$user_personal_page' ";
        $result = $conn->query($sql);
        return $result->num_rows;
    }

    function getFollowers($user_personal_page){
        $conn = new mysqli('localhost','root','','social_network');
        $sql = "SELECT * FROM follow WHERE Follow_UserID = '$user_personal_page' ";
        $result = $conn->query($sql);
        return $result->num_rows;
    }
    function getNumberTweets($user_personal_page){
        $conn = new mysqli('localhost','root','','social_network');
        $sql = "SELECT * FROM post WHERE UserID = '$user_personal_page' ";
        $result = $conn->query($sql);
        return $result->num_rows;
    }

?>