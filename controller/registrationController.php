<?php
    include "../dbConfig/dbConfig.php"; 

    //function to check input valid

    function checkConfirmPassword($password,$cpassword){
        $check  = true;
        if($password != $cpassword || strlen(strval($password)) < 6){
            $check = false;
        }
        return $check;
    }
    
    //Image upload path
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $targetDir = '../images/';

        $filename = basename($_FILES['image']['name']); // global

        $targetFileName = $targetDir . $filename;  // path of file to uploads
        $fileType = strtolower(pathinfo($targetFileName,PATHINFO_EXTENSION));
    }

    if(isset($_POST['signUp'])){

        // check whether account has already exists
        $sql = "SELECT * FROM user WHERE username = '".$_POST['username']."'";
        $user_exists =  $conn->query($sql);

        if(!checkConfirmPassword($_POST['password'],$_POST['confirm-password']) || $user_exists->num_rows > 0){
            echo "<script>alert('invalid input')</script>";
            header("../php/registration.php");
        }else{
            // upload image profile to path 
            move_uploaded_file($_FILES['image']['tmp_name'],$targetFileName);
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $fullname = $_POST['fullname'];
            $date = $_POST['date'];
            if($user!='' && $pass!=''){
                $pass = md5($pass);
                $sql = "INSERT INTO user(UserName,Password,FullName,Birthday,image_profile,CreatedDate) VALUES ('$user','$pass','$fullname','$date','$filename',NOW())";
                $result = $conn->query($sql);
                if($result){
                    echo "<script>alert('sign up successfully')</script>";
                    header("../php/registration.php");
                }else{
                    echo "<script>alert('sign up failed')</script>";
                }
            }
        }
    }
    if(isset($_GET['username'])){
        $username = $_GET['username'];
        $sql = "SELECT * FROM user WHERE UserName = '$username' ";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo "username has already exists";      
        }
    }
    
?>