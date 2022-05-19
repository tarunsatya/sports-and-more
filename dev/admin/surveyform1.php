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
                <h4 class="card-title">Survey Form</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form method="post" enctype="multipart/form-data" id="">
                        <div class="mb-3 row">
                            <!-- <div class="w-100">
                                <label class="col-sm-3 col-form-label">Game name</label>
                            </div> -->
                            <div class="col-sm-9 form-align">
                                <select id="" class="form-control input_survy" name="selectedsurvey">
                                    <option value="Select">Select Survey Form</option>
                                    <option value="1">Survey Form 1</option>
                                    <option value="2">Survey Form 2</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- <div class="w-100">
                                <label class="col-sm-3 col-form-label">Game name</label>
                            </div> -->
                            <!-- <label class="col-sm-6 ml-4 col-form-label">Add slot</label> -->
                            <div class="col-sm-9 form-align1 d-flex">

                                <input type="text" name="question" class="form-control input_survy" value=""
                                    placeholder="Question" id="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- <div class="w-100">
                                <label class="col-sm-3 col-form-label">Game name</label>
                            </div> -->
                            <!-- <label class="col-sm-6 ml-4 col-form-label">Add slot</label> -->
                            <div class="col-sm-9 form-align1 d-flex">
                                <input type="checkbox" class="check_survy" id="check1">
                                <input type="text" name="optiona" class="form-control input_survy" value=" "
                                    placeholder="Option A" id="option1" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- <div class="w-100">
                                <label class="col-sm-3 col-form-label">Game name</label>
                            </div> -->
                            <!-- <label class="col-sm-6 ml-4 col-form-label">Add slot</label> -->
                            <div class="col-sm-9 form-align1 d-flex">
                                <input type="checkbox" class="check_survy" id="check2">
                                <input type="text" name="optionb" class="form-control input_survy" value=" "
                                    placeholder="Option B" id="option2" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- <div class="w-100">
                                <label class="col-sm-3 col-form-label">Game name</label>
                            </div> -->
                            <!-- <label class="col-sm-6 ml-4 col-form-label">Add slot</label> -->
                            <div class="col-sm-9 form-align1 d-flex">
                                <input type="checkbox" class="check_survy" id="check3">
                                <input type="text" name="optionc" class="form-control input_survy" value=" "
                                    placeholder="Option C" id="option3" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- <div class="w-100">
                                <label class="col-sm-3 col-form-label">Game name</label>
                            </div> -->
                            <!-- <label class="col-sm-6 ml-4 col-form-label">Add slot</label> -->
                            <div class="col-sm-9 form-align1 d-flex">
                                <input type="checkbox" class="check_survy" id="check4">
                                <input type="text" name="optiond" class="form-control input_survy" value=" "
                                    placeholder="Option D" id="option4">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-9">

                                <div>
                                    <input type="hidden" id="show1" name="correct_answer">

                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" name="add_survy" id="add_survey">
                                    Submit
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
    $('#check1').click(function() {
        if ($(this).is(":checked")) {
            let str = $("#option1").val();
            $("#show1").val(str);
            $("#show1").show();
        } else {
            $("#show1").hide();
        }
    });
    $('#check2').click(function() {
        if ($(this).is(":checked")) {
            let str = $("#option2").val();
            $("#show1").val(str);
            $("#show1").show();
        } else {
            $("#show1").hide();
        }
    });
    $('#check3').click(function() {
        if ($(this).is(":checked")) {
            let str = $("#option3").val();
            $("#show1").val(str);
            $("#show1").show();
        } else {
            $("#show1").hide();
        }
    });
    $('#check4').click(function() {
        if ($(this).is(":checked")) {
            let str = $("#option4").val();
            $("#show1").val(str);
            $("#show1").show();
        } else {
            $("#show1").hide();
        }
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