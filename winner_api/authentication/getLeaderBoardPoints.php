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
        $getLeaderBoardPoints = mysqli_query($dbCon,"select * from tbl_user_points where user_id='".$getId."'");
        $fetch_points = mysqli_fetch_array($getLeaderBoardPoints);
        $otp = $fetch_points['otp_points'];
        $survey = $fetch_points['survey_points'];
        $matchBooking = $fetch_points['match_booking_points'];
        $TotalPoints = $otp + $survey + $matchBooking;
        $stat = ['points'=> $TotalPoints,'isAuthorized'=>'Autorized'];
    }
}
else
{
    $stat = ['isAuthorized'=> $headers];   
}

 echo json_encode($stat); 

?>
