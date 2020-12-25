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
    $('#sendtrame_input').on('submit', function (e){
        var trame = $('#output_field').text();
        var user_id = $('#user_id').text();
        e.preventDefault(); 
        $.ajax({
            type: 'POST',
            url: 'ajax/addtrame.php',
            data: {
                trame : trame,
                user_id : user_id,
                from : "jsoninput"

            },
            dataType: 'json',
            success: function (response) {
                if (response['success'] == true) {
                    window.location.replace('index.php')
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
    $('#sendtrame_lien').on('submit', function (e){
        e.preventDefault(); 
        var url = $('#jsonurl').text();
        $.ajax({
            type: 'GET',
            url: url,
            data: {
                from : "jsonurl"
            },
            dataType: 'json',
            success: function (response) {
                if (response['success'] == true) {
                    window.location.replace('index.php')
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
    $('#sendtrame_TA').on('submit', function (e){
        e.preventDefault(); 
        var trame = $('#jsonTA').val();
        var user_id = $('#user_id').text();
        console.log(trame)
        $.ajax({
            type: 'POST',
            url: 'ajax/addtrame.php',
            data: {
                trame : trame,
                user_id : user_id,
                from : 'jsonTA'
            },
            dataType: 'json',
            success: function (response) {
                console.log('success')
                console.log(response)
                if (response['success'] == true) {
                    window.location.replace('index.php')
                }  
                else if (response['success'] == false){
                    $('#error_json_TA').empty();
                    $('#error_json_TA').html(response['errors']['json']);
                }    
            },
            error: function(response) {
                console.log('error');
                console.log(response)
            }
        })  
    });
});