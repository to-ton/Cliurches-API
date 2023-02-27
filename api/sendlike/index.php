<?php
include '../config/index.php';

if(isset($_GET['api_key'])){
    $api_key = $_GET['api_key'];
    $check_api = "select uid from register where api_key='$api_key'";
    $result = mysqli_query($mysqli, $check_api);
    
     try {
            $convert = mysqli_fetch_assoc($result);
            $user_id = implode("",$convert);
        } catch (TypeError $e) {
            $user_id = ""; // or set to a default value
            // or display an error message to the user
        }
    
    
    if(mysqli_num_rows($result)>0){
        
        $postId = $_GET['postid'];
        
        $isLikeValid = "select * from userInteractions where postId='$postId' and likedBy='$user_id'";
        $checkLike = mysqli_query($mysqli, $isLikeValid);
        
        
        if(mysqli_num_rows($checkLike)==0){
        
            $sql1 = "UPDATE user_timeline SET postInteractions=postInteractions+1 where postId='$postId'";
            $sql2 = "INSERT INTO userInteractions(postId,likedBy) VALUES ('$postId','$user_id')";
            
            mysqli_query($mysqli, $sql1);
            mysqli_query($mysqli, $sql2);
    
            echo json_encode(array('status' => 'success')); 
            
        }else{
            echo json_encode(array('status' => 'already liked')); 
        }
    }else{
        echo json_encode(array('status' => 'invalid api_key')); 
    }
        
}else{
    echo json_encode(array('status' => 'missing api_key')); 
}
?>