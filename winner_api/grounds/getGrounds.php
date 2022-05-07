<?php
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type,Authorization');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
include "../connection/db.php";

        $getId = $decoded->user_id;
        $getGround = mysqli_query($dbCon,"select * from tbl_grounds where status=1");
        $data = [];
        while($fetchGround = mysqli_fetch_array($getGround))
        {
           $data[] = $fetchGround; 
        }
        echo json_encode($data);
  
?>