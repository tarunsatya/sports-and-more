<?php 
include "includes/header.php";
include "includes/sider.php";
include "includes/db.php";
include "includes/scripts.php";
?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">


            <div class="col-xl-12 col-lg-12">
                <div class="card main-car ">
                    <div class="card-header">
                        <h4 class="card-title">Manage Banner</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-padd">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Title Name</th>
                                        <th>Sub Title Name</th>
                                        <th>Image</th>

                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$game = mysqli_query($conn, "select * from tbl_banners where status='1'");
$no = 1;
while($fetch = mysqli_fetch_array($game)){
                                    ?>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <?php echo $fetch['title'];?>
                                        </td>
                                        <td>
                                            <?php echo $fetch['sub_title'];?>
                                        </td>
                                        <td>
                                            <img src="<?php echo $fetch['img_secure_url'];?>" alt="" class="img-r">
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="edit_banner.php?banners_edit_id=<?php echo $fetch['id'];?>"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="<?php $_SERVER['PHP_SELF']; ?>?banners_del_id=<?php echo $fetch['id'] ?>"
                                                    class="btn btn-danger shadow btn-xs sharp"><i
                                                        class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
}
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