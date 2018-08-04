
    
// $("#display2").css("display","none");
// $("#tab-hide2").css("display","none");


// $("#vTab1").click(function () {
//     // $("#display1").css("display","none");
//     // $("#display2").css("display","block");
//     // $("#tab-hide1").css("display","none");
//     // $("#tab-hide2").css("display","block");

//     $("#tab-hide1").css("display","block");
//     $("#display1").css("display","block");
//     $("#tab-hide2").css("display","none");
// });

// $("#vTab2").click(function () {
//     // $("#display1").css("display","none");
//     // $("#display2").css("display","block");
//     // $("#tab-hide2").css("display","flex");
//     // $("#tab-hide1").css("display","none");

//     $("#tab-hide1").css("display","block");
//     $("#tab-hide2").css("display","none");
// });




$("#display2").css("display","none");
$("#tab-hide2").css("display","none");


$("#tab1").click(function () {
    $("#display1").css("display","none");
    $("#tab-hide1").css("display","none");
    $("#display2").css("display","block");
    $("#tab-hide2").css("display","block");
});

$("#tab2").click(function () {
    $("#display1").css("display","none");
    $("#tab-hide1").css("display","none");
    $("#display2").css("display","block");
    $("#tab-hide2").css("display","flex");
    
});



// $(".delbtn").click(function(){
//     $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
//     $('.invisible_drop, .prompt_box').css('display', 'block');
// })

$('.invisible_drop').click(function () {
    close();
});

// alert(1);

function close() {
    $('.invisible_drop, .prompt_box').animate({ 'opacity': '0' }, 300, 'linear', function () {
        $('.invisible_drop, .prompt_box').css('display', 'none');
    });
}




//===========================================================================================================

//INSERT DEPARTMENT

// $('#submit').click(function () {

//     $.ajax({
//         url:"includes/insertDepartment.php",
//         method:"post",
//         data:{
//             id :id
//         },
//         success:function(data) {
//             $('#success').html(data);

//             $.ajax({
//                 url:"includes/refreshDepartment.php",
//                 method:"post",
//                 data:"",
//                 success:function (data) {
//                     $('#departments').html(data);
//                 }

//             })
//         },
//         error:function (data){
            
//         },
//     }); 
// })













// close();


    // $('#submit').click(function(event){
    //     event.preventDefault();
    //     $.ajax({
    //         url: "includes/insertDoctor.php",
    //         method: "POST",
    //         data: $('form').serialize(),
    //         dataType: "text",
    //         success: function(strMessage){
    //             $('#message').text(strMessage)
                
    //         }
            
    //     })
        
        
        
    // })




    


// alert(1);