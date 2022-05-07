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
        
        $login_id = $decoded->login_id;
        $request_id = $decoded->req_id;
        $acceptance_flag = $decoded->flag;
        $postRequest = mysqli_query($dbCon,"INSERT INTO tbl_request SET login_id='".$login_id."',requests_id='".$request_id."',acceptance_flag='".$acceptance_flag."',status='1'");
       $jsonArray = [];
		if($postRequest){ 
			echo json_encode(array("success"=>"Request is sent successfully"));
		}else{
			echo json_encode(array("failed"=>"Request sending is failed"));
		}
    }
}
else{
    $stat = ['isAuthorized'=> 'Un Authorized User'];
    echo json_encode($stat);
}
?>