<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
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
    $data = [];
    if($decoded)
    {
        $id = $decoded->user_id;
        // $getrecords = mysqli_query($dbCon,"select * from tbl_friends a, tbl_users b, tbl_user_pic c where a.user_id='".$id."' and a.request_acceptance_status=1 and b.user_id=a.requestto_userid and (c.user_id=requestto_userid || c.user_id=requestby_userid) and b.user_group_id=2");
        $getrecords = mysqli_query($dbCon,"select * from tbl_friends a, tbl_users b where a.user_id='".$id."' and a.request_acceptance_status=1 and b.user_id=a.requestto_userid and b.user_group_id=2");
        $count=mysqli_num_rows($getrecords);
        while($fet = mysqli_fetch_array($getrecords))
        {
        $data[] = $fet;
        
    }
    echo json_encode($data);

}

else{
    $stat = ['isAuthorized'=> 'Un Authorized User'];
    
}
}
?>