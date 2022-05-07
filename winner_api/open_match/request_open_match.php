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
    $getId = $decoded->user_id;
    $player_id = mysqli_real_escape_string($dbCon,$jsondecode_data->player_id);
    $courtToken = mysqli_real_escape_string($dbCon,$jsondecode_data->courtToken);
    $match_organizer=mysqli_real_escape_string($dbCon,$jsondecode_data->matchOrganizer);
        $query = mysqli_query($dbCon, "insert into tbl_open_match_requests set organizer_id='".$match_organizer."', player_id='".$player_id."', invitation_acceptance='0',subhost_id='0', court_token='".$courtToken."', status='1'");
     

    if($query)
     {
     echo json_encode($stat = ['successstatus' => 'Sucess!']);
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