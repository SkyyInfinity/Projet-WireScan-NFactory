$(document).ready(function() {                           
    //Gestion Formulaire
    //Inscriptions
    $('#inscription').on('submit', function(e) {
        e.preventDefault();

        let nom = $('#nom').val();
        let prenom = $('#prenom').val();
        // Verif si pseudo existe deja 
        // Php ou Ajax ?
        let email = $('#email').val();
        let password = $('#password').val();
        let password2 = $('#password2').val();
        let entreprise = $('#entreprise').val();

        $.ajax({
            type: 'POST',
            url: 'ajax/login.php',
            data: {
                nom: nom,
                prenom: prenom,
                email: email,
                password: password,
                password2: password2, 
                entreprise: entreprise
            },
            dataType: 'json',
            success: function (response) {
                if (response['success'] == true) {
                    
                }  
                else if (response['success'] == false){
                    $('#error_nom,#error_prenom,#error_email,#error_password,#error_password2,#error_entreprise').empty();
                    $('#error_nom').html(response['errors']['nom']);
                    $('#error_prenom').html(response['errors']['prenom']);
                    $('#error_email').html(response['errors']['email']);
                    $('#error_password').html(response['errors']['password']);
                    $('#error_password2').html(response['errors']['password2']);
                    $('#error_entreprise').html(response['errors']['entreprise']);
                }    
            }, error: function(response){
                console.log('error');
                console.log(response);
            }
        })
    });
    function checkPasswordStrength() {
        var number = /([0-9])/;
        var alphabets = /([a-zA-Z])/;
        var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
        if($('#password').val().length<7) {
            $('#error_password').html("Votre mot de passe doit faire plus de 8 caracteres");
        } else {  	
            if($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {            
                $('#error_password').css('color','green');
                $('#error_password').html("Mot de passe Valide");
            } else {
                $('#error_password').html("Votre mot de passe doit contenir ...");
            }
        }
    }
    $('#password').keydown(function() {
        $('#info_mdp').hide();
        checkPasswordStrength();
    });
    $('#password').focusin(function() {
        $('#info_mdp').show();
        $('#error_password').html("Votre mot de passe doit contenir 1 majuscule , 1 miniscule , 1 chiffre et 1 charctere spécial.");
    })
    $('#password').focusout(function() {
        $('#error_password').hide();
    })

});
