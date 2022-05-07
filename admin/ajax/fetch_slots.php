<?php
include "../includes/db.php";

$id = $_POST['id'];
$date = date('y-m-d');
$slots = mysqli_query($conn,"select * from tbl_time_slot where gname='".$id."' && date='".$date."' && status=1");
if(mysqli_num_rows($slots) == 1){
    $fet = mysqli_fetch_array($slots);
    $time = $fet['slot_time'];
    $id = $fet['id'];
    $jsonarr = [];
    while($slot->mysqli_fetch_array($slots)){
         $jsonarr =$slot;
    }
     echo json_encode($jsonarr);
    // echo ' <div class="col-md-6">
    //                                     <div class="d-flex time-box">
    //                                         <div class="mtop-5">
    //                                             <label for="">'.$time.'</label>
    //                                         </div>
    //                                         <div class="mtop-5">
    //                                             <label>
    //                                                 <input type="checkbox" class="default__check switchbox" value="'.$id.'"
    //                                                     name="one">
    //                                                 <span class="custom__check"></span>
    //                                             </label>
    //                                         </div>

    //                                     </div>
    //                                 </div>'; 
}
else{
    // echo json_encode(array("dn" => "Delivery Not Available"));
}
?>