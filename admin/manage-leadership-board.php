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
                        <h4 class="card-title">Manage Leader Ship board</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-padd">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>For Otp</th>
                                        <th>For Survey Form</th>
                                        <th>For First time booking</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php 
                                $board = mysqli_query($conn, "select * from leadership_board where status=1");
                                $no = 1;
                                while($fet = mysqli_fetch_array($board)){
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no; ?>
                                        </td>
                                        <td>
                                            <?php echo $fet['for_otp']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fet['for_survey_form']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fet['for_firsttime_booking']; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="edit-leadership-board.php?id=<?php echo $fet['id']; ?>"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="includes/scripts.php?b-id=<?php echo $fet['id']; ?>"
                                                    class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                               $no++; }?>
                                    <!-- <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>
                                            Volleyball Tournment
                                        </td>
                                        <td>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque quas
                                            molestias fuga.
                                        </td>
                                        <td>
                                            <img src="images/contacts/c3.jpg" alt="" class="img-r">
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="includes/scripts.php?products_del_id=3"
                                                    class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td>
                                            Volleyball Tournment
                                        </td>
                                        <td>
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque quas
                                            molestias fuga.
                                        </td>
                                        <td>
                                            <img src="images/contacts/c3.jpg" alt="" class="img-r">
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="" class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="includes/scripts.php?products_del_id=3"
                                                    class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr> -->

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