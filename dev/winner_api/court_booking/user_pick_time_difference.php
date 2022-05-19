<?php
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type,Authorization');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
include "../connection/db.php";
$postdata = file_get_contents("php://input");
    $jsondecode_data = json_decode($postdata);
    // $time1 = mysqli_real_escape_string($dbCon,$jsondecode_data->time1);
    $time1 = $_GET['time1'];
    $time2 = $_GET['time2'];
$timefrom=new DateTime($time1);
$timeto=new DateTime($time2);
$interval = $timefrom->diff($timeto);
$val=($interval->format("%a") * 24) + $interval->format("%h");

echo json_encode($stat = ['successstatus' => $val]);
// .':'. $interval->format("%i")
?>