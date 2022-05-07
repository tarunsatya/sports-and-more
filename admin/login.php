<?php
include "includes/db.php";

session_start();
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="Berry box Admin dashboard" />
    <meta property="og:image" content="social-image.png" />
    <meta name="format-detection" content="telephone=no" />

    <!-- PAGE TITLE HERE -->
    <title>Winner App Login</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="css/style.css" rel="stylesheet" />
</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="mb-3">
                                        <a href="">
                                            <h3 style="font-size: 22px; font-weight: 600;">Winner Dashboard</h3>
                                        </a>
                                    </div>

                                    <form method="post">
                                        <div class="mb-3">
                                            <div class="mb-3 fm-sty">
                                                <label class="text-label form-label"
                                                    for="validationCustomUsername"><strong>Email</strong></label>
                                            </div>
                                            <div class="input-group">

                                                <input type="text" class="form-control" placeholder="Enter Email"
                                                    name="username" required />

                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="mb-3 fm-sty">
                                                <label class="text-label form-label" for="dz-password"><strong>Password
                                                        *</strong></label>
                                            </div>
                                            <div class="input-group transparent-append">
                                                <input type="password" class="form-control" placeholder="Enter Password"
                                                    name="password" required />
                                            </div>
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">

                                            <div class="mb-3">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="login_submit" class="btn btn-primary btn-block">
                                                Take me to dashboard
                                            </button>
                                        </div>

                                    </form>
                                    <!-- <div class="new-account mt-3">
                      <p>
                        Don't have an account?
                        <a class="text-primary" href="page-register.html"
                          >Sign up</a
                        >
                      </p>
                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="vendor/global/global.min.js"></script> -->
    <!-- <script src="js/custom.min.js"></script> -->
    <!-- <script src="js/deznav-init.js"></script> -->
    <!-- <script src="js/styleSwitcher.js"></script> -->

</body>
<?php


if(isset($_POST['login_submit']))
{
    $user = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $login_check = mysqli_query($conn,"select * from tbl_login where user_mail='".$user."' and password='".$password."' and status=1");
    $fetch_user = mysqli_fetch_array($login_check);
    $count = mysqli_num_rows($login_check);

    if($count == 1)
    {
        $_SESSION['username'] = $fetch_user['user_mail'];
        $_SESSION['retailer'] = $fetch_user['id'];
        
       
        // echo "<script>window.alert('Login successful')</script>";
       echo"<script>Swal.fire({
  icon: 'success',
  title: 'Login',
  text: 'Successful!'})</script>";
 

        echo "<script>window.location.href='index.php'</script>";
    }
    else {
        
        //  echo "<script>Swal.fire('Any fool can use a computer');</script>";
         echo"<script>Swal.fire({
  icon: 'error',
  title: 'Login',
  text: 'failed!'})</script>";
        // echo "<script>window.location.href='login.php'</script>";
    }
}

?>
</html>