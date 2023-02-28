<?php
include '../../config/index.php';

$response = array();

if(isset($_GET['api_key'])){
    $api_key = $_GET['api_key'];
    $check_api = "select uid from register where api_key='$api_key'";
    $result1 = mysqli_query($mysqli, $check_api);
    
         $convert = mysqli_fetch_assoc($result1);
        $final_result = implode("", $convert);
    
    if($result1){
    
    $sql = "select * from gallery where uid='$final_result' ORDER BY dateStamp ASC";
    $result2 = mysqli_query($mysqli, $sql);

    if($result2){
        header("Content-Type: JSON");
        $i=0;
    

        while($row = mysqli_fetch_assoc($result2)){
            
            
                
            $response[$i]['dateStamp'] = $row['dateStamp'];
            $response[$i]['uid'] = $row['uid'];
            $response[$i]['img_link'] = $row['img_link'];
        
      
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