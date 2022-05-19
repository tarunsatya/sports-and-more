<?php 
include "includes/header.php";
?>
<?php 
include "includes/sider.php";
include "includes/scripts.php"
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
    <?php
    $game = mysqli_query($conn, "select * from tbl_banners where id='".$_GET['banners_edit_id']."'");
     $fetch = mysqli_fetch_array($game);

    ?>
    <div class="col-xl-6 col-lg-8 justify-content-center">
        <div class="card main-car">
            <div class="card-header justify-content-center">
                <h4 class="card-title">Add Banner</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="post" enctype="multipart/form-data" id="">
                        <div class="mb-3 row">
                            <!-- <label class="col-sm-3 col-form-label">Email</label> -->
                            <div class="col-sm-9 form-align">
                                <input type="text" class="form-control" placeholder="Enter Title name"
                                    value="<?php echo $fetch['title'] ?>" name="title" id="prod_name" />
                                <p id="prod_name_err" class="p-sty"></p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- <label class="col-sm-3 col-form-label">Email</label> -->
                            <div class="col-sm-9 form-align">
                                <input type="text" class="form-control" placeholder="Enter Sub Title name"
                                    name="sub_title" id="prod_name" value="<?php echo $fetch['sub_title'] ?>" />
                                <p id="prod_name_err" class="p-sty"></p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-5 col-form-label">Add Icon</label>
                            <div class="col-sm-9 form-align1">
                                <input type="hidden" name="ban_img" value="<?php echo $fetch['img_secure_url'] ?>">
                                <input type="file" class="form-control" placeholder="Upload Image3" name="ban_img"
                                    id="prod_img3" />
                                <p id="img3_err" class="p-sty"></p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" name="edit_ban" id="add_prod">
                                    Add
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