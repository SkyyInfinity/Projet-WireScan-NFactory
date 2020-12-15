$( document ).ready(function() {
    // Gestion Formulaire
    // Inscriptions 
    $('#inscription').on('submit', function(e) {
        e.preventDefault();
        let nom = $('#nom').val();
        let prenom = $('#prenom').val();
        // Verif si pseudo existe deja 
        // Php ou Ajax ?
        /////////////////
        let pseudo = $('#pseudo').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let password2 = $('#password2').val();
        // Generation du token 
        // PHP ou js ?
        // ///////////
        // created_at via sql
        // //////////////
        // status = 1 PHP ?
        ////////////////
        //Recup ip utilisateur via PHP ?
        ///////////////
        let entreprise = $('#entreprise').val();
        $.ajax({
            type: 'POST',
            url: 'ajax/login.php',
            data: {
                name: nom,
                prenom: prenom,
                pseudo: pseudo,
                email: email,
                password: password,
                password2: password2, 
                entreprise: entrerprise
            },
            dataType: 'json',
            succes: function (response) {
                console.log(response);
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
            }
        })
    })
    $('#modal_btn').click(function(e) {
        $('#login-modal').modal({
          fadeDuration: 250
        });
        return false;
    });
    $('#btn_inscription').click(function(e) {
        e.preventDefault();
        $('#btn_connexion').removeClass('active_login');
        $(this).addClass('active_login');
        $('.connexion_cont').css('display', 'none');
        $('.inscription_cont').css('display', 'block');
    });
    $('#btn_connexion').click(function(e) {
        e.preventDefault();
        $('#btn_inscription').removeClass('active_login');
        $(this).addClass('active_login');
        $('.inscription_cont').css('display', 'none');
        $('.connexion_cont').css('display', 'block');
    });
});