<?php
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type,Authorization');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
include "../connection/db.php";
$postdata = file_get_contents("php://input");
$jsondecode_data = json_decode($postdata);
$newPass = $jsondecode_data->newPass;
$cnfNewPass = $jsondecode_data->newPasssConfirm;
$mobile = $jsondecode_data->mobile;
// $password = $jsondecode_data->password;
// $address = $jsondecode_data->address;

 
$insert_user = mysqli_query($dbCon,"update tbl_users set password='".$newPass."' where  user_group_id=2 && user_email='".$mobile."' && status=1");

if($insert_user)
{
    $stat = ['success' => 'Password Updated successfully'];  

}

else
{
       $stat = ['failed' => 'Failed To Update Password'];

}
    echo json_encode($stat);

?>