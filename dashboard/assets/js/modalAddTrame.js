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
        return false
    });
});
