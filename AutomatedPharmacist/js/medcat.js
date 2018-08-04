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



function showDelete(medcat_name,medcat_id){
    $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.invisible_drop, .prompt_box').css('display', 'block');

    $('#users_name').html(medcat_name);
    $('#user_id').html(medcat_id);
}

$('#yes_btn').click(function () {
    var medcat_id = $('#user_id').html();
    $.ajax({
        url:"includes/deleteMedcat.php",
        method:"post",
        data:{
            medcat_id :medcat_id
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshMedcat.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#medcat').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.invisible_drop, .prompt_box').css('display', 'none');
    
        $('#users_name').html(medcat_name);
        $('#user_id').html(medcat_id);
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


function showUpdate(medcat_name,medcatId){
    $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.update_invisible_drop, .update_prompt_box').css('display', 'block');

    $('#users_name').html(medcat_name);
    $('#user_id').html(medcatId);

    $.ajax({
        url: "includes/fetchMedcat.php",
        method: "POST",
        data: {medcat_id: medcatId},
        success: function (data) {
            details = JSON.parse(data);
            console.log(data);
            $("#medcat_id").val(details['medicine_categoryID']);
            $("#medicatname_up").val(details['m_medicine_category_name']);
            $("#meddescription_up").val(details['m_medicine_description']);
            
            
        }
    });
}


$('#submit').click(function () {
    var medcat_id = $('#user_id').html();
    $.ajax({
        url:"includes/updateMedcat.php",
        method:"post",
        data:{
            medcat_id :medcatId
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshMedcat.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#medcat').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.update_invisible_drop, .update_prompt_box').css('display', 'none');
    
        $('#users_name').html(medcat_name);
        $('#user_id').html(medcatId);
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

