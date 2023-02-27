<?php
include '../config/index.php';


if(isset($_GET['api_key'])){
    $api_key = $_GET['api_key'];
    $check_api = "select * from register where api_key='$api_key'";
    $result = mysqli_query($mysqli, $check_api);
    
    
    if(mysqli_num_rows($result)>0){
        //code here
        
        echo json_encode(array('status', 'success'));
        }else{
            echo json_encode(array('status' => 'invalid api_key')); 
        }
        
    $mysqli->close();
        }else{
        echo json_encode(array('status' => 'missing api_key')); 
        
        }
    

?>