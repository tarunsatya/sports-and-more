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
        $getProfilePic = mysqli_query($dbCon,"select * from tbl_game_requests a, court_booking b, tbl_users c,tbl_game d,tbl_grounds e, tbl_court f where a.invited_player_id='".$getId."' && a.invitation_acceptance=0 && a.court_token=b.courtToken && a.match_organizer=c.user_id && b.game_id=d.id && b.ground_id=e.ground_id && b.court_id=f.court_id && a.status=1");
        $data = [];
        $fetchProfilePic = mysqli_fetch_array($getProfilePic);

        $data[] = $fetchProfilePic;
        echo json_encode($data);
    }
}
else{
    $stat = ['isAuthorized'=> 'Un Authorized User'];
    echo json_encode($stat);
}
?>