<?php
include '../../config/index.php';


if(isset($_GET['api_key'])){
    $api_key = $_GET['api_key'];
    $check_api = "select acc_type from register where api_key='$api_key'";
    $result = mysqli_query($mysqli, $check_api);
    
        $convert = mysqli_fetch_assoc($result);
        $final_result = implode("", $convert);
    if($final_result == "admin"){
        
        $id = $_GET['id'];
        

        
        $edit_user_details1 = "UPDATE padasal set status='declined' where id='$id'";
         mysqli_query($mysqli, $edit_user_details1);

        
        echo json_encode(array('status', 'success'));
        }else{
            echo json_encode(array('status' => 'invalid api_key')); 
        }
        
    $mysqli->close();
        }else{
        echo json_encode(array('status' => 'missing api_key')); 
        
        }
    

?>