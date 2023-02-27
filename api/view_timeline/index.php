<?php
include '../config/index.php';

$response = array();

if(isset($_GET['api_key'])){
    $api_key = $_GET['api_key'];
    $check_api = "select uid from register where api_key='$api_key'";
    $result1 = mysqli_query($mysqli, $check_api);
    
    
    if(mysqli_num_rows($result1)>0){
    $sql = "select * from user_timeline ORDER BY dateStamp ASC";
    $result2 = mysqli_query($mysqli, $sql);

    if($result2){
        header("Content-Type: JSON");
        $i=0;
        
        $uid_1 = mysqli_fetch_assoc($result1);
        $uid_2 = implode("",$uid_1);

        while($row = mysqli_fetch_assoc($result2)){
            
            
                
            $response[$i]['postId'] = $row['postId'];
            $response[$i]['dateStamp'] = $row['dateStamp'];
            $response[$i]['timeStamp'] = $row['timeStamp'];
            $response[$i]['userId'] = $row['userId'];
            $response[$i]['fullname'] = $row['name'];
            $response[$i]['postTitle'] = $row['postHeader'];
            $response[$i]['postContent'] = $row['postContent'];
            $response[$i]['likes'] = $row['postInteractions'];
            $response[$i]['category'] = $row['category'];
            

            $postId = $row['postId'];
            $isLikeValid = "select * from userInteractions where postId='$postId' and likedBy='$uid_2'";
            $checkLike = mysqli_query($mysqli, $isLikeValid);
            
            
            if(mysqli_num_rows($checkLike)==0){
                $response[$i]['isLiked'] = "false";
            }else{
                $response[$i]['isLiked'] = "true";
            }
            $i++;
                
            
            
        
            
        } if(mysqli_num_rows($result2) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
               echo json_encode(array('status' => 'No available posts')); 
            }
        }
    }else{
        echo json_encode(array('status' => 'invalid api_key')); 
    }
}else{
    echo json_encode(array('status' => 'missing api_key')); 
}
?>