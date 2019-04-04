<?php
    include "../dbConfig/dbConfig.php";  
    if(isset($_GET['keyword'])){
        $keyword = $_GET['keyword'];
        $sql = "SELECT UserName,FullName,image_profile FROM user WHERE locate('$keyword',FullName) > 0 OR locate('$keyword',UserName) > 0";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = mysqli_fetch_array($result)){
                $profile = $row['image_profile'];
                $username = $row["UserName"];
                $fullname = $row["FullName"];
                echo "
                <a href='#' style='text-decoration: none'>
                <div style='padding : 15px 5px;
                    display: grid;
                    grid-template-columns: 8% 60% 18%;
                    grid-column-gap: 5%;
                    align-content: center;
                    border-bottom: 1px solid #e6ecf0;' id='right-side-profile'>
                    <img style='border-radius: 50%; height: 40px; width: 40px' src='../images/$profile' alt=''>
                    <div>
                        <span style='font-weight: bolder'>$fullname</span><br>
                        <span style='color: grey'>@$username</span>
                    </div>
                </div>
                </a>
                ";
            }
        }else{
            echo "No results for @" . $keyword;
        }
    }

?>