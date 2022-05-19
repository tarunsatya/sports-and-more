<?php
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type,Authorization');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
$conn = mysqli_connect('localhost','u923672343_winner','Winner@123','u923672343_winner');
// include "../vendor/autoload.php";
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
        
        $selected_survey = $decoded->selectedsurvey;
        $option_a = $decoded->optiona;
        $option_b = $decoded->optionb;
        $option_c = $decoded->optionc;
        $option_d = $decoded->optiond;

        $postsurvey = mysqli_query($conn,"INSERT INTO tbl_surveyform SET selected_survey='".$selected_survey."',option_a='".$option_a."',option_b='".$option_b."',option_c='".$option_c."',option_d='".$option_d."',status='1'");
       $jsonArray = [];
		if($postsurvey){ 
			echo json_encode(array("success"=>"Request is sent successfully"));
		}else{
			echo json_encode(array("failed"=>"Request sending is failed"));
		}
    }
}
else{
    $stat = ['isAuthorized'=> 'Un Authorized User'];
    echo json_encode($stat);
}
?>