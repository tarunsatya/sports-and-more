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
                <h4 class="card-title">Add times</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="post" enctype="multipart/form-data" id="">
                        <div class="mb-3 row">
                            <!-- <div class="w-100">
                                <label class="col-sm-3 col-form-label">Game name</label>
                            </div> -->
                            <div class="col-sm-9 form-align">
                                <select name="gname" id="s_grnd" class="form-control">
                                    <option value="">Select ground</option>
                                    <?php
$grounds = mysqli_query($conn, "select * from tbl_grounds where status=1");
while($fet = mysqli_fetch_array($grounds)){
?>
                                    <option value="<?php echo $fet['id']; ?>"><?php echo $fet['gname']; ?></option>

                                    <?php
}
?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- <div class="w-100">
                                <label class="col-sm-3 col-form-label">Game name</label>
                            </div> -->
                            <div class="col-sm-9 form-align">
                                <div>
                                    <label for="">Select times</label>
                                </div>
                                <div class="row" id="slot_id">

                                    <!-- <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">06.00AM - 07.00AM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="1"
                                                        name="one">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div> -->
                                    <!-- <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">07.00AM - 08.00AM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="2"
                                                        name="two">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div> -->
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">08.00AM - 09.00AM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="3"
                                                        name="three">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">09.00AM - 10.00AM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="4"
                                                        name="four">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">10.00AM - 11.00AM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="5"
                                                        name="five">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">11.00AM - 12.00PM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="6"
                                                        name="six">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">12.00PM - 01.00PM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="7"
                                                        name="seven">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">01.00PM - 02.00PM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="8"
                                                        name="eight">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">02.00PM - 03.00PM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="9"
                                                        name="nine">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">03.00PM - 04.00PM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="10"
                                                        name="ten">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">04.00PM - 05.00PM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="11"
                                                        name="eleven">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">05.00PM - 06.00PM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="12"
                                                        name="twelve">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">06.00PM - 07.00PM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="13"
                                                        name="thirteen">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">07.00PM - 08.00PM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="14"
                                                        name="fourteen">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">08.00PM - 09.00PM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="15"
                                                        name="fifteen">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">09.00PM - 10.00PM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="16"
                                                        name="sixteen">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">10.00PM - 11.00PM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="17"
                                                        name="seventeen">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">11.00PM - 12.00AM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="18"
                                                        name="eighteen">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">12.00AM - 01.00AM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="19"
                                                        name="ninteen">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">01.00AM - 02.00AM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="20"
                                                        name="twenty">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">02.00AM - 03.00AM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="21"
                                                        name="twentyone">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">03.00AM - 04.00AM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="22"
                                                        name="twentytwo">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">04.00AM - 05.00AM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="23"
                                                        name="twentythree">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex time-box">

                                            <div class="mtop-5">
                                                <label for="">05.00AM - 06.00AM</label>
                                            </div>
                                            <div class="mtop-5">
                                                <label>
                                                    <input type="checkbox" class="default__check switchbox" value="24"
                                                        name="twentyfour">
                                                    <span class="custom__check"></span>

                                                </label>
                                            </div>


                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" name="add_time" id="add_prod">
                                    Add times
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


<script>
$(document).ready(function() {

    $("#s_grnd").change(function() {
        let value = $("#s_grnd option:selected").val();
        $.ajax({
            type: "post",
            url: "ajax/fetch_slots.php",
            data: {
                id: value
            },

            success: function(snt) {
                // $("#slot_id").html(snt);
                console.log(snt);
            }

        })

    });
});
</script>

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