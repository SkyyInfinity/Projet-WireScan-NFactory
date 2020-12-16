$( document ).ready(function() {
    // START JQUERY

    // MODAL
    $('#modal_btn').click(function(e) {
        e.preventDefault();
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
    
    // MODAL QUAND ON CLICK SUR LES BOUTONS DE LA NAVIGATION
    $('#js_connexion').on('click', function(e) {
        e.preventDefault();
        $('#btn_connexion').addClass('active_login');
        $('#btn_inscription').removeClass('active_login');
        $('.inscription_cont').css('display', 'none');
        $('.connexion_cont').css('display', 'block');
    });
    $('#js_inscription').on('click', function(e) {
        e.preventDefault();
        $('#btn_inscription').addClass('active_login');
        $('#btn_connexion').removeClass('active_login');
        $('.connexion_cont').css('display', 'none');
        $('.inscription_cont').css('display', 'block');
    });

    // END JQUERY
});