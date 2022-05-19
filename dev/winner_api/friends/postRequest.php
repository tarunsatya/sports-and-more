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
		
		$userid = $decoded->user_id;
		$requesttoId = $jsondecode_data->playerId;
		$getId = $decoded->user_id;

		$insert_request = mysqli_query($dbCon,"INSERT INTO tbl_friends SET user_id='".$userid."',requestby_userid='".$getId."',requestto_userid='".$requesttoId."',request_acceptance_status='0',request_blockedby='0'");

		$stat = ['success' => 'friend Request Inserted successfully'];  
		echo json_encode($stat);

    }

    else
    {
		$stat = ['failed' => 'friend Request Failed'];
		echo json_encode($stat);
    }

}

else
{
    $stat = ['isAuthorized'=> 'Un Authorized User'];
    echo json_encode($stat);
}

?>