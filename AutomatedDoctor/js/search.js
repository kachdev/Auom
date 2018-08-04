$('#search').keyup(function () {
    var data = $('#search').val();

    $.ajax({
        url:"includes/searchPage.php",
        method:"post",
        data:{
            data
        },
        success:function (data){
            $('#students').html(data);
        },
        error: function(error){
            alert('Server Error');
            console.log(error);
        }
    });
});