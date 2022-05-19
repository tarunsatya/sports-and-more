<?php 
include "includes/header.php";
?>
<?php 
include "includes/sider.php";
include "includes/scripts.php"
?>


<div class="row mt-130">
    <div class="col-xl-4 col-lg-12">
    </div>

    <div class="col-xl-6 col-lg-8 justify-content-center">
        <div class="card main-car">
            <div class="card-header justify-content-center">
                <h4 class="card-title">Add Game</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="post" enctype="multipart/form-data" id="">
                        <div class="mb-3 row">
                            <!-- <div class="w-100">
                                <label class="col-sm-3 col-form-label">Game name</label>
                            </div> -->
                             <div class="col-sm-9 form-align">
                                <select class="form-control" placeholder="Select Ground name" name="ground_name"
                                    id="game_ground">
                                    <option>Select Ground</option>
                                    <?php
                                    $select=mysqli_query($conn,"select * from tbl_grounds order by gname");
                                    while($g_fetch=mysqli_fetch_array($select))
                                    {
                                    ?>
                                    <option value="<?php echo $g_fetch['ground_id'] ?>"><?php echo $g_fetch['gname'] ?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                <p id="prod_name_err" class="p-sty"></p>
                            </div>
                            <div class="col-sm-9 form-align">
                                <input type="text" class="form-control" placeholder="Enter Game name" name="game_name"
                                    id="prod_name" />
                                <p id="prod_name_err" class="p-sty"></p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="w-100">
                                <label class="col-sm-5 col-form-label">Add game image</label>
                            </div>
                            <div class="col-sm-9 form-align1">

                                <input type="file" class="form-control" placeholder="Upload Image" name="game_img"
                                    id="prod_img3" />
                                <p id="img3_err" class="p-sty"></p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" name="add_game" id="add_prod">
                                    Add Game
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