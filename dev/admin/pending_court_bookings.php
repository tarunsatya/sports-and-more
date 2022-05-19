<?php 
include "includes/header.php";
include "includes/sider.php";
include "includes/db.php";
?>
<style>
.bt-sp {
    background-color: #005fff !important;
    border: 0;
    cursor: default !important;
}
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">


            <div class="col-xl-12 col-lg-12">
                <div class="card main-car ">
                    <div class="card-header">
                        <h4 class="card-title">Court Bookings</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-padd">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Game Name</th>
                                        <th>Player Name</th>
                                        <th>Ground Name</th>
                                        <th>Court Name</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     $getcourtbook = mysqli_query($conn,"select * from court_booking a,tbl_game b, tbl_grounds c,tbl_users d, tbl_court e where a.game_id=b.id && a.ground_id=c.ground_id && a.court_id=e.court_id && a.status=1 && d.user_id=a.user_id order by a.booking_id DESC");
// $query = mysqli_query($conn, "select * from court_booking where status='1'");
// $query3=mysqli_query($conn, "select * from tbl_game where g_ground ='".$fetchSurvey['ground_id']."' and id='".$fetchSurvey['game_id']."'");
// $query4=mysqli_query($conn, "select * from tbl_court where ground_id ='".$fetchSurvey['ground_id']."' and game_id='".$fetchSurvey['game_id']."' and court_id='".$fetchSurvey['court_id']."'");
// $fetchSurvey3 = mysqli_fetch_array($query3);
// $fetchSurvey4 = mysqli_fetch_array($query4);

$no = 1;
while($fetch = mysqli_fetch_array($getcourtbook)){
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no; 
                                            $query2=mysqli_query($conn, "select * from tbl_grounds where ground_id='".$fetch['ground_id']."'");
                                            $fetchSurvey2 = mysqli_fetch_array($query2);
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $fetch['game_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fetch['user_name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fetch['gname']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fetch['court_name']; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="edit-game.php?games_id=<?php echo $fetch['id'];?>"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="includes/scripts.php?g-id=<?php echo $fetch['id']; ?>"
                                                    class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a> &nbsp;
                                                <span class="btn btn-primary shadow btn-xs sharp bt-sp">
                                                    <?php if($fetch['status']==0) { echo'<i class="fa fa-remove"></i>';} else { echo '<i class="fa fa-check"></i>';} ?></span>
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