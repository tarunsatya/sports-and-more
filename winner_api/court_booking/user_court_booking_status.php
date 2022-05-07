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
        $data = [];
        $ground = [];
        $game = [];
        $court = [];
        $lastidquery=mysqli_query($dbCon,"SELECT booking_id FROM court_booking ORDER BY booking_id DESC LIMIT 1");
        $lastid=mysqli_fetch_array($lastidquery);
        $id=$lastid['booking_id'];
        $query = mysqli_query($dbCon, "select * from court_booking where user_id='".$getId."' and booking_id='".$id."'");
        $fetchSurvey = mysqli_fetch_array($query);
        $query2=mysqli_query($dbCon, "select * from tbl_grounds where id ='".$fetchSurvey['ground_id']."'");
        $query3=mysqli_query($dbCon, "select * from tbl_game where g_ground ='".$fetchSurvey['ground_id']."' and id='".$fetchSurvey['game_id']."'");
        $query4=mysqli_query($dbCon, "select * from tbl_court where ground_id ='".$fetchSurvey['ground_id']."' and game_id='".$fetchSurvey['game_id']."' and court_id='".$fetchSurvey['court_id']."'");
        $fetchSurvey2 = mysqli_fetch_array($query2);
        $fetchSurvey3 = mysqli_fetch_array($query3);
        $fetchSurvey4 = mysqli_fetch_array($query4);
           $data[] = $fetchSurvey; 
           $ground[] = $fetchSurvey2;
           $game[] = $fetchSurvey3;
           $court[] = $fetchSurvey4;
        echo json_encode($data);
        echo json_encode($ground);
        echo json_encode($game);
        echo json_encode($court);
       
    
}
    else
    {
        echo json_encode($stat = ['isAuthorized' => 'Un Authorized User!']);
    }
}
// echo json_encode($stat);
?>