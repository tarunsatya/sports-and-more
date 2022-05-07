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

        $requestbyId = $jsondecode_data->playerId;
        $getId = $decoded->user_id;
        
$insert_user = mysqli_query($dbCon,"update tbl_friends set request_acceptance_status=1 where requestby_userid='".$requestbyId."' and requestto_userid='".$getId."'");
if($insert_user==1)
{
    $insert_request = mysqli_query($dbCon,"INSERT INTO tbl_friends SET user_id='".$getId."',requestby_userid='".$getId."',requestto_userid='".$requestbyId."',request_acceptance_status='1',request_blockedby='0'");
    $stat = ['success' => 'Friend Accepted Successfully'];  
    echo json_encode($stat);
}
else
{
    $stat = ['failed' => 'Friend Accepted Failed'];
    echo json_encode($stat);
}

}
}
else
{
    $stat = ['isAuthorized'=> 'Un Authorized User'];
    echo json_encode($stat);
}
?>