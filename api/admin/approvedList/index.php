<?php
include '../../config/index.php';

$response = array();

if(isset($_GET['api_key'])){
    $api_key = $_GET['api_key'];
    $parish = $_GET['parish'];
    $check_api = "select uid from register where api_key='$api_key'";
    $result1 = mysqli_query($mysqli, $check_api);
    
         $convert = mysqli_fetch_assoc($result1);
        $final_result = implode("", $convert);
    
    if($final_result == $parish){
    
    $sql = "select * from padasal where parish='$parish' and status = 'approved' ORDER BY dateStamp ASC";
    $result2 = mysqli_query($mysqli, $sql);

    if($result2){
        header("Content-Type: JSON");
        $i=0;
    

        while($row = mysqli_fetch_assoc($result2)){
            
            
                
            $response[$i]['orderID'] = $row['id'];
            $response[$i]['userID'] = $row['uid'];
            $response[$i]['parish'] = $row['parish'];
            $response[$i]['receiptDate'] = $row['dateStamp'];
            $response[$i]['type'] = $row['type'];
            $response[$i]['recipient'] = $row['recipient'];
            $response[$i]['forwhom'] = $row['forwhom'];
            $response[$i]['date'] = $row['date'];
            $response[$i]['time'] = $row['time'];
            $response[$i]['comment'] = $row['comment'];
            $response[$i]['status'] = $row['status'];
            

      
            $i++;
                
            
            
        
            
        } if(mysqli_num_rows($result2) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
               echo json_encode(array('status' => 'empty')); 
            }
        }
    }else{
        echo json_encode(array('status' => 'invalid api_key')); 
    }
}else{
    echo json_encode(array('status' => 'missing api_key')); 
}
?>