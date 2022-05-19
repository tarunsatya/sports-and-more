<?php
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type,Authorization');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
include "../connection/db.php";
include "../vendor/autoload.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$headers = apache_request_headers();
$postdata = file_get_contents("php://input");
$jsondecode_data = json_decode($postdata);
$Uname = $jsondecode_data->Uname;
$email = $jsondecode_data->email;
$mobile = $jsondecode_data->mobile;
// $password = $jsondecode_data->password;
$address = $jsondecode_data->address;

if(isset($headers['Authorization']))
{
    $token = str_replace('Bearer ','',$headers['Authorization']);
    $key = "Winner@123$#";
    $decoded = JWT::decode($token, new Key($key, 'HS256'));
    if($decoded)
    {
        $getId = $decoded->user_id;
$insert_user = mysqli_query($dbCon,"update tbl_users set user_group_id=2,
user_name='".$Uname."',user_email='".$email."',user_mobile='".$mobile."', address='".$address."', is_verified=1,is_loggedin=1,status=1 where user_id='".$getId."'");
$stat = ['success' => 'Profile Updated successfully'];  
echo json_encode($stat);

}
else
{
    $stat = ['failed' => 'User Failed to Register'];
    echo json_encode($stat);
}

}
else
{
    $stat = ['isAuthorized'=> 'Un Authorized User'];
    echo json_encode($stat);
}
?>