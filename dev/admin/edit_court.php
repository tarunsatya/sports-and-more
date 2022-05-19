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
                <h4 class="card-title">Add Court</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <!-- <label class="col-sm-3 col-form-label">Email</label> -->
                            <div class="col-sm-9 form-align1">
                                <select class="form-control" placeholder="Select Ground name" name="ground_id"
                                    id="game_ground" onchange="fetch_select(this.value);">
                                    <option>Select Grounds</option>
       
                                    <?php
                                    $select=mysqli_query($conn,"select * from tbl_grounds order by gname");
                                    while($g_fetch=mysqli_fetch_array($select))
                                    {
                                    ?>
                                    <option value="<?php echo $g_fetch['ground_id'] ?>">
                                        <?php echo $g_fetch['gname'] ?>
                                    </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- <label class="col-sm-3 col-form-label">Email</label> -->
                            <div class="col-sm-9 form-align1">
                                <select class="form-control" placeholder="Select Ground name" name="game_id"
                                    id="game_id">
                                    <option>Select Games</option>
                                    <?php
                                    $select=mysqli_query($conn,"select * from tbl_game order by game_name");
                                    while($g_fetch=mysqli_fetch_array($select))
                                    {
                                    ?>
                                    <option value="<?php echo $g_fetch['id'] ?>">
                                    <?php echo $g_fetch['game_name'] ?>
                                </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- <label class="col-sm-3 col-form-label">Email</label> -->
                            <div class="col-sm-9 form-align1">
                                <input type="text" name="court_name" class="form-control" placeholder="Court Name" />
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-6 ml-4 col-form-label">Upload Ground Image</label>
                            <div class="col-sm-9 form-align1">
                                <input type="file" name="court_image" class="form-control" placeholder="Valid-till" />
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <button type="submit" name="edit_courts" class="btn btn-primary">
                                    Update
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