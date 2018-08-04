
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
function showDelete(nurse_name,nurse_id){
    $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.invisible_drop, .prompt_box').css('display', 'block');

    $('#users_name').html(nurse_name);
    $('#user_id').html(nurse_id);
}

$('#yes_btn').click(function () {
    var nurse_id = $('#user_id').html();

    $.ajax({
        url:"includes/deleteNurse.php",
        method:"post",
        data:{
            nurse_id :nurse_id
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshNurse.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#nurses').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.invisible_drop, .prompt_box').css('display', 'none');
    
        $('#users_name').html(name);
        $('#user_id').html(nurse_id);
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


// ====================================================UPDATE=================================================


function showUpdate(nu_name,nuId){
    $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.update_invisible_drop, .update_prompt_box').css('display', 'block');

    $('#users_name').html(nu_name);
    $('#user_id').html(nuId);

    $.ajax({
        url: "includes/fetchNurse.php",
        method: "POST",
        data: {nu_id: nuId},
        success: function (data) {
            details = JSON.parse(data);
            console.log(data);
            $("#fname_up").val(details['nu_firstname']);
            $("#lname_up").val(details['nu_lastname']);
            $("#uname_up").val(details['nu_username']);
            $("#pwd_up").val(details['nu_password']);
            $("#email_up").val(details['nu_email']);
            $("#gen_up").val(details['nu_gender']);
            $("#phone_up").val(details['nu_phone']);
            $("#address_up").val(details['nu_address']);
            
        }
    });
}


$('#submit').click(function () {
    var nu_id = $('#user_id').html();
    $.ajax({
        url:"includes/updateNurse.php",
        method:"post",
        data:{
            nu_id :nuId
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshNurse.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#nurse').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.update_invisible_drop, .update_prompt_box').css('display', 'none');
    
        $('#users_name').html(nu_name);
        $('#user_id').html(nu_id);
});



$('#x_btn').click(function () {
    close();
});


$('.update_invisible_drop').click(function () {
    close();
});

// alert(1);

function close() {
    $('.update_invisible_drop, .update_prompt_box').animate({ 'opacity': '0' }, 300, 'linear', function () {
        $('.update_invisible_drop, .update_prompt_box').css('display', 'none');
    });
}

