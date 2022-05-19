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
        $getSurvey = mysqli_query($dbCon,"select * from tbl_time_slot where status=1");
        $data = [];
        while($fetchSurvey = mysqli_fetch_array($getSurvey))
        {
            // $string=explode(',',$fetchSurvey['hour_slot']);
            // $string2=explode(',',$fetchSurvey['half_an_hour']);
            
           $data[] = $fetchSurvey; 
        //    $data2[]=$string;
        //    $data3[]=$string2;
        }
        echo json_encode($data);
        // echo json_encode($data2);
        // echo json_encode($data3);
    }
}
else{
    $stat = ['isAuthorized'=> 'Un Authorized User'];
    echo json_encode($stat);
}
?>