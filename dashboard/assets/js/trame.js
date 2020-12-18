$(document).ready(function () {
    $('#sendtrame').on('submit', function (e){
        e.preventDefault(); 
        var selectedFile = $('#jsonfile')[0].files[0];
        var reader = new FileReader();
        reader.onload = function(){return reader.result};
        reader.readAsText(selectedFile);
        $.ajax({
            type: 'POST',
            url: 'ajax/trame.php',
            data: {
                trame : trame
            },
            dataType: 'json',
            success: function (response) {
                console.log('success')
                console.log(response)
                if (response['success'] == true) {
                    
                }  
                else if (response['success'] == false){
                    $('#error_json').empty();
                    $('#error_json').html(response['errors']['json']);
                }    
            },
            error: function(response) {
                console.log('error');
                console.log(response)
            }
        })  
    });
});