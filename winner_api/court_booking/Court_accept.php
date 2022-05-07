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
    $accept_status = mysqli_real_escape_string($dbCon,$jsondecode_data->accept_status);
    $courtToken = mysqli_real_escape_string($dbCon,$jsondecode_data->courtToken);
    $getId = $decoded->user_id;

        $query = mysqli_query($dbCon,"update tbl_game_requests set game_request_status='".$accept_status."' where court_token='".$courtToken."'");

    if($query)
     {
     echo json_encode($stat = ['successstatus' => 'Success']);
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