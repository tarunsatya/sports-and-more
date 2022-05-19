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
    $player_id = mysqli_real_escape_string($dbCon,$jsondecode_data->player_id);
    $group_id = mysqli_real_escape_string($dbCon,$jsondecode_data->group_id);
    $courtToken = mysqli_real_escape_string($dbCon,$jsondecode_data->courtToken);
    $court=mysqli_query($dbCon,"select * from team_split where courtToken='".$courtToken."' && player_id='".$player_id."'");
    $count=mysqli_num_rows($court);
    if($count >= 1)
    {
        $stat = ['successstatus' => 'User Already Exist'];
    }
    else{
        $query = mysqli_query($dbCon, "insert into team_split set organizer_id='".$decoded->user_id."', group_id='".$group_id."', player_id='".$player_id."',courtToken='".$courtToken."', status='1'");

    if($query)
     {
     $stat = ['successstatus' => 'Sucess!'];
    }
    else
    {
     $stat = ['failurestatus' => 'Failed!'];
    }
}
}
    else
    {
        $stat = ['isAuthorized' => 'Un Authorized User!'];
    }
}
echo json_encode($stat);
?>