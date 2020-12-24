$(document).ready(function () {
    $.ajax({
        type: 'GET',
        url: 'ajax/loadtrame.php',
        dataType: 'json',
        success: function (response) {
            console.log(response)
        },
        error: function(response) {

        }
    });
});