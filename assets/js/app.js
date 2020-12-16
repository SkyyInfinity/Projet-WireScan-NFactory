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
                console.log(response['success']);
                if (response['success'] == true) {
                    console.log('il n\'y a pas d\'erreurs') 
                }  
                else if (response['success'] == false){
                    console.log('il y a des erreurs')
                    $('#error_nom,#error_prenom,#error_email,#error_password,#error_password2,#error_entreprise').empty();
                    $('#error_nom').html(response['errors']['nom']);
                    $('#error_prenom').html(response['errors']['prenom']);
                    $('#error_email').html(response['errors']['email']);
                    $('#error_password').html(response['errors']['password']);
                    $('#error_password2').html(response['errors']['password2']);
                    $('#error_entreprise').html(response['errors']['entreprise']);
                }    
            },
            error: function(response){
                console.log('error');
                console.log(response);
            }
        })
    });
});