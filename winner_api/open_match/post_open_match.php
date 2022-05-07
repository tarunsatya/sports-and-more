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
    $postdata = file_get_contents("php://input");
    $jsondecode_data = json_decode($postdata);
    $getId = $decoded->user_id;
    $game_id = mysqli_real_escape_string($dbCon,$jsondecode_data->game_id);
    $ground_id = mysqli_real_escape_string($dbCon,$jsondecode_data->ground_id);
    $court_id = mysqli_real_escape_string($dbCon,$jsondecode_data->court_id);
    $courtToken = mysqli_real_escape_string($dbCon,$jsondecode_data->courtToken);
    $match_organizer=mysqli_real_escape_string($dbCon,$jsondecode_data->match_organizer);
    $match_date=mysqli_real_escape_string($dbCon,$jsondecode_data->match_date);
    $qry=mysqli_query($dbCon,"select * from tbl_open_match where status=1 && court_token='".$courtToken."'");
    $count=mysqli_num_rows($qry);
    if($count>=1)
    {
        echo json_encode($stat = ['failurestatus' => 'Already Exist!']);
}
else
{
   
    $query = mysqli_query($dbCon, "insert into tbl_open_match set ground_id='".$ground_id."',game_id='".$game_id."',court_id='".$court_id."',match_organizer='".$match_organizer."',
             match_date='".$match_date."', court_token='".$courtToken."', status='1'");
        // $update=mysqli_query($dbCon,"update court_booking set subhost_id='".$subhost_accept."' where courtToken='".$courtToken."' and status=1");

    if($query == true)
     {
     echo json_encode($stat = ['successstatus' => 'Sucess!']);
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