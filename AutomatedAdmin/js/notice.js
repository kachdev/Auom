
$("#display2").css("display","none");
$("#tab-hide2").css("display","none");


$("#tab1").click(function (e) {
    e.preventDefault();
    $("#display1").css("display","none");
    $("#tab-hide1").css("display","none");
    $("#display2").css("display","block");
    $("#tab-hide2").css("display","block");
});

$("#tab2").click(function (e) {
    e.preventDefault();
    $("#display1").css("display","none");
    $("#tab-hide1").css("display","none");
    $("#display2").css("display","block");
    $("#tab-hide2").css("display","flex");
    
});

//==========================================================================================

//DELETE NURSE
function showDelete(notice_name,notice_id){
    $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.invisible_drop, .prompt_box').css('display', 'block');

    $('#users_name').html(notice_name);
    $('#user_id').html(notice_id);
}

$('#yes_btn').click(function () {
    var notice_id = $('#user_id').html();

    $.ajax({
        url:"includes/deleteNotice.php",
        method:"post",
        data:{
            notice_id :notice_id
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshNotice.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#notice').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.invisible_drop, .prompt_box').css('display', 'none');
    
        $('#users_name').html(notice_name);
        $('#user_id').html(notice_id);
});

$('#no_btn').click(function () {
    close();
});



$('.invisible_drop').click(function () {
    close();
});

// alert(1);

function close() {
    $('.invisible_drop, .prompt_box').animate({ 'opacity': '0' }, 300, 'linear', function () {
        $('.invisible_drop, .prompt_box').css('display', 'none');
    });
}

