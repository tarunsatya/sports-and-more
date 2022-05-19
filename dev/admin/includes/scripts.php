<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
require_once "cloud/vendor/autoload.php";
error_reporting(-1);
ini_set('display_errors', true);
include "db.php";
$conn = mysqli_connect('localhost','u923672343_winner','Winner@123','u923672343_winner');
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

// -------------------- Banner Insert Start------------------------------------------------ //

if(isset($_POST['add_ban']))
{
     $title = mysqli_real_escape_string($conn,$_POST['title']);
     $sub_title = mysqli_real_escape_string($conn,$_POST['sub_title']);
     $ban_img = mysqli_real_escape_string($conn,$_FILES['ban_img']['name']);
     $image = realpath($_FILES['ban_img']['tmp_name']);
      Configuration::instance([
            'cloud' => [
              'cloud_name' => 'winnermedia', 
              'api_key' => '462813286432941', 
              'api_secret' => '87VaQukuQrB2wnlCPh80y0oTq-Y'],
            'url' => [
              'secure' => true]]);
              $upload = (new UploadApi())->upload($image);
              $surl = $upload['secure_url'];
              $public_id = $upload['public_id'];
              
   
  
        $insert=mysqli_query($conn,"INSERT INTO tbl_banners SET title='".$title."', sub_title='".$sub_title."', img_secure_url='".$surl."',img_public_id='".$public_id."', status=1");
     if($insert)
     {
         echo"<script>alert('Banner Inserted Successfully');</script>";
         echo "<script>window.location.href='add-banner.php';</script>";
     }
     else{
         echo"<script>alert('Something went wrong please try Again');</script>";
         echo "<script>window.location.href='add-banner.php';</script>";

     }
    }

// ...............delete banner.........//
if($_GET['banners_del_id'])
{
    $del_ground = mysqli_query($conn,"update tbl_banners set status='0' where id='".$_GET['banners_del_id']."'");
    if($del_ground == true)
    {
        echo "<script>window.alert('Deleted successfully')</script>";
        echo "<script>window.location.href='../manage-ground.php';</script>";
    }
}

// .............................//
// --------------------------------- Category edit Start------------------------------------------------ //



// ---------------------------------delete category end------------------------------------------------ //
//................................edit banner.........................../////
if(isset($_POST['edit_ban']))
{
     $title = mysqli_real_escape_string($conn,$_POST['title']);
     $sub_title = mysqli_real_escape_string($conn,$_POST['sub_title']);
     $ban_img = mysqli_real_escape_string($conn,$_FILES['ban_img']['name']);
     $image = realpath($_FILES['ban_img']['tmp_name']);
      Configuration::instance([
            'cloud' => [
              'cloud_name' => 'winnermedia', 
              'api_key' => '462813286432941', 
              'api_secret' => '87VaQukuQrB2wnlCPh80y0oTq-Y'],
            'url' => [
              'secure' => true]]);
              $upload = (new UploadApi())->upload($image);
              $surl = $upload['secure_url'];
              $public_id = $upload['public_id'];
    $check= mysqli_query($conn,"SELECT * FROM tbl_banners WHERE title='".$title."' &&  status=1");    
    if($check){

        echo"<script>alert('Banner Already Exist');</script>";
    }
    else{
        $insert=mysqli_query($conn,"UPDATE tbl_banners SET title='".$title."', sub_title='".$sub_title."', img_secure_url='".$surl."',img_public_id='".$public_id."', status=1 where id='".$_GET['banners_edit_id']."'");
     if($insert)
     {
         echo"<script>alert('Banner updated Successfully');</script>";
         echo "<script>window.location.href='add-banner.php';</script>";
     }
     else{
         echo"<script>alert('Something went wrong please try Again');</script>";
         echo "<script>window.location.href='add-banner.php';</script>";

     }
    }
    }

// ..........................................................................//
// ---------------------------------- leadership board insert-------------------------------------------


