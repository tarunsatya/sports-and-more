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
                                <select name="gname" id="" class="form-control">
                                    <option value="">Select Courts</option>
                                    <?php
$grounds = mysqli_query($conn, "select * from tbl_court where court_status=1");
while($fet = mysqli_fetch_array($grounds)){
?>
                                    <option value="<?php echo $fet['court_id']; ?>"><?php echo $fet['court_name']; ?></option>

                                    <?php
}
?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row justify-content-center">
                            <!-- <div class="w-100">
                                <label class="col-sm-3 col-form-label">Game name</label>
                            </div> -->
                            <!-- <label class="col-sm-6 ml-4 col-form-label">Add slot</label> -->
                            <div class="col-sm-9 ">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class=" mt-1 mb-2">
                                                <h6> Time Slot</h6>

                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="9:00 am" name="hours[]">
                                                        <input class="b-none" type="text"value="9:00"
                                                            id="option1" readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="9:30 am" name="hours[]">
                                                        <input class="b-none" type="text"value="9:30"
                                                            id="option1" readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="10:00 am" name="hours[]">
                                                        <input class="b-none" type="text"value="10:00"
                                                            id="" readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="10:30 am" name="hours[]">
                                                        <input class="b-none" type="text"value="10:30"
                                                            id="" readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="11:00 am" name="hours[]">
                                                        <input class="b-none" type="text" value="11:00" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="11:30 am" name="hours[]">
                                                        <input class="b-none" type="text" value="11:30" id=""
                                                            readonly>
                                                    </div>
                                                </div>
                                                <div>
                                                <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="12:00 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="12:00" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="12:30 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="12:30" id=""
                                                            readonly>
                                                    </div>
                                                   <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="1:00 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="1:00" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="1:30 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="1:30" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="2:00 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="2:00" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="2:30 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="2:30" id=""
                                                            readonly>
                                                    </div>
                                                   
                                                    
                                                </div>
                                                <div>
                                                <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="3:00 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="3:00" id=""
                                                            readonly>
                                                    </div>
                                                <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="3:30 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="3:30" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="4:00 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="4:00" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="4:30 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="4:30" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="5:00 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="5:00" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="5:30 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="5:30" id=""
                                                            readonly>
                                                    </div>
                                                   
                                                </div>
                                                <div>
                                                <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="6:00 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="6:00" id=""
                                                            readonly>
                                                    </div>
                                                   
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="6:30 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="6:30" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="7:00 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="7:00" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="7:30 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="7:30" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="8:00 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="8:00" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="8:30 pm" name="hours[]">
                                                        <input class="b-none" type="text" value="8:30" id=""
                                                            readonly>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-6">
                                        <div class="card">
                                            <div class=" mt-1 mb-2">
                                                <h6>Half an hour Slot</h6>

                                            </div>
                                            <div class="d-flex ">
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="9:30" name="minutes[]">
                                                        <input class="b-none" type="text"  value="9:30" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="10:30" name="minutes[]">
                                                        <input class="b-none" type="text" value="10:30" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="11:30" name="minutes[]">
                                                        <input class="b-none" type="text" value="11:30" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="12:30"  name="minutes[]">
                                                        <input class="b-none" type="text" value="12:30" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="1:30" name="minutes[]">
                                                        <input class="b-none" type="text" value="1:30" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="2:30" name="minutes[]">
                                                        <input class="b-none" type="text" value="2:30" id=""
                                                            readonly>
                                                    </div>

                                                </div>
                                                <div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="3:30" name="minutes[]">
                                                        <input class="b-none" type="text" value="3:30" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="4:30" name="minutes[]">
                                                        <input class="b-none" type="text" value="4:30" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="5:30" name="minutes[]">
                                                        <input class="b-none" type="text" value="5:30" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="6:30" name="minutes[]">
                                                        <input class="b-none" type="text" value="6:30" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="7:30" name="minutes[]">
                                                        <input class="b-none" type="text" value="7:30" id=""
                                                            readonly>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <input type="checkbox" value="8:30" name="minutes[]">
                                                        <input class="b-none" type="text" value="8:30" id=""
                                                            readonly>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div> -->





                                </div>


                                <!--<input type="time" name="slot" class="form-control" placeholder="Add time" />-->
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- <div class="w-100">
                                <label class="col-sm-3 col-form-label">Game name</label>
                            </div> -->
                            <!-- <label class="col-sm-6 ml-4 col-form-label">date</label> -->
                            <div class="col-sm-9 form-align">
                                <input type="date" name="slot_date" class="form-control" placeholder="Add date" />

                            </div>
                        </div>
                    
                        <div class="mb-3 row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary" name="add_time_slot" id="add_prod">
                                    Add Slots
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
// click handler
function onClick(event) {
    var titles = $('input[name^=titles]').map(function(idx, elem) {
        return $(elem).val();
    }).get();
    $("#show1").val(titles);
    console.log(titles);
    event.preventDefault();
}

// attach button click listener on dom ready
$(function() {
    $('#arry').click(onClick);
});
</script>
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
});
</script>


<!-- <script>
$(document).ready(function() {
    $('#check1').click(function() {
        if ($(this).is(":checked")) {
            let values = $("input[name='tname[]']").map(function() {
                return $(this).val();
            }).get();
            // let str = $("#option1").val();
            $("#show1").val(values);

        }
    });
});

var values = $("input[name='pname[]']")
    .map(function() {
        return $(this).val();
    }).get();
</script> -->




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