$(document).ready(function () {
    $('#sendtrame').on('submit', function (e){
        e.preventDefault(); 
        // var selectedFile = $('#jsonfile')[0].files[0];
        // var reader = new FileReader();
        // reader.onload = function(event) { console.log($.parseJSON(reader.result)); };
        // reader.readAsText(selectedFile);
         $.ajax({
            type: 'GET',
            url: 'https://floriandoyen.fr/resources/frames.php',
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