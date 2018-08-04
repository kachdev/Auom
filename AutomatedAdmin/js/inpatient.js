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



function showDelete(inp_name,inp_id){
    $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.invisible_drop, .prompt_box').css('display', 'block');

    $('#users_name').html(inp_name);
    $('#user_id').html(inp_id);
}

$('#yes_btn').click(function () {
    var inp_id = $('#user_id').html();
    $.ajax({
        url:"includes/deleteInpatient.php",
        method:"post",
        data:{
            inp_id :inp_id
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshInpatient.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#inpatient').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.invisible_drop, .prompt_box').css('display', 'none');
    
        $('#users_name').html(inp_name);
        $('#user_id').html(inp_id);
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


function showUpdate(inp_name,inpId){
    $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.update_invisible_drop, .update_prompt_box').css('display', 'block');

    $('#users_name').html(inp_name);
    $('#user_id').html(inpId);

    $.ajax({
        url: "includes/fetchInpatient.php",
        method: "POST",
        data: {inp_id: inpId},
        success: function (data) {
            details = JSON.parse(data);
            console.log(data);
            $("#fname_up").val(details['inp_firstname']);
            $("#lname_up").val(details['inp_lastname']);
            $("#uname_up").val(details['inp_username']);
            $("#pwd_up").val(details['inp_password']);
            $("#email_up").val(details['inp_email']);
            $("#gen_up").val(details['inp_gender']);
            $("#phone_up").val(details['inp_phoneno']);
            $("#address_up").val(details['inp_address']);
            $("#dob_up").val(details['inp_birthdate']);
            $("#occupation_up").val(details['inp_occupation']);
            $("#status_up").val(details['inp_maritalstatus']);
            $("#blood_up").val(details['inp_bloodgroup']);
            $("#kin_up").val(details['inp_kin']);
            $("#kinno_up").val(details['inp_kinno']);
            
            
        }
    });
}


$('#submit').click(function () {
    var inp_id = $('#user_id').html();
    $.ajax({
        url:"includes/updateInpatient.php",
        method:"post",
        data:{
            inp_id :inpId
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshInpatient.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#inpatient').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.update_invisible_drop, .update_prompt_box').css('display', 'none');
    
        $('#users_name').html(inp_name);
        $('#user_id').html(inpId);
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
