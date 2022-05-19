<?php
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type,Authorization');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
include "../connection/db.php";

        $getBannerPic = mysqli_query($dbCon,"select * from tbl_banners where status=1");
        $data = [];
        while($fetchBannerPic = mysqli_fetch_array($getBannerPic))
        {
           $data[] = $fetchBannerPic; 
        }
        echo json_encode($data);
   
?>