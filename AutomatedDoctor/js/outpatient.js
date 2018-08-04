//=============================================================================================================

//DOCTOR 

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



function showDelete(outp_name,outp_id){
    $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.invisible_drop, .prompt_box').css('display', 'block');

    $('#users_name').html(outp_name);
    $('#user_id').html(outp_id);
}

$('#yes_btn').click(function () {
    var outp_id = $('#user_id').html();
    $.ajax({
        url:"includes/deleteOutpatient.php",
        method:"post",
        data:{
            outp_id :outp_id
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshOutpatient.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#outpatient').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.invisible_drop, .prompt_box').css('display', 'none');
    
        $('#users_name').html(outp_name);
        $('#user_id').html(outp_id);
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


function showUpdate(outp_name,outpId){
    $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.update_invisible_drop, .update_prompt_box').css('display', 'block');

    $('#users_name').html(outp_name);
    $('#user_id').html(outpId);

    $.ajax({
        url: "includes/fetchOutpatient.php",
        method: "POST",
        data: {outp_id: outpId},
        success: function (data) {
            details = JSON.parse(data);
            console.log(data);
            $("#outp_id").val(details['OutpatientID']);
            $("#fname_up").val(details['outp_firstname']);
            $("#lname_up").val(details['outp_lastname']);
            $("#uname_up").val(details['outp_username']);
            $("#pwd_up").val(details['outp_password']);
            $("#email_up").val(details['outp_email']);
            $("#gen_up").val(details['outp_gender']);
            $("#phone_up").val(details['outp_phoneno']);
            $("#address_up").val(details['outp_address']);
            $("#dob_up").val(details['outp_birthdate']);
            $("#occupation_up").val(details['outp_occupation']);
            $("#status_up").val(details['outp_maritalstatus']);
            $("#blood_up").val(details['outp_bloodgroup']);
            
            
        }
    });
}


$('#submit').click(function () {
    var outp_id = $('#user_id').html();
    $.ajax({
        url:"includes/updateOutpatient.php",
        method:"post",
        data:{
            outp_id :outpId
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshoutpatient.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#outpatient').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.update_invisible_drop, .update_prompt_box').css('display', 'none');
    
        $('#users_name').html(outp_name);
        $('#user_id').html(outpId);
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
