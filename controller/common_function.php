<?php
    include "../dbConfig/dbConfig.php";  
    session_start();
    /**
     *  check login
     * 
     */
    //check session

    if(!$_SESSION['username']){
        header('Location:../php/login.php');
    }
    if(isset($_POST['btn_login'])){
        $user = $_POST['username'];
        $pass = $_POST['pass']; 
        $pass = md5($pass);
        $result = $conn->query("SELECT * FROM user WHERE UserName ='$user' AND Password ='$pass'");
        if($result->num_rows >0){
            $row_user = mysqli_fetch_array($result);
            $_SESSION['username'] = $user;
            $_SESSION['userid'] = $row_user["UserID"];
            header('Location:../php/index.php');
        }else{
            echo '<script>alert("login failed")</script>'; 
            header('Location:../php/login.php');  
        }
    }
    /**
    * post new tweet
    */
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $targetDir = '../images/';
        $filename = basename($_FILES['upload-img-post']['name']); // global
        $targetFileName = $targetDir . $filename;  // path of file to uploads
                            
    }
    if(isset($_POST['post-tweet'])&&($_POST['post-tweet']=="tweet" )){
        move_uploaded_file($_FILES['upload-img-post']['tmp_name'],$targetFileName);
        $content = $_POST['content-tweet'];
        $userID = $_GET['id'];
        if($content != '' || $filename !=''){
            $sql = "INSERT INTO post(UserID,PostContent,CreatedDate,LikeCount,CommentQuantity,image_post) VALUES('$userID','$content',NOW(),0,0,'$filename')";
            $result = $conn->query($sql);
            if($result == true){
                header("Location:../php/index.php");
            }else{
                echo "<script>alert('tweet failed')</script>";
            }
        }
            
    }



    /**
    * 
    * Log out 
    */
    if(isset($_POST['btn_logout'])){
        session_destroy();
        header("Location:../php/login.php");
    }


?>
