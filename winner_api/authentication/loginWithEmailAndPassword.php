<?php
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
include "../connection/db.php";
include "../vendor/autoload.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$postdata = file_get_contents("php://input");
$jsondecode_data = json_decode($postdata);
$email =    $jsondecode_data->email;
$password = $jsondecode_data->password;


$selUser = mysqli_query($dbCon,"select * from tbl_users where user_email='".$email."' and password='".$password."' and status=1");
$count = mysqli_num_rows($selUser);
if($count == 1)
{
    $fetchUser = mysqli_fetch_array($selUser);
    $userId = $fetchUser['user_id'];
    $key = "Winner@123$#";
    $payload = array(
    "user_id" => $userId);
    $jwt = JWT::encode($payload, $key, 'HS256');

    $stat = ['success' => 'User Registered Successfully','JwtToken'=>$jwt];
}
echo json_encode($stat);
?>