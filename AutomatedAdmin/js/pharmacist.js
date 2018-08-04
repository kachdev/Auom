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



function showDelete(pharma_name,pharma_id){
    $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.invisible_drop, .prompt_box').css('display', 'block');

    $('#users_name').html(pharma_name);
    $('#user_id').html(pharma_id);
}

$('#yes_btn').click(function () {
    var pharma_id = $('#user_id').html();
    $.ajax({
        url:"includes/deletePharmacist.php",
        method:"post",
        data:{
            pharma_id :pharma_id
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshPharmacist.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#pharmacist').html(data);
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


function showUpdate(ph_name,phId){
    $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.update_invisible_drop, .update_prompt_box').css('display', 'block');

    $('#users_name').html(ph_name);
    $('#user_id').html(phId);

    $.ajax({
        url: "includes/fetchPharmacist.php",
        method: "POST",
        data: {ph_id: phId},
        success: function (data) {
            details = JSON.parse(data);
            console.log(data);
            $("#fname_up").val(details['ph_firstname']);
            $("#lname_up").val(details['ph_lastname']);
            $("#uname_up").val(details['ph_username']);
            $("#pwd_up").val(details['ph_password']);
            $("#email_up").val(details['ph_email']);
            $("#gen_up").val(details['ph_gender']);
            $("#phone_up").val(details['ph_phoneno']);
            $("#address_up").val(details['ph_address']);
            
        }
    });
}


$('#submit').click(function () {
    var ph_id = $('#user_id').html();
    $.ajax({
        url:"includes/updatePharmacist.php",
        method:"post",
        data:{
            ph_id :phId
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshPharmacist.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#pharmacist').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.update_invisible_drop, .update_prompt_box').css('display', 'none');
    
        $('#users_name').html(ph_name);
        $('#user_id').html(ph_id);
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


