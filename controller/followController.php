<?php
    include "../dbConfig/dbConfig.php";

    class followController{
        // check followers
        function checkFollow($UserID,$Follow_UserID){
            $conn = new mysqli('localhost','root','','social_network');
            $sql = "SELECT * FROM follow where UserID = '$UserID' AND Follow_UserID = '$Follow_UserID' ";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                return true;
            }
            return false;
        }

        /**
         * UserID_session : current user logging
         * scope : show on index page or another pages 
         */
        function suggestPeople($UserID_session,$scope){ 
            $conn = new mysqli('localhost','root','','social_network');
            if($scope === 'index'){
                $sql = "SELECT * from user where UserID not in (SELECT Follow_UserID from follow WHERE UserID = '$UserID_session' ) and not UserID = '$UserID_session' limit 0,3";
            }else {
                $sql = "SELECT * from user where UserID not in (SELECT Follow_UserID from follow WHERE UserID = '$UserID_session' and not UserID = '$UserID_session' ) ";
            }

            $result = $conn->query($sql);
            return $result;
        }
    }

    // btn_follow clicked

    if(isset($_GET['id_follow_user'])){
        $id_follow_user = $_GET['id_follow_user'];
        $id_user = $_GET['id_user'];
        //check follow or unfollow
        $sql = "SELECT * FROM follow WHERE UserID = '$id_user' and Follow_UserID = ' $id_follow_user' ";
        $check = $conn->query($sql);
        if($check->num_rows > 0){
            $query = "DELETE FROM follow WHERE UserID = '$id_user' and Follow_UserID = ' $id_follow_user' ";
            $conn->query($query);
            echo "follow";
        }
        else{
            $query = "INSERT INTO follow(Follow_UserID,UserID) value('$id_follow_user','$id_user')";
            $conn->query($query);
            echo "following";
        }
    }


?>