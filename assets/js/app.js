$( document ).ready(function() {
    $('#modal_btn').click(function(e) {
        $('login-modal').modal({
          fadeDuration: 250
        });
        return false;
    });
    $('#btn_inscription').click(function(e) {
        e.preventDefault();
        $('#btn_connexion').removeClass('active_login');
        $(this).addClass('active_login');
        $('.connexion').css('display', 'none');
        $('.inscription').css('display', 'block');
    });
    $('#btn_connexion').click(function(e) {
        e.preventDefault();
        $('#btn_inscription').removeClass('active_login');
        $(this).addClass('active_login');
        $('.inscription').css('display', 'none');
        $('.connexion').css('display', 'block');
    });
});