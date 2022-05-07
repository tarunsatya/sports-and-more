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
    $ground_id = mysqli_real_escape_string($dbCon,$jsondecode_data->ground_id);
    $game_id = mysqli_real_escape_string($dbCon,$jsondecode_data->game_id);
    $court_id = mysqli_real_escape_string($dbCon,$jsondecode_data->court_id);
    $select_date = mysqli_real_escape_string($dbCon,$jsondecode_data->select_date);
    $time_slot_start = mysqli_real_escape_string($dbCon,$jsondecode_data->time_slot_start);
    $time_slot_end = mysqli_real_escape_string($dbCon,$jsondecode_data->time_slot_end);
    $pickaside_count = mysqli_real_escape_string($dbCon,$jsondecode_data->pickaside_count);
    $courtToken = mysqli_real_escape_string($dbCon,$jsondecode_data->courtToken);
    
        $query = mysqli_query($dbCon, "insert into court_booking set user_id='".$decoded->user_id."', ground_id='".$ground_id."', game_id='".$game_id."',court_id='".$court_id."', select_date='".$select_date."', time_slot_start='".$time_slot_start."',time_slot_end='".$time_slot_end."',pickaside_count='".$pickaside_count."',courtToken='".$courtToken."', game_status='1', status='1'");

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