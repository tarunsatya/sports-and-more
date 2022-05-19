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
        
$insert_user = mysqli_query($dbCon,"update tbl_friends set request_acceptance_status=0 where requestby_userid='".$getId."' and requestto_userid='".$requestbyId."'");
if($insert_user)
{
    $stat = ['success' => 'Un Friend Successfully'];  
    echo json_encode($stat);
}
else
{
    $stat = ['failed' => 'Un Friend Failed'];
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