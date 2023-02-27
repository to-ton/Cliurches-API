<?php
date_default_timezone_set("Asia/Manila");
include '../config/index.php';
if(isset($_GET['api_key'])){
    $api_key = $_GET['api_key'];
    $check_api = "select * from register where api_key='$api_key'";
    $result = mysqli_query($mysqli, $check_api);
    
    
    if(mysqli_num_rows($result)>0){
        try {
            $title = $_GET['title'];
            $content = $_GET['content'];
            $category = $_GET['category'];
            $api_key = $_GET['api_key'];
            $dateStamp = date("m/d/Y");
            $timeStamp = date("h:i A");
            
            $getuser = "Select uid from register where api_key='$api_key'";
            $getname = "Select concat(firstname,' ',lastname) as name from register where api_key='$api_key'";
                $result1 = mysqli_query($mysqli, $getuser);
                $result2 = mysqli_query($mysqli, $getname);
                $convert_1 = mysqli_fetch_assoc($result1);
                $convert_2 = mysqli_fetch_assoc($result2);
            
                $final_result1 = implode("", $convert_1);
                $final_result2 = implode("", $convert_2);
            
                $query = "INSERT INTO user_timeline(timeStamp,dateStamp, userId, postHeader, postContent, postInteractions, category, name) VALUES ( '$timeStamp', '$dateStamp', '$final_result1', '$title', '$content', 0, '$category', '$final_result2')";
                
            
                
                $mysqli->query($query);
                $mysqli->close();
                
                echo json_encode(array('status' => 'success')); 
        } catch (TypeError $e) {
            echo json_encode(array('status' => 'error creating post'));
        } 
    }else{
        echo json_encode(array('status' => 'invalid api_key')); 
    }
}
?>