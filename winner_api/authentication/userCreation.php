<?php
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type,Authorization');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
include "../connection/db.php";
include "../vendor/autoload.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
$postdata = file_get_contents("php://input");
$jsondecode_data = json_decode($postdata);
$fname = $jsondecode_data->fname;
$lname = $jsondecode_data->lname;
$email = $jsondecode_data->email;
$mobile = $jsondecode_data->mobile;
$password = $jsondecode_data->password;

// if($fname!="" && $lname!="" && $email!="" && $password!="")
// {

$insert_user = mysqli_query($dbCon,"insert into tbl_users set user_group_id=2,
user_name='".$fname.' '.$lname."',user_email='".$email."',password='".$password."',user_mobile='".$mobile."', address='0', is_verified=1,is_loggedin=1,status=1");

if($insert_user){

    $last_id = mysqli_insert_id($dbCon);
    $sel_leader_board_points = mysqli_query($dbCon,"select * from leadership_board");
    $fetch_otp_points = mysqli_fetch_array($sel_leader_board_points);
    $otp_points = $fetch_otp_points['for_otp'];

    $update_otp_points = mysqli_query($dbCon,"insert into tbl_user_points set otp_points='".$otp_points."',survey_points=0, match_booking_points=0, user_id='".$last_id."', status=1");

    // JWT Creation

    $key = "Winner@123$#";
    $payload = array(
    "user_id" => $last_id);
    $jwt = JWT::encode($payload, $key, 'HS256');

    $stat = ['success' => 'User Registered Successfully','leaderBoardMsg' => 'Congratulations You Have Won '.$otp_points.' Leader board Points','idToken'=>$last_id,'JwtToken'=>$jwt];
}
else
{
    $stat = ['failed' => 'User Failed to Register'];
}
// }
// else{
//     $stat = ['failed' => 'You must fill all the Data'];
// }
echo json_encode($stat);
?>