if(isset($_POST['leadershipboard']))
{
     $for_otp = mysqli_real_escape_string($conn,$_POST['For_Otp']);
     $for_survey_form = mysqli_real_escape_string($conn,$_POST['surveyform']);
     $for_fst_time_booking = mysqli_real_escape_string($conn,$_POST['firsttime-booking']);
     
        $insert=mysqli_query($conn,"INSERT INTO leadership_board SET for_otp='".$for_otp."', for_survey_form='".$for_survey_form."', for_firsttime_booking='".$for_fst_time_booking."', status=1");

     if($insert)
     {
         echo"<script>alert('Details Inserted Successfully');</script>";
         echo "<script>window.location.href='leadership-board.php';</script>";
     }
     else{
         echo"<script>alert('Something went wrong please try Again');</script>";
         echo "<script>window.location.href='leadership-board.php';</script>";

     }

    }

    // 
if(isset($_POST['editleadershipboard']))
{
     
     $for_otp = mysqli_real_escape_string($conn,$_POST['For_Otp']);
     $for_survey_form = mysqli_real_escape_string($conn,$_POST['surveyform']);
     $for_fst_time_booking = mysqli_real_escape_string($conn,$_POST['firsttime-booking']);
     
        $insert=mysqli_query($conn,"update leadership_board SET for_otp='".$for_otp."', for_survey_form='".$for_survey_form."', for_firsttime_booking='".$for_fst_time_booking."', status=1 where id='".$_GET['id']."'");

     if($insert)
     {
         echo"<script>alert('Details updated Successfully');</script>";
         echo "<script>window.location.href='edit-leadership-board.php';</script>";
     }
     else{
         echo"<script>alert('Something went wrong please try Again');</script>";
         echo "<script>window.location.href='edit-leadership-board.php';</script>";

     }

    }
    
// ------------------------------------ delete leadership board -----------------------------

if(@$_GET['b-id'])
{
    $del_board = mysqli_query($conn,"delete from leadership_board where id='".$_GET['b-id']."'");
    if($del_board == true)
    {
        echo "<script>window.alert('Deleted successfully')</script>";
        echo "<script>window.location.href='../manage-leadership-board.php';</script>";
    }
}


