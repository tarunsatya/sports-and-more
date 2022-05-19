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
    $pickaside_count = mysqli_real_escape_string($dbCon,$jsondecode_data->pickaside_count);
    $host_color = mysqli_real_escape_string($dbCon,$jsondecode_data->host_color);
    $subhost_id = mysqli_real_escape_string($dbCon,$jsondecode_data->subhost_id);
    $courtToken = mysqli_real_escape_string($dbCon,$jsondecode_data->courtToken);
    $getId = $decoded->user_id;

        $query = mysqli_query($dbCon, "update court_booking set pickaside_count='".$pickaside_count."',host_color='".$host_color."',subhost_id='".$subhost_id."' where courtToken='".$courtToken."'");

    if($query)
     {
        $insert_user=mysqli_query($dbCon, "insert into tbl_game_requests set host_id='".$getId."', sub_host_id='".$subhost_id."', court_token='".$courtToken."', game_request_status=1");
        $count=mysqli_num_rows($insert_user);
     echo json_encode($stat = ['successstatus' => 'Success']);
    }
    else
    {
     echo json_encode($stat = ['failurestatus' => 'Failed!']);
    }
}
    else
    {
        echo json_encode($stat = ['isAuthorized' => 'Un Authorized User!']);
    }
}
// echo json_encode($stat);
?>