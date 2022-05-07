<?php
include "db.php";

if(isset($_POST['add_user']))

            {
                $user_name = $_POST['user_name'];
                $User_email = $_POST['user_email'];
                $user_number = $_POST['user_num'];
                $user_role = $_POST['user_role'];
                $user_password = $_POST['user_pwd'];
                date_default_timezone_set('Asia/Kolkata');
                $date = date('d-m-Y');
                  
         $sql = "INSERT INTO `admin_user` (`admin_user_id`, `admin_user_name`, `admin_user_emailt`, `admin_user_number`, `admin_user_role`, `admin_user_password`, `admin_user_date`, `admin_user_status`) VALUES (NULL, '$user_name', '$User_email', '$user_number', '$user_role', '$user_password', '$date', 1)";

            
            
            $success = mysqli_query($conn, $sql);

   if ($success) {
    echo "<script> window.alert(\"Entered user'.$user_name.' s data successful\"); </script>";
     echo "<script>window.location.href='add-users.php';</script>";
   } else{
       echo "<script> window.alert(\"Entery of user'.$user_name.' data unsuccessful\"); </script>";
        echo "<script>window.location.href='add-users.php';</script>";
   }
            
            }



            if(isset($_POST['add_state']))

            {
                $state_name = $_POST['state_name'];
                
                date_default_timezone_set('Asia/Kolkata');
                $date = date('d-m-Y');
                  
         $sqli = "INSERT INTO `state_masters` (`state_master_id`, `state_name`, `state_date`, `state_status`) VALUES (NULL, '$state_name', '$date', 1)";

            
            
            $done = mysqli_query($conn, $sqli);

   if ($done) {
    echo "<script> window.alert(\"Entered State Name'.$state_name.' s data successful\"); </script>";
     echo "<script>window.location.href='state-masters.php';</script>";
   } else{
       echo "<script> window.alert(\"Entery of State Name'.$state_name.' data unsuccessful\"); </script>";
        echo "<script>window.location.href='state-masters.php';</script>";
   }
            
            }


            if(isset($_POST['add_city']))
           
            {
                
                
                $select_state = $_POST['select_state'];
                $city_name = $_POST['city_name'];
                 date_default_timezone_set('Asia/Kolkata');
                $date = date('d-m-Y');

                 $sqlu = "INSERT INTO `city-masters` (`city_id`, `state_name`, `city_name`, `city_date`, `city_status`) VALUES (NULL, '$select_state', '$city_name', '$date', 1)";

                 $succes = mysqli_query($conn,$sqlu);

                 if ($succes) {

                   echo "<script> window.alert(\"Entered city Name'.$city_name.' s data successful\");</script>";
                   echo "<script>window.location.href='city-masters.php';</script>";
                 }
                 else {
                      echo "<script> window.alert(\"Entered city Name'.$city_name.' s data unsuccessful\");</script>";
                     echo "<script>window.location.href='city-masters.php';</script>";
                 }

            }


             if(isset($_POST['add_category']))
           
            {
                
                $imgsrc = "../images/uploads/category_img/";
                $category_name = $_POST['category_name'];
                 date_default_timezone_set('Asia/Kolkata');
                $date = date('d-m-Y');
                $category_image = mysqli_real_escape_string($conn,$_FILES['category_image']['name']);

    $imageFileType = pathinfo($category_image,PATHINFO_EXTENSION);

     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "JPG" && $imageFileType != "jpeg" && $imageFileType != "gif" && $_FILES["img"]["name"] ) 

     {

 

    echo "<script>alert('only JPG, JPEG, PNG & GIF files are allowed.')</script>" ;

    echo "<script>window.location.href='add_latest_news.php';</script>" ;

  

  }

else

{

    $imgrename = date('Ymd').rand(1,1000000).'.'.$imageFileType;

    $category_move_img = move_uploaded_file($_FILES['category_image']['tmp_name'],$imgsrc.$imgrename);

}

                 $sqli_query = "INSERT INTO `cateogry-masters` (`category_id`, `category_name`, `category_img`, `category_date`, `category_status`) VALUES (NULL, '$category_name', '$imgrename', '$date', 1)";

                 $working = mysqli_query($conn,$sqli_query);

                 if ($working) {

                   echo "<script> window.alert(\"Entered categoryName'.$category_name.' s data successful\");</script>";
                   echo "<script>window.location.href='category-masters.php';</script>";
                 }
                 else {
                      echo "<script> window.alert(\"Entered city Name'.$category_name.' s data unsuccessful\");</script>";
                     echo "<script>window.location.href='category-masters.php';</script>";
                 }

            }



?>