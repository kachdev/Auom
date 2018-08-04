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



function showDelete(med_name,med_id){
    $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.invisible_drop, .prompt_box').css('display', 'block');

    $('#users_name').html(med_name);
    $('#user_id').html(med_id);
}

$('#yes_btn').click(function () {
    var med_id = $('#user_id').html();
    $.ajax({
        url:"includes/deleteMedicine.php",
        method:"post",
        data:{
            med_id :med_id
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshMedicine.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#medicine').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.invisible_drop, .prompt_box').css('display', 'none');
    
        $('#users_name').html(med_name);
        $('#user_id').html(med_id);
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


function showUpdate(med_name,medId){
    $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.update_invisible_drop, .update_prompt_box').css('display', 'block');

    $('#users_name').html(med_name);
    $('#user_id').html(medId);

    $.ajax({
        url: "includes/fetchMedicine.php",
        method: "POST",
        data: {med_id: medId},
        success: function (data) {
            details = JSON.parse(data);
            console.log(data);
            $("#medicine_id").val(details['medicineID']);
            $("#medname_up").val(details['me_medicine_name']);
            $("#category_up").val(details['me_medicine_category']);
            $("#description_up").val(details['me_description']);
            $("#manufactcompany_up").val(details['me_manufacturing_company']);
            $("#price_up").val(details['me_price']);
            $("#status_up").val(details['me_status']);
            
            
        }
    });
}


$('#submit').click(function () {
    var med_id = $('#user_id').html();
    $.ajax({
        url:"includes/updateMedicine.php",
        method:"post",
        data:{
            med_id :medId
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshMedicine.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#medicine').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.update_invisible_drop, .update_prompt_box').css('display', 'none');
    
        $('#users_name').html(med_name);
        $('#user_id').html(medId);
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
