<?php
include '../config/index.php';

require_once '../PHPMailer/PHPMailer.php';
require_once '../PHPMailer/SMTP.php';
require_once '../PHPMailer/Exception.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$api_key = md5(uniqid());
$random_string = str_pad(mt_rand(1,99999999),8,'0',STR_PAD_LEFT);
    
if(isset($_GET['api_key'])){
    $api_key = $_GET['api_key'];
    $check_api = "select uid from register where api_key='$api_key'";
    $result = mysqli_query($mysqli, $check_api);
    
    
    if(mysqli_num_rows($result)>0){
        $recipient = $_GET['recipient'];
        $date = $_GET['date'];
        $time = $_GET['time'];
        $type = $_GET['type'];
        $comment = $_GET['comment'];
        $forwhom = $_GET['forwhom'];
        $parish = $_GET['parish'];
        
        $convert = mysqli_fetch_assoc($result);
        $final_result = implode("", $convert);
        
        
        $pamisaID = $random_string;
        $dateStamp = date("m/d/Y");
        
        $pamisa = "INSERT INTO padasal (id,uid,parish,dateStamp,recipient,date,time,type,comment,forwhom,status) VALUES ('$pamisaID','$final_result','$parish','$dateStamp','$recipient','$date','$time','$type','$comment','$forwhom','pending')";
        $check_email = mysqli_query($mysqli, $pamisa);
        
        
        echo json_encode(array('status' => 'success')); 
    }else{
        echo json_encode(array('status' => 'invalid api_key')); 
    }

}

?>