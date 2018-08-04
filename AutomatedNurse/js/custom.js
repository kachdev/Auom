$(document).ready(function() {
    $("#sect2").css("display", "none");
    $("#sect3").css("display", "none");


    $("#one").click(function() {
        setTimeout(function() {
            $("#sect1").css("display", "none");
        });
        
        $("#sect2").css("display", "block");
        
    });

    $("#two").click(function () {
        $("#sect2").css("display", "none");
        $("#sect3").css("display", "block");
    });
   
    $("#hide").css("display","none");


    $("#outpatient").blur(function () {
        $("#hide").css("display","none");
    })


    $("#register-alert").click(function () {
        $('.backdrop, .box').animate({'opacity':'1'}, 300, 'linear');
        $('.backdrop, .box').css('display','block');
    });


    

});

$("#display2").css("display","none");
$("#tab-hide2").css("display","none");


$("#tab1").click(function () {
    $("#display1").css("display","none");
    $("#display2").css("display","block");
    $("#tab-hide1").css("display","none");
    $("#tab-hide2").css("display","block");
});
$("#tab2").click(function () {
    $("#display1").css("display","none");
    $("#display2").css("display","block");
    $("#tab-hide2").css("display","flex");
    $("#tab-hide1").css("display","none");
});
close();

