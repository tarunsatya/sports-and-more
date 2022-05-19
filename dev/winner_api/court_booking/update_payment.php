<?php
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin,Content-Type,Authorization');
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
    $postdata = file_get_contents("php://input");
    $jsondecode_data = json_decode($postdata);
    $payment = mysqli_real_escape_string($dbCon,$jsondecode_data->payment);
    $courtToken = mysqli_real_escape_string($dbCon,$jsondecode_data->courtToken);
    $getId = $decoded->user_id;
    $courtdata=mysqli_query($dbCon,"select * FROM court_booking where courtToken='".$courtToken."'");
    $fetch=mysqli_fetch_array($courtdata);
    $court_price=$fetch['court_price'];
    $p=$fetch['payment'];
    $pay=$payment + $p;
    if($pay != $court_price)
    {
       
        $query = mysqli_query($dbCon, "update court_booking set payment='".$pay."' where courtToken='".$courtToken."'");

    if($query)
     {
        $tbl_user_points=mysqli_query($dbCon,"select * from tbl_user_points where user_id='".$decoded->user_id."' and status=1");
        $qry=mysqli_fetch_array($tbl_user_points);
        $sel_leader_board_points = mysqli_query($dbCon,"select * from leadership_board");
    $fetch_otp_points = mysqli_fetch_array($sel_leader_board_points);
    $otp_points = $fetch_otp_points['for_firsttime_booking'] + $qry['match_booking_points'];

    $update_otp_points = mysqli_query($dbCon,"update tbl_user_points set 
    match_booking_points='".$otp_points."' where user_id='".$decoded->user_id."'");
     echo json_encode($stat = ['successstatus' => 'Success']);
    }
    else
    {
     echo json_encode($stat = ['failurestatus' => 'Failed!']);
    }
}
elseif($pay == $court_price)
{
    $query2 = mysqli_query($dbCon, "update court_booking set payment='".$pay."', status='2' where courtToken='".$courtToken."'");
    
    if($query2)
    {
        $tbl_user_points=mysqli_query($dbCon,"select * from tbl_user_points where user_id='".$decoded->user_id."' and status=1");
        $qry=mysqli_fetch_array($tbl_user_points);
        $sel_leader_board_points = mysqli_query($dbCon,"select * from leadership_board");
    $fetch_otp_points = mysqli_fetch_array($sel_leader_board_points);
    $otp_points = $fetch_otp_points['for_firsttime_booking'] + $qry['match_booking_points'];

    $update_otp_points = mysqli_query($dbCon,"update tbl_user_points set 
    match_booking_points='".$otp_points."' where user_id='".$decoded->user_id."'");

    echo json_encode($stat = ['successstatus' => $payment]);
   }
   else
   {
    echo json_encode($stat = ['failurestatus' => 'Failed!']);
   }
}
else
{
    $query2 = mysqli_query($dbCon, "update court_booking set payment='".$payment."', status='2' where courtToken='".$courtToken."'");
    
        if($query2)
        {
            $tbl_user_points=mysqli_query($dbCon,"select * from tbl_user_points where user_id='".$decoded->user_id."' and status=1");
            $qry=mysqli_fetch_array($tbl_user_points);
            $sel_leader_board_points = mysqli_query($dbCon,"select * from leadership_board");
        $fetch_otp_points = mysqli_fetch_array($sel_leader_board_points);
        $otp_points = $fetch_otp_points['for_firsttime_booking'] + $qry['match_booking_points'];
    
        $update_otp_points = mysqli_query($dbCon,"update tbl_user_points set 
        match_booking_points='".$otp_points."' where user_id='".$decoded->user_id."'");

        echo json_encode($stat = ['successstatus' => $payment]);
       }
       else
       {
        echo json_encode($stat = ['failurestatus' => 'Failed!']);
       }
}
}
    else
    {
        echo json_encode($stat = ['isAuthorized' => 'Un Authorized User!']);
    }
}
// echo json_encode($stat);
?>