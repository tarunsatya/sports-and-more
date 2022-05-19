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

$mobileNum = $jsondecode_data->mobileNumber;
$clientRef=$jsondecode_data->clientRef;

$otp = $jsondecode_data->otp1.$jsondecode_data->otp2.$jsondecode_data->otp3.$jsondecode_data->otp4.$jsondecode_data->otp5.$jsondecode_data->otp6;

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://rest.fortytwo.com/1/2fa/{$clientRef}/{$otp}",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "",
  CURLOPT_HTTPHEADER => array(
    "authorization: Token 0b37a80e-2a5c-47a9-80f3-97908f0d7521",
    "cache-control: no-cache",
    "content-type: application/json"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
    $stat = ['fail' => $err];
} else {
  $sel_user = mysqli_query($dbCon,"select * from tbl_users where user_mobile='".$mobileNum."'");
  if(mysqli_num_rows($sel_user) >= 1)
  {
    $fetchUser = mysqli_fetch_array($sel_user);
    $userId = $fetchUser['user_id'];
    $stat =   ['success' => $response,'mobile'=>$mobileNum,'userExists'=>'yes'];
  }
  else{
    $stat = ['success' => $response,'mobile'=>$mobileNum,'userExists'=>'no'];
  }
      
}
echo json_encode($stat);
?>