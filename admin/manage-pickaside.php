<?php 
include "includes/header.php";
include "includes/sider.php";
include "includes/db.php";
include "includes/scripts.php"
?>

<div class="content-body">
    <div class="container-fluid">

        <div class="row">


            <div class="col-xl-12 col-lg-12">
                <div class="card main-car ">
                    <div class="card-header">
                        <h4 class="card-title">Manage Pickaside</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-padd">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Ground Name</th>
                                        <th>Game Name</th>
                                        <th>Court Name</th>
                                        <th>Count</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$game = mysqli_query($conn, "select * from pick_aside ");
$no = 1;
while($fetch = mysqli_fetch_array($game)){
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no; ?>

                                        </td>
                                        <td>
                                            <?php echo $fetch['ground_id']; ?>

                                        </td>
                                        <td>
                                            <?php echo $fetch['game_id']; ?>

                                        </td>
                                        <td>
                                            <?php echo $fetch['court_id']; ?>

                                        </td>
                                        <td>
                                            <?php echo $fetch['count']; ?>

                                        </td>
                                        <td>
                                            <div class=" d-flex">

                                                <a href="edit_court.php?court_id=<?php echo $fetch['court_id'];?>"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="<?php $_SERVER['PHP_SELF']; ?>?court_del_id=<?php echo $fetch['court_id']; ?>"
                                                    class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>

                                            </div>
                                        </td>
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