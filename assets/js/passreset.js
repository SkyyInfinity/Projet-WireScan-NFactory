$(document).ready(function () {
    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        if (results==null){
           return null;
        }
        else{
           return results[1] || 0;
        }
    }
    function checkPasswordStrength() {
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
        var verif = false;
        if ($('#password').val().length < 7) {
            $('#error_password').css('color', 'red');
            $('#error_password').html("Votre mot de passe doit faire plus de 8 caracteres");
        } else {
            if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
                $('#error_password').css('color', 'green');
                $('#error_password').html("Mot de passe Valide");
                verif = true;
            } else {
                $('#error_password').html("Votre mot de passe doit contenir ...");
            }
        }
        return verif;
    }
    $('#passchange').on('submit', function (e) {
        e.preventDefault();
        let password = $('#password').val();
        let password2 = $('#password2').val();
        let usertoken = $.urlParam('token');
        $.ajax({
            type: 'POST',
            url: 'ajax/editpsswrd.php',
            data: {
                password: password,
                password2: password2,
                usertoken: usertoken
            },
            dataType: 'json',
            success: function (response) {
                if (response['success'] == true) {
                    console.log(response)
                    console.log('OK')
                    $('#reset_cont').html('<div class="success"><p>Votre mot de passe a était modifié avec succés !</div>')
                }
                else if (response['success'] == false) {
                    console.log(response)
                    $('#error_password').empty();
                    $('#error_password2').empty();
                    $('#error_password').html(response['errors']['password']);
                    $('#error_password2').html(response['errors']['password2']);
                }
            }
        })
    });
    // Detection et aide MDP
    $('#password').on('input', function () {
        checkPasswordStrength();
        $('#info_mdp').hide();
        $('#error_password').show();
    });
    $('#password').focusin(function () {
        $('#error_password').hide();
        var verif = checkPasswordStrength();
        if (verif != true) {
            $('#info_mdp').show();
        }
    });
    $('#password').focusout(function () {
        $('#error_password').hide();
        $('#info_mdp').hide();
    });
    $('#password2').on('input', function (e) {
        $('#error_password2').show();
        if ($('#password2').val() != $('#password').val()) {
            $('#error_password2').css('color', 'red');
            $('#error_password2').html('Les mots de passe  ne sont pas identiquent');
        } else {
            $('#error_password2').css('color', 'green');
            $('#error_password2').html('Les mots de passe sont identiquent');
        }
    });
});