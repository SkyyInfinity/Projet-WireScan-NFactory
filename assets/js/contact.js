$(document).ready(function () {
    $('#contact').on('submit', function(e){
        e.preventDefault();
        var nom = $('#nom2').val()
        var prenom = $('#prenom2').val()
        var email = $('#email3').val()
        var subject = $('#subject').val()
        var message = $('#message').val()
        $.ajax({
            type: "POST",
            url: 'ajax/contact.php',
            data: {
                nom : nom,
                prenom : prenom,
                email : email,
                subject : subject,
                message : message
            },
            dataType: "json",
            beforeSend: function(){
                $("#loading").show();
            },
            success: function (response) {
                if (response['success'] == true) {
                    $('#error_nom2').html('')
                    $('#error_prenom2').html('')
                    $('#error_email3').html('')
                    $('#error_subject').html('')
                    $('#error_message').html('')

                } else {
                    $('#error_nom2').html('')
                    $('#error_prenom2').html('')
                    $('#error_email3').html('')
                    $('#error_subject').html('')
                    $('#error_message').html('')
                    $('#error_nom2').html(response['errors']['nom'])
                    $('#error_prenom2').html(response['errors']['prenom'])
                    $('#error_email3').html(response['errors']['email'])
                    $('#error_subject').html(response['errors']['subject'])
                    $('#error_message').html(response['errors']['message'])
                }
            },
            complete: function(data){
                $("#loading").hide();
            }     
        });
    })
});