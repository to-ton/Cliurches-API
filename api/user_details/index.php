<?php
include '../config/index.php';

$response = array();

if(isset($_GET['api_key'])){
    $api_key = $_GET['api_key'];
    $sql = "select * from register where api_key='$api_key'";
    $result = mysqli_query($mysqli, $sql);

    if(mysqli_num_rows($result)>0){
        header("Content-Type: JSON");
        $i=0;
        while($row = mysqli_fetch_assoc($result)){
            $response[$i]['userID'] = $row['uid'];
            $response[$i]['FirstName'] = $row['firstname'];
            $response[$i]['LastName'] = $row['lastname'];
            $response[$i]['email'] = $row['email'];
            $response[$i]['account_type'] = $row['acc_type'];
            $response[$i]['isverify'] = $row['isverify'];
            $response[$i]['password'] = "******";
            $i++;
        } if(mysqli_num_rows($result) > 0){
            echo json_encode($response, JSON_PRETTY_PRINT);
        }else{
               echo json_encode(array('status' => 'user does not exist')); 
        }
    }else{
        echo json_encode(array('status' => 'invalid api_key')); 
    }
}else{
    echo json_encode(array('status' => 'missing api_key')); 
}
?>