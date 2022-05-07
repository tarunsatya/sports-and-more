<?php
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type,Authorization');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
include "../connection/db.php";
include "../vendor/autoload.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$headers = apache_request_headers();
if(isset($headers['Authorization']))
{
    $token = str_replace('Bearer ','',$headers['Authorization']);
    $key = "Winner@123$#";
    $decoded = JWT::decode($token, new Key($key, 'HS256'));
    if($decoded)
    {
    $postdata = file_get_contents("php://input");
    $jsondecode_data = json_decode($postdata);
    
    $select1=mysqli_query($dbCon,"select * from tbl_survey2 where user_id='".$decoded->user_id."' and status='1'");
    $f_query1=mysqli_fetch_array($select1);
    $ans=$f_query1['Actual_Ans']; 
    $question_value='0.625';
    $rating=$ans*$question_value;
    if($select1)
     {
     echo json_encode($stat = ['successstatus' => $rating]);
    }
    else
    {
     echo json_encode($stat = ['failurestatus' => 'Failed!']);
    }
}
    else
    {
        echo json_encode($stat = ['isAuthorized' => 'Un Authorized User!']);
    }
}
// echo json_encode($stat);
?>