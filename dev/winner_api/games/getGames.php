<?php
header('Access-Control-Allow-Headers: Access-Control-Allow-Origin, Content-Type,Authorization');
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json, charset=utf-8');
include "../connection/db.php";

   
        $getGame = mysqli_query($dbCon,"select * from tbl_game where status=1");
        $data = [];
        while($fetchGame = mysqli_fetch_array($getGame))
        {
           $data[] = $fetchGame; 
        }
        echo json_encode($data);
  

?>