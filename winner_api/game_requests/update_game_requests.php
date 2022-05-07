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
    $booking=mysqli_query($dbCon,"select * from court_booking where courtToken='".$courtToken."' and status=1");
    $fe=mysqli_fetch_array($booking);
    $pickaside=$fe['pickaside_count'];
    $qry=mysqli_query($dbCon,"select * from tbl_game_requests where court_token='".$courtToken."' and status=1");
    $count=mysqli_num_rows($qry);
    if($count<$pickaside)
    {
        $query = mysqli_query($dbCon, "update tbl_game_requests set invitation_acceptance='1' where court_token='".$courtToken."' and invited_player_id='".$getId."' and status='1'");

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
    echo json_encode($stat = ['failurestatus' => 'Game Players Filled']);  
}
}
    else
    {
        echo json_encode($stat = ['isAuthorized' => 'Un Authorized User!']);
    }
}
// echo json_encode($stat);
?>