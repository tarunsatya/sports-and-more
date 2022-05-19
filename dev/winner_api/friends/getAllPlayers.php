<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
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
		$jsonArray = [];
		$uid = [];
		$id = $decoded->user_id;
		$friends=mysqli_query($dbCon,"SELECT * FROM tbl_friends");
		
		$qry=mysqli_fetch_array($friends);
		$getfriends = mysqli_query($dbCon,"select * from tbl_friends a, tbl_users b where a.user_id='".$id."' and a.request_acceptance_status=1 and b.user_id=a.requestto_userid and b.user_group_id=2");
		while($fetching=mysqli_fetch_array($getfriends))
		{
			$uid[]=$fetching['user_id'];
			$uiid=implode(",",$uid);
		}
		$count=mysqli_num_rows($getfriends);
		if($count)
		{
			$getrecords1 = mysqli_query($dbCon,"SELECT DISTINCT * FROM tbl_users WHERE status='1' && user_group_id='2' && user_id != '".$id."' and user_id NOT IN(". implode(', ', $uid) .")");
			if($getrecords1){
			while($fetch1=mysqli_fetch_array($getrecords1)){
			$jsonArray[] = $fetch1;
			}
		}
	}
	else
	{
		$getrecords2 = mysqli_query($dbCon,"SELECT DISTINCT * FROM tbl_users WHERE status='1' && user_group_id='2' && user_id != '".$id."'");
		if($getrecords2){
			while($fetch=mysqli_fetch_array($getrecords2)){
			$jsonArray[] = $fetch;
			}
		}	
	}
}
}

else{
    $stat = ['isAuthorized'=> 'Un Authorized User'];
    
}

echo json_encode($jsonArray);
?>