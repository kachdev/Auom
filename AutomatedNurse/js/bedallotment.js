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



function showDelete(bedallot_name,bedallot_id){
    $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.invisible_drop, .prompt_box').css('display', 'block');

    $('#users_name').html(bedallot_name);
    $('#user_id').html(bedallot_id);
}

$('#yes_btn').click(function () {
    var bedallot_id = $('#user_id').html();
    $.ajax({
        url:"includes/deleteBedallotment.php",
        method:"post",
        data:{
            bedallot_id :bedallot_id
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshBedallotment.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#bedallot').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.invisible_drop, .prompt_box').css('display', 'none');
    
        $('#users_name').html(bedallot_name);
        $('#user_id').html(bedallot_id);
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


function showUpdate(bedallot_name,bedallotId){
    $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.update_invisible_drop, .update_prompt_box').css('display', 'block');

    $('#users_name').html(bedallot_name);
    $('#user_id').html(bedallotId);

    $.ajax({
        url: "includes/fetchBedallotment.php",
        method: "POST",
        data: {bedallot_id: bedallotId},
        success: function (data) {
            details = JSON.parse(data);
            console.log(data);
            $("#allot_id").val(details['BedallotmentID']);
            $("#bedno_up").val(details['bed_bednumber']);
            $("#bedtype_up").val(details['bed_bedtype ']);
            $("#pname_up").val(details['inp_name']);
            $("#allotime_up").val(details['bedall_allot_time']);
            $("#dischtime_up").val(details['bedall_disch_time']);
          
            
            
        }
    });
}


$('#submit').click(function () {
    var allot_id = $('#user_id').html();
    $.ajax({
        url:"includes/updateBedallotment.php",
        method:"post",
        data:{
            allot_id :allotId
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshBedallotment.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#allotment').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.update_invisible_drop, .update_prompt_box').css('display', 'none');
    
        $('#users_name').html(allot_name);
        $('#user_id').html(allotId);
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
