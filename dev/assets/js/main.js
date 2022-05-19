// const { HighlightSpanKind } = require("typescript");

$("#badminton").click(function() {
    $("#badminton").toggleClass("highlightgame");
})

$('#cricket').click(function () {
    $("#cricket").toggleClass("highlightgame");
    
})
$('#timeslot').click(function () {
    $("#timeslot").toggleClass("highlightgame");
    
})
// dropdown for aside


$("#ring_contents li a").click(function() {
    $("#ringTabDrop").text('Ring size Format: ' + $(this).text());
});

// /upload profile
// $(document).ready(function() {

    
//     var readURL = function(input) {
//         if (input.files && input.files[0]) {
//             var reader = new FileReader();

//             reader.onload = function (e) {
//                 $('.profile-pic').attr('src', e.target.result);
//             }
    
//             reader.readAsDataURL(input.files[0]);
//         }
//     }
    

//     $(".file-upload").on('change', function(){
//         readURL(this);
//     });
    
//     $(".upload-button").on('click', function() {
//        $(".file-upload").click();
//     });
// });
// ////////
// on click profile upload

$(document).ready(function() {

    
    // var readURL = function(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();

    //         reader.onload = function (e) {
    //             $('.profile-pic').attr('src', e.target.result);
    //         }
    
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }
    

    // $(".file-upload").on('change', function(){
    //     readURL(this);
    // });
    
    
    
});



// end profile upload
