<?php 
include "includes/header.php";
include "includes/sider.php";
include "includes/db.php";
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">


            <div class="col-xl-12 col-lg-12">
                <div class="card main-car ">
                    <div class="card-header">
                        <h4 class="card-title">Survey Deatils</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-padd">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Users Name</th>
                                        <th>Details</th>
                                        <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$survey = mysqli_query($conn, "select * from tbl_survey1 INNER JOIN tbl_survey2 ON tbl_survey1.id = tbl_survey2.matching_id where tbl_survey1.status=1");
$no =1;
while($fet = mysqli_fetch_array($survey)){
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no; ?>
                                        </td>
                                        <td>
                                            <?php echo $fet['users_name']; ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" data-toggle="modal"
                                                data-target="#staticBackdrop<?php echo $fet['id']; ?>">View</button>

                                        </td>

                                        <td>
                                            <div class="btn btn-primari">Active</div>
                                            <div class="btn btn-danger">IN Active</div>
                                        </td>
                                        <div class="modal fade" id="staticBackdrop<?php echo $fet['id']; ?>"
                                            data-backdrop="static" data-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div
                                                class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="staticBackdrop<?php echo $fet['id']; ?>">
                                                            Survey Info:
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true" class="x-cls">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">Were u already a customer before
                                                                        downloading the app?</p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">
                                                                        <?php echo $fet['already_a_customer']; ?></p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">How old are you</p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">
                                                                        <?php echo $fet['how_old_r_u']; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">Select gender</p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">
                                                                        <?php echo $fet['gender']; ?></p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">What are the Sports you practise or
                                                                        the you would like to follow, where would you
                                                                        like to be always updated</p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">
                                                                        <?php echo $fet['sports_prtc']; ?>
                                                                    </p>
                                                                </div>

                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">Would you like to be notified when
                                                                        promotions and subscriptions for these activites
                                                                        will be availble
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">
                                                                        <?php echo $fet['prmtns_subscriptns']; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">Would you like to participate in the
                                                                        padel ranking on our circuit, can you have the
                                                                        oppurtunity to obtain promotional discounts and
                                                                        or prizes offered by the sports center
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">
                                                                        <?php echo $fet['padel_ranking']; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">Find out what your level is to test
                                                                        yourself on our internal ranking</p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">
                                                                        <?php echo $fet['internet_ranking']; ?></p>
                                                                </div>

                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">How often do you play sports during
                                                                        the week</p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">
                                                                        <?php echo $fet['play_sprts_week']; ?></p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">If you had to rate your fitness
                                                                        status, what would it be? </p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">
                                                                        <?php echo $fet['fitnesstatus']; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">Have you played racket sports in the
                                                                        past?</p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">
                                                                        <?php echo $fet['racket_sports']; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">How many games per week have you
                                                                        played on average in the last 6 months</p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">
                                                                        <?php echo $fet['gamesperweek']; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">Have you ever taken private lessons?
                                                                    </p>
                                                                </div>
                                                                <div class="col-md-6 pd-0">
                                                                    <p class="p-md">
                                                                        <?php echo $fet['pvt_lessons']; ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>





                                    <?php
                                    $no++;}
                                    ?>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>






<?php 
include "includes/footer.php"
?>