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
    
    
    $que1 = mysqli_real_escape_string($dbCon,$jsondecode_data->QUE_1);
    $que2 = mysqli_real_escape_string($dbCon,$jsondecode_data->QUE_2);
    $que3 = mysqli_real_escape_string($dbCon,$jsondecode_data->QUE_3);
    $que4 = mysqli_real_escape_string($dbCon,$jsondecode_data->QUE_4);
    // $notify = $jsondecode_data->notify;
    
    $select1=mysqli_query($dbCon,"select * from tbl_surveyform where question_key='QUE_1' and status='1'");
    $f_query1=mysqli_fetch_array($select1);
    $select2=mysqli_query($dbCon,"select * from tbl_surveyform where question_key='QUE_2' and status='1'");
    $f_query2=mysqli_fetch_array($select2);
    $select3=mysqli_query($dbCon,"select * from tbl_surveyform where question_key='QUE_3' and status='1'");
    $f_query3=mysqli_fetch_array($select3);
    $select4=mysqli_query($dbCon,"select * from tbl_surveyform where question_key='QUE_4' and status='1'");
    $f_query4=mysqli_fetch_array($select4);
    $ans1=$f_query1['correct_answer'];
    $count=0;
    if($ans1==$que1)
    {
        $count++;
    }
    $ans2=$f_query2['correct_answer'];
    if($ans2==$que2)
    {
        $count++;
    }
    $ans3=$f_query3['correct_answer'];
    if($ans3==$que3)
    {
        $count++;
    }
    $ans4=$f_query4['correct_answer'];
    if($ans4==$que4)
    {
        $count++;
    }
        $query = mysqli_query($dbCon, "insert into tbl_survey set QUE_1='".$que1."', QUE_2='".$que2."', QUE_3='".$que3."',QUE_4='".$que4."', user_id='".$decoded->user_id."', Actual_Ans='".$count."', survey_status='1'");

    if($query)
     {
     echo json_encode($stat = ['successstatus' => 'Sucess!']);
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