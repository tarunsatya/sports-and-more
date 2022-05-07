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
        $timezone=date_default_timezone_set("Asia/Calcutta"); 
        $date2=date('Y-m-d');
        $getProfilePic = mysqli_query($dbCon,"select * from tbl_open_match a, court_booking b, tbl_users c,tbl_game d, tbl_grounds e, tbl_court f where a.court_token=b.courtToken && a.match_organizer=c.user_id && b.game_id=d.id && b.ground_id=e.ground_id && b.court_id=f.court_id && a.status=1 && a.match_date >= '".$date2."'");
        $data = [];
        while($fetchdata = mysqli_fetch_array($getProfilePic))
        {
            $date=$fetchdata['match_date'];
           $data[] = $fetchdata;
        }
    
        echo json_encode($data);
    }
}
else{
    $stat = ['isAuthorized'=> 'Un Authorized User'];
    echo json_encode($stat);
}
?>

