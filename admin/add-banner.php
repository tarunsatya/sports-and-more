<?php 

include "includes/header.php";

include "includes/sider.php";

include "includes/scripts.php"
// error_reporting(-1);
// ini_set('display_errors', true);

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
                                <input type="text" class="form-control" placeholder="Enter Title name" name="title"
                                    id="prod_name" />
                                <p id="prod_name_err" class="p-sty"></p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- <label class="col-sm-3 col-form-label">Email</label> -->
                            <div class="col-sm-9 form-align">
                                <input type="text" class="form-control" placeholder="Enter Sub Title name"
                                    name="sub_title" id="prod_name" />
                                <p id="prod_name_err" class="p-sty"></p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-5 col-form-label">Add Icon</label>
                            <div class="col-sm-9 form-align1">

                                <input type="file" class="form-control" placeholder="Upload Image3" name="ban_img"
                                    id="prod_img3" />
                                <p id="img3_err" class="p-sty"></p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" name="add_ban" id="add_prod">
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

<!-- <script>
$(document).ready(function() {
    $("#add_product").submit(function(e) {

        let prod_name = $("#prod_name").val();
        let category = $("#prod_cat").val();
        let price = $("#prod_price").val();
        let Strike_price = $("#prod_strike_price").val();
        let quantity = $("#prod_qnty").val();
        let service = $("#ser_type").val();
        let store = $("#store_type").val();
        let img1 = $("#prod_img1").val();
        let img2 = $("#prod_img2").val();
        let img3 = $("#prod_img3").val();
        let img4 = $("#prod_img4").val();
        let description = $("#prod_description").val();

        if (prod_name == '') {
            $("#prod_name_err").text('This Feild is Required *');
        } else if (category == '') {
            $("#cat_err").text('This feild is Required *');
        } else if (price == '') {
            $("#price_err").text('This feild is Required *');
        } else if (Strike_price == '') {
            $("#strike_err").text('This feild is Required *');
        } else if (quantity == '') {
            $("#auan_err").text('This feild is Required *');

        } else if (service == '') {
            $("#ser_type_err").text('This feild is Required *');

        } else if (store == '') {
            $("#st_type_err").text('This feild is Required *');

        } else if (img1 == '') {
            $("#img1_err").text('This feild is Required *');

        } else if (img2 == '') {
            $("#img2_err").text('This feild is Required *');

        } else if (img3 == '') {
            $("#img3_err").text('This feild is Required *');

        } else if (img4 == '') {
            $("#img4_err").text('This feild is Required *');

        } else if (description = '') {
            $("#desc_err").text('This feild is Required *');

        } else {

        }

    })
})
</script> -->