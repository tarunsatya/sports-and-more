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
        $id = $decoded->user_id;
        
            $getrecords = mysqli_query($dbCon,"select * from tbl_game_requests a, tbl_users b where a.host_id=b.user_id");
            $jsonArray = [];
            if($getrecords){
                while($fetch=mysqli_fetch_array($getrecords)){
                        $jsonArray[] = $fetch;
                }
                echo json_encode($jsonArray);
            

        }
       
}
}
else{
    $stat = ['isAuthorized'=> 'Un Authorized User'];
    echo json_encode($stat);
}
?>