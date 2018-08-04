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

// ============================================DELETE===============================================

function showDelete(doc_name,doc_id){
    $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.invisible_drop, .prompt_box').css('display', 'block');

    $('#users_name').html(doc_name);
    $('#user_id').html(doc_id);
}

$('#yes_btn').click(function () {
    var doc_id = $('#user_id').html();
    $.ajax({
        url:"includes/deleteDoctor.php",
        method:"post",
        data:{
            doc_id :doc_id
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshDoctor.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#doctor').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.invisible_drop, .prompt_box').css('display', 'none');
    
        $('#users_name').html(name);
        $('#user_id').html(doc_id);
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


function showUpdate(doc_name,docId){
    $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.update_invisible_drop, .update_prompt_box').css('display', 'block');

    $('#users_name').html(doc_name);
    $('#user_id').html(docId);

    $.ajax({
        url: "includes/fetchDoctor.php",
        method: "POST",
        data: {doc_id: docId},
        success: function (data) {
            details = JSON.parse(data);
            console.log(data);
            $("#doc_idup").val(details['DoctorID']);
            $("#fname_up").val(details['d_firstname']);
            $("#lname_up").val(details['d_lastname']);
            $("#uname_up").val(details['d_username']);
            $("#pwd_up").val(details['d_password']);
            $("#email_up").val(details['d_email']);
            $("#gen_up").val(details['d_gender']);
            $("#phone_up").val(details['d_phoneno']);
            $("#address_up").val(details['d_address']);
            $("#dept_up").val(details['d_department']);
            $("#profile_up").val(details['d_profile']);
            
        }
    });
}


$('#submit').click(function () {
    var doc_id = $('#user_id').html();
    $.ajax({
        url:"includes/updateDoctor.php",
        method:"post",
        data:{
            doc_id :docId
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshDoctor.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#doctor').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.update_invisible_drop, .update_prompt_box').css('display', 'none');
    
        $('#users_name').html(name);
        $('#user_id').html(doc_id);
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