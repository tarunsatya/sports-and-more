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
                        <h4 class="card-title">Manage Grounds</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-padd">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Ground Name</th>
 
                                        <th>Ground Address</th>
                                        <th>Ground Img</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$ground = mysqli_query($conn, "select * from tbl_grounds where status=1");
$no =1;
while($fet = mysqli_fetch_array($ground)){
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no;  ?>
                                        </td>
                                        <td>
                                            <?php echo $fet['gname']; ?>
                                        </td>
                                        
                                        <td>
                                            <?php echo $fet['gaddress']; ?>
                                        </td>
                                        <td>
                                            <img src="<?php echo $fet['img1']; ?>" alt="" class="img-r">
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="edit-ground.php?edit_ground=<?php echo $fet['ground_id']; ?>"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fas fa-pencil-alt"></i></a>
                                                <a href="<?php $_SERVER['PHP_SELF']; ?>?del_ground_id=<?php echo $fet['ground_id']; ?>"
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