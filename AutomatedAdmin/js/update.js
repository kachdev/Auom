
$(document).ready(function () {
    $('#update').click(function (event) {
        event.preventDefault();
        $.ajax({
            url: "includes/update.php",
            method: "post",
            data: $('form').serialize(),
            dataType: "text",
            success: function (strMessage) {
                $('#message').text(strMessage)
            }
            
        })
    })
    
})
