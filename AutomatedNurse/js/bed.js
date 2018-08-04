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



function showDelete(bed_name,bed_id){
    $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.invisible_drop, .prompt_box').css('display', 'block');

    $('#users_name').html(bed_name);
    $('#user_id').html(bed_id);
}

$('#yes_btn').click(function () {
    var bed_id = $('#user_id').html();
    $.ajax({
        url:"includes/deleteBed.php",
        method:"post",
        data:{
            bed_id :bed_id
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshBed.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#bed').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.invisible_drop, .prompt_box').css('display', 'none');
    
        $('#users_name').html(bed_name);
        $('#user_id').html(bed_id);
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


function showUpdate(bed_name,bedId){
    $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.update_invisible_drop, .update_prompt_box').css('display', 'block');

    $('#users_name').html(bed_name);
    $('#user_id').html(bedId);

    $.ajax({
        url: "includes/fetchBed.php",
        method: "POST",
        data: {bed_id: bedId},
        success: function (data) {
            details = JSON.parse(data);
            console.log(data);
            $("#bedno_up").val(details['bed_bednumber']);
            $("#bedtype_up").val(details['bed_bedtype']);
            $("#desc_up").val(details['bed_description']);
        }
    });
}


$('#submit').click(function () {
    var bed_id = $('#user_id').html();
    $.ajax({
        url:"includes/updateBed.php",
        method:"post",
        data:{
            bed_id :bedId
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshBed.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#bed').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.update_invisible_drop, .update_prompt_box').css('display', 'none');
    
        $('#users_name').html(bed_name);
        $('#user_id').html(bedId);
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
