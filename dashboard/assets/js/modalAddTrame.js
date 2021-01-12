$(document).ready(function(){
    function showModal() {
        $("#modal_addTrame").modal({
            fadeDuration: 100,
            clickClose: true,
        });
    }
    // START JQUERY
    // MODAL
    $('#btn_addtrame_no').click(function(e) {
        e.preventDefault();
        showModal();
        return false
    });
    $('#btn_addtrame').click(function (e) {
        e.preventDefault();
        showModal();
        $('#btn_viaLien').addClass('active_login');
        return false
    });

    $('#btn_viaLien').click(function (e) {
        e.preventDefault();

        $('#btn_viaInput').removeClass('active_login');
        $('#btn_viaTA').removeClass('active_login');
        $(this).addClass('active_login');
        
        $('.viaTA_container').css('display', 'none');
        $('.viaInput_container').css('display', 'none');
        $('.viaLien_container').css('display', 'block');
    });
    $('#btn_viaInput').click(function (e) {
        e.preventDefault();

        $('#btn_viaLien').removeClass('active_login');
        $('#btn_viaTA').removeClass('active_login');
        $(this).addClass('active_login');

        $('.viaTA_container').css('display', 'none');
        $('.viaLien_container').css('display', 'none');
        $('.viaInput_container').css('display', 'block');
    });
    $('#btn_viaTA').click(function (e) {
        e.preventDefault();

        $('#btn_viaInput').removeClass('active_login');
        $('#btn_viaLien').removeClass('active_login');
        $(this).addClass('active_login');

        $('.viaInput_container').css('display', 'none');
        $('.viaLien_container').css('display', 'none');
        $('.viaTA_container').css('display', 'block');
    });
});
