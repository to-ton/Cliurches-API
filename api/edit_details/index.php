<?php
include '../config/index.php';


if(isset($_GET['api_key'])){
    $api_key = $_GET['api_key'];
    $check_api = "select uid from register where api_key='$api_key'";
    $result = mysqli_query($mysqli, $check_api);
    
    
    if(mysqli_num_rows($result)>0){
        
        $firstname = $_GET['firstname'];
        $lastname = $_GET['lastname'];
        $email = $_GET['email'];
        $api_key = $_GET['api_key'];
        
         $uid_1 = mysqli_fetch_assoc($result);
         $uid_2 = implode("",$uid_1);
        
        $edit_user_details1 = "UPDATE register set firstname='$firstname', lastname='$lastname', email='$email' where api_key='$api_key'";
        $edit_user_details2 = "UPDATE user_timeline set name=concat('$firstname',' ','$lastname') where userId='$uid_2'";
         mysqli_query($mysqli, $edit_user_details1);
         mysqli_query($mysqli, $edit_user_details2);
        
        echo json_encode(array('status', 'success'));
        }else{
            echo json_encode(array('status' => 'invalid api_key')); 
        }
        
    $mysqli->close();
        }else{
        echo json_encode(array('status' => 'missing api_key')); 
        
        }
    

?>