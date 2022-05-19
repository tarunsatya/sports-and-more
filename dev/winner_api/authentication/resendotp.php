<?php
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
include "../connection/db.php";
$postdata = file_get_contents("php://input");
$jsondecode_data = json_decode($postdata);
$mob = $jsondecode_data->mobileotp;
$clientRef = 'client_ref'.rand(0,100000000);


$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://rest.fortytwo.com/1/2fa",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\n  \"client_ref\" : \"$clientRef\",\n  \"phone_number\": \"$mob\",\n  \"code_length\": 6,\n  \"code_type\": \"numeric\",\n  \"case_sensitive\": true,\n  \"callback_url\": \"http://example.com/callback\",\n  \"sender_id\" : \"FortyTwo2FA\"\n}\n",
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
  $stat = ['success' => $response,'clientRef'=>$clientRef, 'mobile'=>$mob];
}
echo json_encode($stat);
?>