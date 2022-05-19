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
        $qry_match=mysqli_query($dbCon,"SELECT * FROM tbl_user_pic where user_id='".$id."'");
        
            $getrecords = mysqli_query($dbCon,"select * from tbl_friends a, tbl_users b where (a.requestby_userid='".$id."' || a.requestto_userid ='".$id."') and b.user_id=a.requestto_userid and a.request_acceptance_status=0");
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