// ----------------------------------- insert ground ------------------------------------
 
 if(isset($_POST['add-ground']))
{
    $gname = mysqli_real_escape_string($conn,$_POST['gname']);
    $gloc = mysqli_real_escape_string($conn,$_POST['gloc']);
    $gaddr = mysqli_real_escape_string($conn,$_POST['gaddr']);
    $img1 = mysqli_real_escape_string($conn,$_FILES['img1']['tmp_name']);
    $img2 = mysqli_real_escape_string($conn,$_FILES['img2']['tmp_name']);
    $img3= mysqli_real_escape_string($conn,$_FILES['img3']['tmp_name']);
    $gicon = mysqli_real_escape_string($conn,$_FILES['gicon']['tmp_name']);
      
    $prod_img1 = realpath($_FILES['img1']['tmp_name']);
    $prod_img2 = realpath($_FILES['img2']['tmp_name']);
    $prod_img3 = realpath($_FILES['img3']['tmp_name']);
    $prod_img4 = realpath($_FILES['gicon']['tmp_name']);
    
    Configuration::instance([
            'cloud' => [
              'cloud_name' => 'winnermedia', 
              'api_key' => '462813286432941', 
              'api_secret' => '87VaQukuQrB2wnlCPh80y0oTq-Y'],
            'url' => [
              'secure' => true]]);
              $upload1 = (new UploadApi())->upload($prod_img1);
              $upload2 = (new UploadApi())->upload($prod_img2);
              $upload3 = (new UploadApi())->upload($prod_img3);
              $upload4 = (new UploadApi())->upload($prod_img4);

              $surl1 = $upload1['secure_url'];
              $surl2 = $upload2['secure_url'];
              $surl3 = $upload3['secure_url'];
              $surl4 = $upload4['secure_url'];

              $public_id1 = $upload1['public_id'];
              $public_id2 = $upload2['public_id'];
              $public_id3 = $upload3['public_id'];
              $public_id4 = $upload4['public_id'];
   
        $insert=mysqli_query($conn,"INSERT INTO tbl_grounds SET gname='".$gname."',
        glocation='".$gloc."',gaddress='".$gaddr."',img1='".$surl1."',img2='".$surl2."', img3='".$surl3."',gicon='".$surl4."',img_public1='".$public_id1."',img_public2='".$public_id2."',img_public3='".$public_id3."',img_public4='".$public_id4."', status=1");
        if($insert)
        {
         echo"<script>alert('Ground Inserted Successfully');</script>";
         echo "<script>window.location.href='add-ground.php';</script>";
            
        }
        else{
         echo"<script>alert('ground test Something went wrong please try Again');</script>";
         echo "<script>window.location.href='add-ground.php';</script>";
            
        }
     
}

// .................................edit ground.............................................//
if(isset($_POST['edit-ground']))
{
    $gname = mysqli_real_escape_string($conn,$_POST['gname']);
    $gloc = mysqli_real_escape_string($conn,$_POST['gloc']);
    $gaddr = mysqli_real_escape_string($conn,$_POST['gaddr']);
    $img1 = mysqli_real_escape_string($conn,$_FILES['img1']['tmp_name']);
    $img2 = mysqli_real_escape_string($conn,$_FILES['img2']['tmp_name']);
    $img3= mysqli_real_escape_string($conn,$_FILES['img3']['tmp_name']);
    $gicon = mysqli_real_escape_string($conn,$_FILES['gicon']['tmp_name']);
      
    $prod_img1 = realpath($_FILES['img1']['tmp_name']);
    $prod_img2 = realpath($_FILES['img2']['tmp_name']);
    $prod_img3 = realpath($_FILES['img3']['tmp_name']);
    $prod_img4 = realpath($_FILES['gicon']['tmp_name']);
    
    Configuration::instance([
            'cloud' => [
              'cloud_name' => 'winnermedia', 
              'api_key' => '462813286432941', 
              'api_secret' => '87VaQukuQrB2wnlCPh80y0oTq-Y'],
            'url' => [
              'secure' => true]]);
              $upload1 = (new UploadApi())->upload($prod_img1);
              $upload2 = (new UploadApi())->upload($prod_img2);
              $upload3 = (new UploadApi())->upload($prod_img3);
              $upload4 = (new UploadApi())->upload($prod_img4);

              $surl1 = $upload1['secure_url'];
              $surl2 = $upload2['secure_url'];
              $surl3 = $upload3['secure_url'];
              $surl4 = $upload4['secure_url'];

              $public_id1 = $upload1['public_id'];
              $public_id2 = $upload2['public_id'];
              $public_id3 = $upload3['public_id'];
              $public_id4 = $upload4['public_id'];

        $check= mysqli_query($conn,"SELECT * FROM tbl_grounds WHERE gname='".$gname."' &&  status=1");    
        if($check){
    
            echo"<script>alert('Ground Already Exist');</script>";
        }
        
        else{
        $insert=mysqli_query($conn,"UPDATE tbl_grounds SET gname='".$gname."',
        glocation='".$gloc."',gaddress='".$gaddr."',img1='".$surl1."',img2='".$surl2."', img3='".$surl3."',gicon='".$surl4."',img_public1='".$public_id1."',img_public2='".$public_id2."',img_public3='".$public_id3."',img_public4='".$public_id4."', status=1 where ground_id='".$_GET['edit_ground']."'");
        if($insert)
        {
         echo"<script>alert('Ground Updated Successfully');</script>";
         echo "<script>window.location.href='add-ground.php';</script>";
            
        }
        else{
         echo"<script>alert('ground test Something went wrong please try Again');</script>";
         echo "<script>window.location.href='add-ground.php';</script>";
            
        } 
    }
}


// .......................................................................................//
// ------------------------------------ delete ground -----------------------------

if(@$_GET['del_ground_id'])
{
    $del_ground = mysqli_query($conn,"UPDATE tbl_grounds SET status='0' where ground_id='".$_GET['del_ground_id']."'");
    if($del_ground == true)
    {
        echo "<script>window.alert('Deleted successfully')</script>";
        echo "<script>window.location.href='manage-ground.php';</script>";
    }
}



// ----------------------------------- insert game ------------------------------------

if(isset($_POST['add_game']))
{
     $game = mysqli_real_escape_string($conn,$_POST['game_name']);
     $ground_name = mysqli_real_escape_string($conn,$_POST['ground_name']);
     $game_img = mysqli_real_escape_string($conn,$_FILES['game_img']['name']);
     $image = realpath($_FILES['game_img']['tmp_name']);
      Configuration::instance([
            'cloud' => [
              'cloud_name' => 'winnermedia', 
              'api_key' => '462813286432941', 
              'api_secret' => '87VaQukuQrB2wnlCPh80y0oTq-Y'],
            'url' => [
              'secure' => true]]);
              $upload = (new UploadApi())->upload($image);
              $surl = $upload['secure_url'];
              $public_id = $upload['public_id'];
              
        $insert=mysqli_query($conn,"INSERT INTO tbl_game SET g_ground='".$ground_name."',game_name='".$game."',image='".$surl."',public_id='".$public_id."', status=1");
     if($insert)
     {
         echo"<script>alert('Game Inserted Successfully');</script>";
         echo "<script>window.location.href='add-game.php';</script>";
     }
     else{
         echo"<script>alert('Something went wrong please try Again');</script>";
         echo "<script>window.location.href='add-game.php';</script>";

     }
}

// --------------------------------------edit game

if(isset($_POST['edit_game']))
{
     
    $game = mysqli_real_escape_string($conn,$_POST['game_name']);
        $status = mysqli_real_escape_string($conn,$_POST['status']);
     $ground_name = mysqli_real_escape_string($conn,$_POST['ground_name']);
     $game_img = mysqli_real_escape_string($conn,$_FILES['game_img']['name']);
     $image = realpath($_FILES['game_img']['tmp_name']);
      Configuration::instance([
            'cloud' => [
              'cloud_name' => 'winnermedia', 
              'api_key' => '462813286432941', 
              'api_secret' => '87VaQukuQrB2wnlCPh80y0oTq-Y'],
            'url' => [
              'secure' => true]]);
              $upload = (new UploadApi())->upload($image);
               $surl = $upload['secure_url'];
              $public_id = $upload['public_id'];

              $check= mysqli_query($conn,"SELECT * FROM tbl_game WHERE game_name='".$game."' &&  status=1");    
              if($check){
          
                  echo"<script>alert('Game Already Exist');</script>";
              }

            else{

           
        $update=mysqli_query($conn,"update tbl_game set g_ground='".$ground_name."', game_name='".$game."', image='".$surl."',public_id='".$public_id."', status='".$status."' where id='".$_GET['games_id']."'");
     if($update)
     {
         echo"<script>alert('Game Updated Successfully');</script>";
         echo "<script>window.location.href='manage-game.php';</script>";
     }
     else{
         echo"<script>alert('Something went wrong please try Again');</script>";
        //  echo "<script>window.location.href='add-game.php';</script>";

     }
    }
    }
    
// ------------------------------------ delete game -----------------------------

if(@$_GET['g-id'])
{
    $del_game = mysqli_query($conn,"UPDATE tbl_game SET status='0' where id='".$_GET['g-id']."'");

    if($del_game == true)
    {
        echo "<script>window.alert('Deleted successfully')</script>";
        echo "<script>window.location.href='manage-game.php';</script>";
    }
}



// -------------------------------------- insert time --------------------------------------------

if(isset($_POST['add_time']))
{
     error_reporting(0);
     $gname = mysqli_real_escape_string($conn,$_POST['gname']);
     $one = mysqli_real_escape_string($conn,$_POST['one']);
     $two = mysqli_real_escape_string($conn,$_POST['two']);
     $three = mysqli_real_escape_string($conn,$_POST['three']);
     $four = mysqli_real_escape_string($conn,$_POST['four']);
     $five = mysqli_real_escape_string($conn,$_POST['five']);
     $six = mysqli_real_escape_string($conn,$_POST['six']);
     $seven = mysqli_real_escape_string($conn,$_POST['seven']);
     $eight = mysqli_real_escape_string($conn,$_POST['eight']);
     $nine = mysqli_real_escape_string($conn,$_POST['nine']);
     $ten = mysqli_real_escape_string($conn,$_POST['ten']);
     $eleven = mysqli_real_escape_string($conn,$_POST['eleven']);
     $twelve = mysqli_real_escape_string($conn,$_POST['twelve']);
     $thirteen = mysqli_real_escape_string($conn,$_POST['thirteen']);
     $fourteen = mysqli_real_escape_string($conn,$_POST['fourteen']);
     $fifteen = mysqli_real_escape_string($conn,$_POST['fifteen']);
     $sixteen = mysqli_real_escape_string($conn,$_POST['sixteen']);
     $seventeen = mysqli_real_escape_string($conn,$_POST['seventeen']);
     $eighteen = mysqli_real_escape_string($conn,$_POST['eighteen']);
     $ninteen = mysqli_real_escape_string($conn,$_POST['ninteen']);
     $twenty = mysqli_real_escape_string($conn,$_POST['twenty']);
     $twentyone = mysqli_real_escape_string($conn,$_POST['twentyone']);
     $twentytwo = mysqli_real_escape_string($conn,$_POST['twentytwo']);
     $twentythree = mysqli_real_escape_string($conn,$_POST['twentythree']);
     $twentyfour = mysqli_real_escape_string($conn,$_POST['twentyfour']);

     $insert=mysqli_query($conn,"insert into tbl_time_management set gname='".$gname."', 06AM_07AM='".$one."', 07AM_08AM='".$two."', 08AM_09AM='".$three."', 09AM_10AM='".$four."', 10AM_11AM='".$five."', 11AM_12PM='".$six."', 12PM_01PM='".$seven."', 01PM_02PM='".$eight."', 02PM_03PM='".$nine."', 03PM_04PM='".$ten."', 04PM_05PM='".$eleven."', 05PM_06PM='".$twelve."', 06PM_07PM='".$thirteen."', 07PM_08PM='".$fourteen."', 08PM_09PM='".$fifteen."', 09PM_10PM='".$sixteen."', 10PM_11PM='".$seventeen."', 11PM_12AM='".$eighteen."', 12AM_01AM='".$ninteen."', 01AM_02AM='".$twenty."', 02AM_03AM='".$twentyone."', 03AM_04AM='".$twentytwo."', 04AM_05AM='".$twentythree."', 05AM_06AM='".$twentyfour."', status=1");
     if($insert)
     {
         echo"<script>alert('Time updated Successfully');</script>";
        //  echo "<script>window.location.href='add-game.php';</script>";
     }
     else{
         echo"<script>alert('Something went wrong please try Again');</script>";
        //  echo "<script>window.location.href='add-game.php';</script>";

     }
    }
    

// ------------------------------------ Add slot ---------------------------------------


if(isset($_POST['add_time_slot']))
{

     $gname = mysqli_real_escape_string($conn,$_POST['gname']);
     $hours = mysqli_real_escape_string($conn,$_POST['hours']);
     $minutes = mysqli_real_escape_string($conn,$_POST['minutes']);
     $date = mysqli_real_escape_string($conn,$_POST['slot_date']);
     $start_date = date_create($_POST['slot_date']);
     $format= date_format($start_date, 'Y-m-d');
     $hrchk="";  
foreach($_POST['hours'] as $hrschk1)  
   {  
      $hrchk .= $hrschk1.",";  
   }  
//    $minchk="";  
//    foreach($_POST['minutes'] as $minchk1)  
//       {  
//          $minchk .= $minchk1.",";  
//       }  
// half_an_hour='".$minchk."',
     $insert=mysqli_query($conn,"insert into tbl_time_slot set court_name='".$gname."', hour_slot='".$hrchk."', date='".$format."', status=1");
     if($insert)
     {
         echo"<script>alert('Slot time Successfully.".$hrchk."');</script>";
        //  echo "<script>window.location.href='add-game.php';</script>";
     }
     else{
         echo"<script>alert('Something went wrong please try Again');</script>";
        //  echo "<script>window.location.href='add-game.php';</script>";

     }

  }
    
if(isset($_POST['add_court']))
{
    $gname = mysqli_real_escape_string($conn,$_POST['gname']);
     $slot = mysqli_real_escape_string($conn,$_POST['slot']);
     $date = mysqli_real_escape_string($conn,$_POST['slot_date']);
     

     $insert=mysqli_query($conn,"insert into tbl_time_slot set gname='".$gname."', slot_time='".$slot."', date='".$date."', status=1");
     if($insert)
     {
         echo"<script>alert('Slot time Successfully');</script>";
        //  echo "<script>window.location.href='add-game.php';</script>";
     }
     else{
         echo"<script>alert('Something went wrong please try Again');</script>";
        //  echo "<script>window.location.href='add-game.php';</script>";

     }
}
// ------------------------------------------------------post Survey-----------------------------------

// ...........................add court start..............................................//
 if(isset($_POST['adding_courts']))
{
    $ground_id = mysqli_real_escape_string($conn,$_POST['ground_id']);
    $game_id = mysqli_real_escape_string($conn,$_POST['game_id']);
    $court_name = mysqli_real_escape_string($conn,$_POST['court_name']);
    $court_image = mysqli_real_escape_string($conn,$_FILES['court_image']['tmp_name']);
     $prod_img1 = realpath($_FILES['court_image']['tmp_name']);
 
    
    Configuration::instance([
            'cloud' => [
              'cloud_name' => 'winnermedia', 
              'api_key' => '462813286432941', 
              'api_secret' => '87VaQukuQrB2wnlCPh80y0oTq-Y'],
            'url' => [
              'secure' => true]]);
              $upload1 = (new UploadApi())->upload($prod_img1);
             

              $surl1 = $upload1['secure_url'];
              

              $public_id1 = $upload1['public_id'];
             
   
        $insert=mysqli_query($conn,"INSERT INTO tbl_court SET ground_id='".$ground_id."',
        game_id='".$game_id."',court_name='".$court_name."',court_image='".$surl1."',public_id='".$public_id1."', court_status=1");
        if($insert)
        {
         echo"<script>alert('Court Inserted Successfully');</script>";
         echo "<script>window.location.href='add-court.php';</script>";
            
        }
        else{
         echo"<script>alert('court test Something went wrong please try Again');</script>";
         echo "<script>window.location.href='add-court.php';</script>";
            
        }
     
}
// ..................................edit court................................................//

if(isset($_POST['edit_courts']))
{
     
    $ground_id = mysqli_real_escape_string($conn,$_POST['ground_id']);
    $game_id = mysqli_real_escape_string($conn,$_POST['game_id']);
    $court_name = mysqli_real_escape_string($conn,$_POST['court_name']);
    $court_image = mysqli_real_escape_string($conn,$_FILES['court_image']['tmp_name']);
     $prod_img1 = realpath($_FILES['court_image']['tmp_name']);
 
    
    Configuration::instance([
            'cloud' => [
              'cloud_name' => 'winnermedia', 
              'api_key' => '462813286432941', 
              'api_secret' => '87VaQukuQrB2wnlCPh80y0oTq-Y'],
            'url' => [
              'secure' => true]]);
              $upload1 = (new UploadApi())->upload($prod_img1);
             

              $surl1 = $upload1['secure_url'];
              

              $public_id1 = $upload1['public_id'];

              $check= mysqli_query($conn,"SELECT * FROM tbl_court WHERE court_name='".$court_name."' &&  court_status=1");    
              if($check){
          
                  echo"<script>alert('courty Already Exist');</script>";
              }

            else{
        $update=mysqli_query($conn,"update tbl_court set ground_id='".$ground_id."',
        game_id='".$game_id."',court_name='".$court_name."',court_image='".$surl1."',public_id='".$public_id1."', court_status= 1 where court_id ='".$_GET['court_id ']."'");
     if($update)
     {
         echo"<script>alert('Courty Updated Successfully');</script>";
         echo "<script>window.location.href='manage-game.php';</script>";
     }
     else{
         echo"<script>alert('Something went wrong please try Again');</script>";
        //  echo "<script>window.location.href='add-game.php';</script>";

     }
    }
    }
    

// .................................delete court.....................................//

if(isset($_GET['court_del_id']))
{
    
    $del_court = mysqli_query($conn,"UPDATE tbl_court SET court_status='0' where court_id='".$_GET['court_del_id']."'");
    if($del_court == true)
    {
        echo "<script>window.alert('Court Deleted successfully')</script>";
        echo "<script>window.location.href='manage-court.php';</script>";
    }
    else{
        echo "<script>window.alert('Failed')</script>";
    }
}

// ..................................................................................//

// ------------------------------------ delete game -----------------------------

// if(@$_GET['g-id'])
// {
//     $del_game = mysqli_query($conn,"delete from tbl_game where id='".$_GET['g-id']."'");
//     if($del_game == true)
//     {
//         echo "<script>window.alert('Deleted successfully')</script>";
//         echo "<script>window.location.href='../manage-game.php';</script>";
//     }
// }


if(isset($_POST['add_survy']))
{
    
     $selected_survey = mysqli_real_escape_string($conn,$_POST['selectedsurvey']);  
     $question = mysqli_real_escape_string($conn,$_POST['question']);  
        $optionadt = mysqli_real_escape_string($conn,$_POST['optiona']);  
        $optionbdt = mysqli_real_escape_string($conn,$_POST['optionb']);
        $optioncdt = mysqli_real_escape_string($conn,$_POST['optionc']);
        $optionddt = mysqli_real_escape_string($conn,$_POST['optiond']);
        $correct_answer = mysqli_real_escape_string($conn,$_POST['correct_answer']);

        $postsurvey = mysqli_query($conn,"INSERT INTO tbl_surveyform SET selected_survey='".$selected_survey."',survey_question='".$question."',option_a='".$optionadt."',option_b='".$optionbdt."',option_c='".$optioncdt."',option_d='".$optionddt."',correct_answer='".$correct_answer."',status=1");

     if($postsurvey)
     {
         echo"<script>alert('Details Inserted Successfully');</script>";
         //echo "<script>window.location.href='index.php';</script>";
     }
     else{
         echo"<script>alert('Something went wrong please try Again');</script>";
         //echo "<script>window.location.href='surveyform1.php';</script>";

     }

    }


 ////////////////////////////////////////////////////////////-----INSERT PICK A SIDE-----////////////////////////////////////////////////////////////
if(isset($_POST['adding_pick-aside']))
{
     $groundid = mysqli_real_escape_string($conn,$_POST['ground_id']);
     $gameid = mysqli_real_escape_string($conn,$_POST['game_id']);
     $courtid = mysqli_real_escape_string($conn,$_POST['court_ids']);
     $count = mysqli_real_escape_string($conn,$_POST['count']);
     
        $insert=mysqli_query($conn,"INSERT INTO pick_aside SET ground_id='".$groundid."', game_id='".$gameid."', court_id='".$courtid."',count='".$count."', status=1");

     if($insert)
     {
         echo"<script>alert('Details Inserted Successfully');</script>";
         echo "<script>window.location.href='add-pick-aside.php';</script>";
     }
     else{
         echo"<script>alert('Something went wrong please try Again');</script>";
         echo "<script>window.location.href='add-pick-aside.php';</script>";

     }

    }
    
    
// ground service insert

if(isset($_POST['add_ground_service']))
{
    $ground_id = mysqli_real_escape_string($conn,$_POST['ground_id']);
    $ground_service_name = mysqli_real_escape_string($conn,$_POST['ground_service_name']);
    $ground_service_icon = realpath($_FILES['ground_service_icon']['tmp_name']);
    
    Configuration::instance([
            'cloud' => [
              'cloud_name' => 'winnermedia', 
              'api_key' => '462813286432941', 
              'api_secret' => '87VaQukuQrB2wnlCPh80y0oTq-Y'],
            'url' => [
              'secure' => true]]);
              $upload1 = (new UploadApi())->upload($ground_service_icon);
             

              $surl1 = $upload1['secure_url'];
              

              $public_id1 = $upload1['public_id'];
              
              $ins_ground_services = mysqli_query($conn,"insert into tbl_ground_service set ground_id='".$ground_id."',ground_service_name='".$ground_service_name."',ground_service_icon_surl='".$surl1."',ground_service_icon_public_id='".$public_id1."',ground_service_status=1");
              
              if($ins_ground_services)
     {
         echo"<script>alert('ground services Inserted Successfully');</script>";
         echo "<script>window.location.href='add-ground-services.php';</script>";
     }
     else{
         echo"<script>alert('Something went wrong please try Again');</script>";
         echo "<script>window.location.href='add-ground-services.php';</script>";

     }

     
}

if(isset($_POST['adding_prices']))
{
    $gname = mysqli_real_escape_string($conn,$_POST['game_id']);
     $ground_id = mysqli_real_escape_string($conn,$_POST['ground_id']);
     $price = mysqli_real_escape_string($conn,$_POST['price']);
     

     $insert=mysqli_query($conn,"insert into add_court_prices set game_id='".$gname."', ground_id='".$ground_id."', price='".$price."', status=1");
     if($insert)
     {
         echo"<script>alert('Price Added Successfully');</script>";
        //  echo "<script>window.location.href='add-game.php';</script>";
     }
     else{
         echo"<script>alert('Something went wrong please try Again');</script>";
        //  echo "<script>window.location.href='add-game.php';</script>";

     }
}
?>