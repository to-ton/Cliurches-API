<?php
include '../config/index.php';


if(isset($_GET['api_key'])){
    $api_key = $_GET['api_key'];
    $check_api = "select uid from register where api_key='$api_key'";
    $result = mysqli_query($mysqli, $check_api);
    
    
    if(mysqli_num_rows($result)>0){
        $convert = mysqli_fetch_assoc($result);
        $uid =  implode("",$convert);
        $id = $_GET['id'];
        $api_key = $_GET['api_key'];
               
            $check = "select * from padasal where id='$id' and uid='$uid'";
            $checkDone = mysqli_query($mysqli, $check);
            
            
            if(mysqli_num_rows($checkDone)>0){
                   
                    
                    
                    
                    $delete = "delete from padasal where id='$id' and uid='$uid'";
                    $mysqli->query($delete);
                    
                    echo json_encode(array('status', 'success'));
                }else{
                    echo json_encode(array('status', 'invalid api_key'));
                }
        }else{
            echo json_encode(array('status' => 'invalid api_key')); 
        }
        
    $mysqli->close();
        }else{
        echo json_encode(array('status' => 'missing api_key')); 
        
        }
    

?>