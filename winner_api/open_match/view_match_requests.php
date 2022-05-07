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
        $getId = $decoded->user_id;
        $getProfilePic = mysqli_query($dbCon,"select * from tbl_open_match_requests a, tbl_users b where a.player_id=b.user_id && a.status=1 && a.invitation_acceptance=0");
        $data = [];
        while($fetchdata = mysqli_fetch_array($getProfilePic))
        {
           $data[] = $fetchdata;
        }
    
        echo json_encode($data);
    }
}
else
{
    $stat = ['isAuthorized'=> 'Un Authorized User'];
    echo json_encode($stat);
}
?>