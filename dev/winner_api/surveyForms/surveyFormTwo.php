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
        $id=$decoded->user_id;
    $postdata = file_get_contents("php://input");
    $jsondecode_data = json_decode($postdata);
    
    
    $que5 = mysqli_real_escape_string($dbCon,$jsondecode_data->QUE_5);
    $que6 = mysqli_real_escape_string($dbCon,$jsondecode_data->QUE_6);
    $que7 = mysqli_real_escape_string($dbCon,$jsondecode_data->QUE_7);
    $que8 = mysqli_real_escape_string($dbCon,$jsondecode_data->QUE_8);
    $que9 = mysqli_real_escape_string($dbCon,$jsondecode_data->QUE_9);
    $que10 = mysqli_real_escape_string($dbCon,$jsondecode_data->QUE_10);
    $que11 = mysqli_real_escape_string($dbCon,$jsondecode_data->QUE_11);
    $que12 = mysqli_real_escape_string($dbCon,$jsondecode_data->QUE_12);
    // $notify = $jsondecode_data->notify;
    
    $select5=mysqli_query($dbCon,"select * from tbl_surveyform where question_key='QUE_5' and status='1'");
    $f_query5=mysqli_fetch_array($select5);

    $select6=mysqli_query($dbCon,"select * from tbl_surveyform where question_key='QUE_6' and status='1'");
    $f_query6=mysqli_fetch_array($select6);

    $select7=mysqli_query($dbCon,"select * from tbl_surveyform where question_key='QUE_7' and status='1'");
    $f_query7=mysqli_fetch_array($select7);

    $select8=mysqli_query($dbCon,"select * from tbl_surveyform where question_key='QUE_8' and status='1'");
    $f_query8=mysqli_fetch_array($select8);

    
    $select9=mysqli_query($dbCon,"select * from tbl_surveyform where question_key='QUE_9' and status='1'");
    $f_query9=mysqli_fetch_array($select9);

    $select10=mysqli_query($dbCon,"select * from tbl_surveyform where question_key='QUE_10' and status='1'");
    $f_query10=mysqli_fetch_array($select10);

    $select11=mysqli_query($dbCon,"select * from tbl_surveyform where question_key='QUE_11' and status='1'");
    $f_query11=mysqli_fetch_array($select11);

    $select12=mysqli_query($dbCon,"select * from tbl_surveyform where question_key='QUE_12' and status='1'");
    $f_query12=mysqli_fetch_array($select12);
    
    $ans5=$f_query5['correct_answer'];
    $count=0;
    if($ans5==$que5)
    {
        $count++;
    }
    $ans6=$f_query6['correct_answer'];
    if($ans6==$que6)
    {
        $count++;
    }
    $ans7=$f_query7['correct_answer'];
    if($ans7==$que7)
    {
        $count++;
    }
    $ans8=$f_query8['correct_answer'];
    if($ans8==$que8)
    {
        $count++;
    }
    $ans9=$f_query9['correct_answer'];
    if($ans9==$que9)
    {
        $count++;
    }
     $ans10=$f_query10['correct_answer'];
    if($ans10==$que10)
    {
        $count++;
    }
    $ans11=$f_query11['correct_answer'];
    if($ans11==$que11)
    {
        $count++;
    }
    $ans12=$f_query12['correct_answer'];
    if($ans12==$que12)
    {
        $count++;
    }
        $query = mysqli_query($dbCon, "insert into tbl_survey2 set QUE_5='".$que5."', QUE_6='".$que6."', QUE_7='".$que7."', QUE_8='".$que8."', QUE_9='".$que9."', QUE_10='".$que10."', QUE_11='".$que11."', QUE_12='".$que12."', user_id='".$decoded->user_id."', Actual_Ans='".$count."', status='1'");

    if($query)
     {
        $sel_leader_board_points = mysqli_query($dbCon,"select * from leadership_board");
        $fetch_otp_points = mysqli_fetch_array($sel_leader_board_points);
        $otp_points = $fetch_otp_points['for_survey_form'];
    
        $update_otp_points = mysqli_query($dbCon,"update tbl_user_points set 
        survey_points='".$otp_points."' where user_id='".$decoded->user_id."'");
    
    
         echo json_encode($stat = ['successstatus' => 'Successfull!','surveyMsg' => 'Congratulations You Have Won '.$otp_points.' Leader board Points for Completing the Survey']);
    
   
}
else{
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