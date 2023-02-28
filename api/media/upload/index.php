<?php
include '../../config/index.php';


if(isset($_GET['api_key'])){
    $api_key = $_GET['api_key'];
    $check_api = "select uid from register where api_key='$api_key'";
    $result = mysqli_query($mysqli, $check_api);
    
    
    if(mysqli_num_rows($result)>0){
            $image = $_GET["image"];
            $name = $_GET["name"];
            
        
            $convert_1 = mysqli_fetch_assoc($result);
            $final_uid =  implode("",$convert_1);
            $dateStamp = date("m/d/Y");

            $final_name = 'cliurches_'.$name.''.uniqid();
            $upload_path = "../../media/gallery/$final_name.png";
            $ifp = fopen( $upload_path, 'wb' );
            fwrite($ifp,base64_decode($image));
                
            $sql = "INSERT gallery set img_link='https://cliurches-app.tech/api/media/gallery/$final_name.png',dateStamp='$dateStamp', uid='$final_uid'";
                
            mysqli_query($mysqli, $sql);
        
            echo json_encode(array('status' => 'success')); 
        }else{
            echo json_encode(array('status' => 'invalid api_key')); 
        }
        
    $mysqli->close();
        }else{
        echo json_encode(array('status' => 'missing api_key')); 
        
        }
    

?>