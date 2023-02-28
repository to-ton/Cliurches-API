<?php
include '../config/index.php';


if(isset($_GET['email'])){
$email = $_GET['email'];
$password = md5($_GET['password']);


$sql1 = "select api_key from register where email='$email' and password='$password'";
$sql2 = "select isverify from register where email='$email' and password='$password'";
$sql3 = "select acc_type from register where email='$email' and password='$password'";
$result1 = mysqli_query($mysqli, $sql1);
$result2 = mysqli_query($mysqli, $sql2);
$result3 = mysqli_query($mysqli, $sql3);
$convert_1 = mysqli_fetch_assoc($result1);
$convert_2 = mysqli_fetch_assoc($result2);
$convert_3 = mysqli_fetch_assoc($result3);

if(is_array($convert_1) || is_array($convert_2)){
    $final_result1 =  implode("",$convert_1);

    $final_result2 =  implode("",$convert_2);
    $final_result3 =  implode("",$convert_3);


if($final_result2 == "true"){

    echo json_encode(array('status' => 'user logged in', 'api_key'=>$final_result1,'acc_type'=>$final_result3)); 
    
    }else if($final_result2 == "false"){
        echo json_encode(array('status' => 'not verified')); 
    }else{
        echo json_encode(array('status' => 'wrong credentials')); 
    }
}else{
    echo json_encode(array('status' => 'wrong credentials')); 
}

    


}else{
        echo json_encode(array('status' => 'No supplied query.')); 
}

?>