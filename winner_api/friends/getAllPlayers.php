<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
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
    $jsonArray = [];
    if($decoded)
    {
		$id = $decoded->user_id;
		$getrecords = mysqli_query($dbCon,"select * from tbl_users where status=1 and user_group_id=2 and user_id !='".$id."'");
    
		if($getrecords){
			while($fetch=mysqli_fetch_array($getrecords)){
					$jsonArray[] = $fetch;
			}
		}
}

else{
    $stat = ['isAuthorized'=> 'Un Authorized User'];
    
}
}
echo json_encode($jsonArray);
?>