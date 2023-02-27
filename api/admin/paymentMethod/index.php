<?php
include '../../config/index.php';



$api_key = md5(uniqid());
$random_string = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);
    
if(isset($_GET['api_key'])){
    $api_key = $_GET['api_key'];
    $check_api = "select uid from register where api_key='$api_key'";
    $result = mysqli_query($mysqli, $check_api);
    
    
    if(mysqli_num_rows($result)>0){
        $bank = $_GET['bank'];
        $accountNum = $_GET['accountNum'];
        $accountName= $_GET['accountName'];
        $donationPayment= $_GET['donationPayment'];
        
        $convert = mysqli_fetch_assoc($result);
        $final_result = implode("", $convert);

        
        $pamisaID = $random_string;
        $dateStamp = date("m/d/Y");
        
        $paymentMethod = "INSERT INTO paymentMethod (parish,donation,method,account_number,account_name) VALUES ('$final_result','$donationPayment','$bank','$accountNum','$accountName')";
        $check_email = mysqli_query($mysqli, $paymentMethod);
        
        
        echo json_encode(array('status' => 'success')); 
    }else{
        echo json_encode(array('status' => 'invalid api_key')); 
    }

}

?>