<?php
include '../config/index.php';

if(isset($_GET['api_key'])){
    $api_key = $_GET['api_key'];
    $check_api = "select uid from register where api_key='$api_key'";
    $result = mysqli_query($mysqli, $check_api);
    
    
    if(mysqli_num_rows($result)>0){   
        $api_key = $_GET['api_key'];
        
        $randomness = rand(0,999999999);
        $random_string = uniqid().$randomness;
        
        $api_key_new = md5(uniqid());
        
        $reset = "update register set api_key='$api_key_new' where api_key='$api_key'";
        $mysqli->query($reset);
        echo json_encode(array('status' => 'success')); 
    }else{
         echo json_encode(array('status' => 'invalid api_key')); 
    }
 
    
}else{
    echo json_encode(array('status' => 'missing api_key')); 
}
?>