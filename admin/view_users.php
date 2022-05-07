<?php 
include "includes/header.php";
include "includes/sider.php";
include "includes/db.php";

?>

<div class="content-body">
    <div class="container-fluid">
        <div class="row">


            <div class="col-xl-12 col-lg-12">
                <div class="card main-car ">
                    <div class="card-header">
                        <h4 class="card-title">Manage Court</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-padd">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Mobile</th>
                                        <th>View Surveyform</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
$game = mysqli_query($conn, "select * from tbl_users");
$no = 1;
while($fetch = mysqli_fetch_array($game)){
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no; ?>

                                        </td>
                                        <td>
                                            <?php echo $fetch['user_name']; ?>

                                        </td>
                                        <td>
                                            <?php echo $fetch['user_email']; ?>

                                        </td>
                                        <td>
                                            <?php echo $fetch['user_mobile']; ?>
                                        </td>
                                        <td>
                                        <center> <a href=""class="btn btn-primary " data-toggle="modal" data-target="#modal_<?php echo $fetch['user_id']; ?>">View</a></center>
                                        </td>
                                        <td>
                                        <center><div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
</div></center>
                                        </td>
                                    </tr>
                                    <div id="modal_<?php echo $fetch['user_id'] ?>" class="modal fade" role="dialog">
			<div class="modal-dialog">
			    <div class="modal-content">
					<div class="modal-header">
						 <button type="button" class="close" data-dismiss="modal">&times;</button>
						    <h4 class="modal-title">Details</h4>
				    </div>
				    <div class="modal-body">
                    <?php $uid=$fetch['user_id'];
                    
                             $query2=mysqli_query($conn,"select * from tbl_survey a, tbl_survey2 b where a.user_id='".$uid."' and b.user_id='".$uid."'");
                             $fetch2=mysqli_fetch_array($query2);

                             $q_query1=mysqli_query($conn,"select * from tbl_surveyform where question_key='QUE_1'");
                             $que1=mysqli_fetch_array($q_query1);

                             $q_query2=mysqli_query($conn,"select * from tbl_surveyform where question_key='QUE_2'");
                             $que2=mysqli_fetch_array($q_query2);

                             $q_query3=mysqli_query($conn,"select * from tbl_surveyform where question_key='QUE_3'");
                             $que3=mysqli_fetch_array($q_query3);

                             $q_query4=mysqli_query($conn,"select * from tbl_surveyform where question_key='QUE_4'");
                             $que4=mysqli_fetch_array($q_query4);

                             $q_query5=mysqli_query($conn,"select * from tbl_surveyform where question_key='QUE_5'");
                             $que5=mysqli_fetch_array($q_query5);

                             $q_query6=mysqli_query($conn,"select * from tbl_surveyform where question_key='QUE_6'");
                             $que6=mysqli_fetch_array($q_query6);

                             $q_query7=mysqli_query($conn,"select * from tbl_surveyform where question_key='QUE_7'");
                             $que7=mysqli_fetch_array($q_query7);

                             $q_query8=mysqli_query($conn,"select * from tbl_surveyform where question_key='QUE_8'");
                             $que8=mysqli_fetch_array($q_query8);

                             $q_query9=mysqli_query($conn,"select * from tbl_surveyform where question_key='QUE_9'");
                             $que9=mysqli_fetch_array($q_query9);

                             $q_query10=mysqli_query($conn,"select * from tbl_surveyform where question_key='QUE_10'");
                             $que10=mysqli_fetch_array($q_query10);

                             $q_query11=mysqli_query($conn,"select * from tbl_surveyform where question_key='QUE_11'");
                             $que11=mysqli_fetch_array($q_query11);

                             $q_query12=mysqli_query($conn,"select * from tbl_surveyform where question_key='QUE_12'");
                             $que12=mysqli_fetch_array($q_query12);

                             ?>

                             <div class="card">
                                 <div class="container">
                                 <div class="row">
                                   
                                     <div class="col-12">
                                     <h5 class="survey-font"> <span> <b> 1) </b></span><?php echo $que1['survey_question']; ?></h5>
                                     <p><span><b>Ans.</b> </span> <?php echo $fetch2['QUE_1']; ?></p>
                                     <h5 class="survey-font"> <span> <b> 2) </b></span><?php echo $que2['survey_question']; ?></h5>
                                     <p><span><b>Ans.</b> </span>  <?php echo $fetch2['QUE_2']; ?></p>
                                     <h5 class="survey-font"> <span> <b> 3) </b></span><?php echo $que3['survey_question']; ?></h5>
                                     <p><span><b>Ans.</b> </span>  <?php echo $fetch2['QUE_3']; ?></p>
                                     <h5 class="survey-font"> <span> <b> 4) </b></span><?php echo $que4['survey_question']; ?></h5>
                                     <p><span><b>Ans.</b> </span>  <?php echo $fetch2['QUE_4']; ?></p>
                                     <h5 class="survey-font"> <span> <b> 5) </b></span><?php echo $que5['survey_question']; ?></h5>
                                     <p><span><b>Ans.</b> </span>  <?php echo $fetch2['QUE_5']; ?></p>
                                     <h5 class="survey-font"> <span> <b> 6) </b></span><?php echo $que6['survey_question']; ?></h5>
                                     <p><span><b>Ans.</b> </span>  <?php echo $fetch2['QUE_6']; ?></p>
                                     <h5 class="survey-font"> <span> <b>7) </b></span><?php echo $que7['survey_question']; ?></h5>
                                     <p><span><b>Ans.</b> </span>  <?php echo $fetch2['QUE_7']; ?></p>
                                     <h5 class="survey-font"> <span> <b>8) </b></span><?php echo $que8['survey_question']; ?></h5>
                                     <p><span><b>Ans.</b> </span>  <?php echo $fetch2['QUE_8']; ?></p>
                                     <h5 class="survey-font"> <span> <b>9) </b></span><?php echo $que9['survey_question']; ?></h5>
                                     <p><span><b>Ans.</b> </span>  <?php echo $fetch2['QUE_9']; ?></p>
                                     <h5 class="survey-font"> <span> <b>10) </b></span><?php echo $que10['survey_question']; ?></h5>
                                     <p><span><b>Ans.</b> </span>  <?php echo $fetch2['QUE_10']; ?></p>
                                     <h5 class="survey-font"> <span> <b>11) </b></span><?php echo $que11['survey_question']; ?></h5>
                                     <p><span><b>Ans.</b> </span>  <?php echo $fetch2['QUE_11']; ?></p>
                             



                                     </div>
                                    
                                    <div class="col-md-12">
                                        <div class="text-center">
                                        <h5>
                                           <span><b> Rating :</b></span> <?php $ans=$fetch2['Actual_Ans'] * (0.625); echo (round($ans));?>
                                        </h5>

                                        </div>
                                       
                                    </div>
                                 </div>
                                

                                 </div>
                              
                            
                              
                            
           

                             </div>
           
     
        
				    </div>
				</div>
			</div>
		</div>
                             <?php 

$no++;
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


<!-- /////modal-start/////// -->
<!-- Button trigger modal -->


<!-- Modal -->

<!-- /////////modal end/////// -->

<?php

?>
<div class="modal fade" id="modal_<?php echo $fetch2['user_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content modal-surveyform">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Surveyform Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <table class="table-modal">
       <tr>
           <th class="text-center">Sno</th>
           <th class="text-center">Question</th>
           <th class="text-center">Answer</th>
           <th class="text-center">Status</th>
       </tr>
       <tr>
           <td>
               1
           </td>
           <td>
           Were you already a customer before downloading the app?
           </td>
           <td>
           Yes I have been to you before
           </td>
           <td>
               True
           </td>
       </tr>
      </table>
    </div>
      </div>
     
    </div>
  </div>

<?php 
include "includes/footer.php";

?>
