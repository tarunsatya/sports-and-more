<?php 
include "includes/header.php";
include "includes/sider.php";
include "includes/scripts.php";
?>


<!-- <div class="container">
    <div class="row justify-content-center">
        <div>
            <h3>Add State</h3>
        </div>
        <div class="col-md-8">
            <div class="cd-ad-state">

                <form action="" method="post">
                    <input type="text" class="form-control" placeholder="Enter state">
                </form>

            </div>
        </div>
    </div>
</div> -->
<div class="row mt-130">
    <div class="col-xl-4 col-lg-12">
    </div>

    <div class="col-xl-6 col-lg-12 justify-content-center">
        <div class="card main-car ">
            <div class="card-header justify-content-center">
                <h4 class="card-title">Edit Leadership Board</h4>
            </div>
            <div class="card-body">
                <?php 
                                $board = mysqli_query($conn, "select * from leadership_board where status=1 && id='".$_GET['id']."'");
                               
                                $fet = mysqli_fetch_array($board);
                                    ?>
                <div class="basic-form">
                    <form method="post" enctype="">
                        <div class="mb-3 row">
                            <!-- <label class="col-sm-3 col-form-label">For Otp</label> -->
                            <div class="col-sm-9 form-align1">
                                <input type="number" name="For_Otp" class="form-control"
                                    value="<?php echo $fet['for_otp']; ?>" placeholder="For Otp" />
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <!-- <label class="col-sm-6 ml-4 col-form-label">For Survey Form</label> -->
                            <div class="col-sm-9 form-align1">
                                <input type="text" name="surveyform" class="form-control"
                                    value="<?php echo $fet['for_survey_form']; ?>" placeholder="For Survey Form" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- <label class="col-sm-6 ml-4 col-form-label">For First time booking</label> -->
                            <div class="col-sm-9 form-align1">
                                <input type="text" name="firsttime-booking" class="form-control"
                                    value="<?php echo $fet['for_firsttime_booking']; ?>"
                                    placeholder="For First Time Booking" />
                            </div>
                        </div>



                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <button type="submit" name="editleadershipboard" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?php 
include "includes/footer.php"
?>