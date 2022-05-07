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
                <h4 class="card-title">Add Ground</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3 row">
                            <!-- <label class="col-sm-3 col-form-label">Email</label> -->
                            <div class="col-sm-9 form-align1">
                                <input type="text" name="gname" class="form-control" placeholder="Ground Name" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- <label class="col-sm-3 col-form-label">Email</label> -->
                            <div class="col-sm-9 form-align1">
                                <input type="text" name="gloc" class="form-control" placeholder="Add Location" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- <label class="col-sm-3 col-form-label">Email</label> -->
                            <div class="col-sm-9 form-align1">
                                <input type="text" name="gaddr" class="form-control" placeholder="Add Address" />
                            </div>
                        </div>
 
                        <div class="mb-3 row">
                            <label class="col-sm-6 ml-4 col-form-label">Upload Ground Image1</label>
                            <div class="col-sm-9 form-align1">
                                <input type="file" name="img1" class="form-control" placeholder="" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-6 ml-4 col-form-label">Upload Ground Image2</label>
                            <div class="col-sm-9 form-align1">
                                <input type="file" name="img2" class="form-control" placeholder="Valid-till" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-6 ml-4 col-form-label">Upload Ground Image3</label>
                            <div class="col-sm-9 form-align1">
                                <input type="file" name="img3" class="form-control" placeholder="Valid-till" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-6 ml-2 col-form-label">Upload Game Icon</label>

                            <div class="col-sm-9 form-align1">
                                <input type="file" name="gicon" class="form-control" placeholder="" />
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <button type="submit" name="add-ground" class="btn btn-primary">
                                    Add ground
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
