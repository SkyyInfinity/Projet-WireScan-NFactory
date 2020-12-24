// function read(trame) {
//     // var file = fileInput.files.item(0);
//     var selectedFile = $('#jsonfile')[0].files[0];
//     var reader = new FileReader();
  
//     reader.onload = function() {
//       var trame = reader.result;
//       console.log(trame);
//     }
  
//     reader.readAsText(selectedFile);
// }
function readFile(file, onLoadCallback){
    var reader = new FileReader();
    reader.onload = onLoadCallback;
    reader.readAsText(file);
}

$(document).ready(function () {
    $('#jsonfile').on('change', function(e){
        readFile(this.files[0], function(e) {
            // use result in callback...
            $('#output_field').text(e.target.result);
        });
    });
    $('#sendtrame').on('submit', function (e){
        // console.log($('#output_field').text());
        var trame = $('#output_field').text();
        e.preventDefault(); 
        $.ajax({
            type: 'POST',
            url: 'ajax/addtrame.php',
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