<?php 
include "includes/header.php";
include "includes/sider.php";
include "includes/db.php";
include "includes/scripts.php";
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
                        <h4 class="card-title">Manage Game</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-padd">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Game Name</th>
                                        <th>Image</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$game = mysqli_query($conn, "select * from tbl_game");
$no = 1;
while($fetch = mysqli_fetch_array($game)){
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no; ?>
                                        </td>
                                        <td>
                                            <?php echo $fetch['game_name']; ?>
                                        </td>
                                        <td>
                                            <img src="<?php echo $fetch['image']; ?>" alt="" class="img-r">
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="edit-game.php?games_id=<?php echo $fetch['id'];?>"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="<?php $_SERVER['PHP_SELF']; ?>?g-id=<?php echo $fetch['id']; ?>"
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