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
        
        $getcourtbook = mysqli_query($dbCon,"select * from court_booking a,tbl_game b, tbl_grounds c where a.game_id=b.id && a.ground_id=c.ground_id order by a.booking_id DESC");
        $data = [];
        while($fetchcourtbook = mysqli_fetch_array($getcourtbook))
        {
           $data[] = $fetchcourtbook; 
        }
        echo json_encode($data);
    }
}
else{
    $stat = ['isAuthorized'=> 'Un Authorized User'];
    echo json_encode($stat);
}
?>