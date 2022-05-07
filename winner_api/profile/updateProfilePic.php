<?php
error_reporting(-1);
ini_set('display_errors', true);
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type,Authorization');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
include "../connection/db.php";
include "../vendor/autoload.php";
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

$headers = apache_request_headers();
if(isset($headers['Authorization']))
{
    $token = str_replace('Bearer ','',$headers['Authorization']);
    $key = "Winner@123$#";
    $decoded = JWT::decode($token, new Key($key, 'HS256'));
    if($decoded)
    {
        $getId = $decoded->user_id;
        $postdata = file_get_contents("php://input");
        $jsondecode_data = json_decode($postdata);
        $img = $jsondecode_data->fileName;



        Configuration::instance([
            'cloud' => [
              'cloud_name' => 'winnermedia', 
              'api_key' => '462813286432941', 
              'api_secret' => '87VaQukuQrB2wnlCPh80y0oTq-Y'],
            'url' => [
              'secure' => true]]);
              $upload = (new UploadApi())->upload($img);
              $surl = $upload['secure_url'];
              $public_id = $upload['public_id'];
              
              $selProPic = mysqli_query($dbCon,"select * from tbl_user_pic where user_id='".$getId."'");
              $c = mysqli_num_rows($selProPic);
              if($c >= 1)
              {
                  $updateProPic = mysqli_query($dbCon,"update tbl_user_pic set img_secure_url='".$surl."',img_public_id='".$public_id."' where user_id='".$getId."'");
                  if($updateProPic)
                  {
                      $stat = ['msg'=>'Profile Image Updated Successfully'];
                  }
                  else
                  {
                      $stat = ['msg'=>'Failed to upload'];
                  }
              }
              else
              {
                  $inserProPic = mysqli_query($dbCon,"insert into tbl_user_pic set user_id='".$getId."',img_secure_url='".$surl."',img_public_id='".$public_id."',status=1");
                  if($inserProPic)
                  {
                      $stat = ['msg'=>'Profile Image Updated Successfully'];
                  }
                  else
                  {
                      $stat = ['msg'=>'Failed to upload'];
                  }
              }
              
            }
        }
        else
        {
          $stat = ['isAuthorized'=>'un Authorized'];  
        }
        echo json_encode($stat);
        ?>

