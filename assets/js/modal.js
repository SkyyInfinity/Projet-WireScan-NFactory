$(document).ready(function () {
    //Function
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
    //Function Modal
    function showModal() {
        $("#login-modal").modal({
            fadeDuration: 100,
            clickClose: true,
        });
    }
    function ModalResetpassword() {
        $("#passwd-modal").modal({
            fadeDuration: 100,
            clickClose: true,
            closeExisting: false
        });
    }
    // START JQUERY

    // MODAL
    $('#resetpasswd').click(function (e) {
        e.preventDefault();
        ModalResetpassword();
        return false
    });
    $('#js_connexion').click(function (e) {
        e.preventDefault();
        showModal();
        return false
    });
    $('#js_inscription').click(function(e) {
        e.preventDefault();
        showModal();
        return false
    });
    $('#signinnow').click(function(e) {
        e.preventDefault();
        showModal();
        return false
    });
    $('#btn_inscription').click(function (e) {
        e.preventDefault();
        $('#btn_connexion').removeClass('active_login');
        $(this).addClass('active_login');
        $('.connexion_cont').css('display', 'none');
        $('.inscription_cont').css('display', 'block');
    });
    $('#btn_connexion').click(function (e) {
        e.preventDefault();
        $('#btn_inscription').removeClass('active_login');
        $(this).addClass('active_login');
        $('.inscription_cont').css('display', 'none');
        $('.connexion_cont').css('display', 'block');
    });
    // MODAL_BTN_ONCLICK
    $('#js_connexion').on('click', function (e) {
        e.preventDefault();
        $('#btn_connexion').addClass('active_login');
        $('#btn_inscription').removeClass('active_login');
        $('.inscription_cont').css('display', 'none');
        $('.connexion_cont').css('display', 'block');
    });
    $('#js_inscription').on('click', function (e) {
        e.preventDefault();
        $('#btn_inscription').addClass('active_login');
        $('#btn_connexion').removeClass('active_login');
        $('.connexion_cont').css('display', 'none');
        $('.inscription_cont').css('display', 'block');
    });
    $('#signinnow').on('click', function (e) {
        e.preventDefault();
        $('#btn_inscription').addClass('active_login');
        $('#btn_connexion').removeClass('active_login');
        $('.connexion_cont').css('display', 'none');
        $('.inscription_cont').css('display', 'block');
    });
    //Gestion Formulaire
    //Inscriptions
    $('#inscription').on('submit', function (e) {
        e.preventDefault();
        let nom = $('#nom').val();
        let prenom = $('#prenom').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let password2 = $('#password2').val();
        let entreprise = $('#entreprise').val();
        $.ajax({
            type: 'POST',
            url: 'ajax/verifEmail.php',
            data: {
                email: email
            },
            dataType: 'json',
            success: function (response) {
                if (response['success'] == true) {
                    $.ajax({
                        type: 'POST',
                        url: 'ajax/signin.php',
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
                                console.log(response)
                                $('#inscription_cont').html('<div class="success"><p>Compte crée avec succés !</p><img src="assets/img/succes.png"></div>')
                            }
                            else if (response['success'] == false) {
                                console.log(response)
                                $('#error_nom,#error_prenom,#error_email,#error_password,#error_password2,#error_entreprise').empty();
                                $('#error_nom').html(response['errors']['nom']);
                                $('#error_prenom').html(response['errors']['prenom']);
                                $('#error_email').html(response['errors']['email']);
                                $('#error_password').html(response['errors']['password']);
                                $('#error_password2').html(response['errors']['password2']);
                                $('#error_entreprise').html(response['errors']['entreprise']);
                            }
                        }, error: function (response) {

                        }
                    })
                }
                else if (response['success'] == false) {
                    $('#error_email').html(response['errors']['email']);
                }
            }
        })
    });
    // Connexion
    $('#connexion').on('submit', function (e) {
        console.log('ok btn')
        e.preventDefault();
        let email = $('#email2').val();
        let password = $('#password_log').val();
        $.ajax({
            type: 'POST',
            url: 'ajax/login.php',
            data: {
                email: email,
                password: password
            },
            dataType: 'json',
            success: function (response) {
                if (response['success'] == true) {
                    window.location.replace('localhost/php/projet-reseaux/Projet-WireScan-NFactory/dashboard/index.php')
                }
                else if (response['success'] == false) {
                    $('#error_email_log').empty();
                    $('#error_password_log').empty();
                    $('#error_email_log').html(response['errors']['email']);
                    $('#error_password_log').html(response['errors']['password']);
                }
            }
        })
    });
    // Reset password
    $('#mailresetform').on('submit', function (e) {
        e.preventDefault();
        let emailreset = $('#mailreset').val();
        $.ajax({
            type: 'POST',
            url: 'ajax/mailreset.php',
            data: {
                email: emailreset,
            },
            dataType: 'json',
            success: function (response) {
                if (response['success'] == true) {
                    $('#reset_cont').html('<div class="success"><p>Un lien de a etait envoyé a votre adresse email !</div>')
                }
                else if (response['success'] == false) {
                    $('#error_email_reset').empty();
                    $('#error_email_reset').html(response['errors']['email']);
                }
            }
        })
    });
    // Detection Email
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    $('#email').on('input', function () {
        if (emailReg.test($('#email').val())) {
            $('#email').html('Les mots de passe  ne sont pas identiquent');
        }
    })
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
