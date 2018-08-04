//============================================================================================

//DELETE DEPARTMENT

$("#display2").css("display","none");
$("#tab-hide2").css("display","none");


$("#tab1").click(function () {
    $("#display1").css("display","none");
    $("#tab-hide1").css("display","none");
    $("#display2").css("display","block");
    $("#tab-hide2").css("display","block");
});

$("#tab2").click(function () {
    $("#display1").css("display","none");
    $("#tab-hide1").css("display","none");
    $("#display2").css("display","block");
    $("#tab-hide2").css("display","flex");
    
});






function showDelete(dep_name,dep_id){
    $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.invisible_drop, .prompt_box').css('display', 'block');
    

    $('#users_name').html(dep_name);
    $('#user_id').html(dep_id);
    
}

$('#yes_btn').click(function () {
    var dep_id = $('#user_id').html();
    

    $.ajax({
        url:"includes/deleteDepartment.php",
        method:"post",
        data:{
            dep_id :dep_id
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshDepartment.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#departments').html(data);
                }

            })
        },
        error:function (data){
            
        },
    });  

        $('.invisible_drop, .prompt_box').animate({'opacity':'1'}, 300, 'linear');
        $('.invisible_drop, .prompt_box').css('display', 'none');
    
        $('#users_name').html(name);
        $('#user_id').html(dep_id);
});

$('#no_btn').click(function () {
    close();
});




$('.invisible_drop').click(function () {
    close();
});


function close() {
    $('.invisible_drop, .prompt_box').animate({ 'opacity': '0' }, 300, 'linear', function () {
        $('.invisible_drop, .prompt_box').css('display', 'none');
    });
}

// ====================================================UPDATE=================================================


function showUpdate(dep_name,depId){
    $('.update_invisible_drop, .update_prompt_box').animate({'opacity':'1'}, 300, 'linear');
    $('.update_invisible_drop, .update_prompt_box').css('display', 'block');

    $('#users_name').html(dep_name);
    $('#user_id').html(depId);

    $.ajax({
        url: "includes/fetchDepartment.php",
        method: "POST",
        data: {dep_id: depId},
        success: function (data) {
            details = JSON.parse(data);
            console.log(data);
            $("#deptname_up").val(details['dep_name']);
            $("#deptdesc_up").val(details['dep_description']);
            
        }
    });
}


$('#submit').click(function () {
    var dep_id = $('#user_id').html();
    $.ajax({
        url:"includes/updateDepartment.php",
        method:"post",
        data:{
            dep_id :depId
        },
        success:function(data) {
            $('#success').html(data);

            $.ajax({
                url:"includes/refreshDepartment.php",
                method:"post",
                data:"",
                success:function (data) {
                    $('#department').html(data);
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