<?php
include '../config/index.php';

$response = array();

if(isset($_GET['api_key'])){
    $api_key = $_GET['api_key'];
    $check_api = "select * from register where api_key='$api_key'";
    $result = mysqli_query($mysqli, $check_api);
    
    
    if(mysqli_num_rows($result)>0){
            $category = $_GET['category'];
            $sql = "select * from user_timeline where category='$category'";
            $result = mysqli_query($mysqli, $sql);
        
            if($result){
                header("Content-Type: JSON");
                $i=0;
                while($row = mysqli_fetch_assoc($result)){
                    $response[$i]['postId'] = $row['postId'];
                    $response[$i]['timeStamp'] = $row['timeStamp'];
                    $response[$i]['userId'] = $row['userId'];
                    $response[$i]['postHeader'] = $row['postHeader'];
                    $response[$i]['postContent'] = $row['postContent'];
                    $response[$i]['likes'] = $row['postInteractions'];
                    $response[$i]['category'] = $row['category'];
                    $i++;
                } if(mysqli_num_rows($result) > 0){
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