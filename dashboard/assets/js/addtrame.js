function readFile(file, onLoadCallback){
    var reader = new FileReader();
    reader.onload = onLoadCallback;
    reader.readAsText(file);
}

$(document).ready(function () {
    $('#jsonfile').on('change', function(e){
        readFile(this.files[0], function(e) {
            $('#output_field').text(e.target.result);
        });
    });
    $('#sendtrame_input').on('submit', function (e){
        var trame = $('#output_field').text();
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'ajax/addtrame.php',
            data: {
                trame : trame,
                from : "jsoninput"

            },
            dataType: 'json',
            success: function (response) {
                if (response['success'] == true) {
                    $('#ok_json_file').empty();
                    $('#ok_json_file').css('color','green');
                    $('#ok_json_file').html('Trame enregistrer !');
                    setTimeout(
                        function()
                        {
                            window.location.replace('index.php')
                        }, 2000);
                }
                else if (response['success'] == false){
                    $('#error_json_file').empty();
                    $('#error_json_file').html(response['errors']['json']);
                }    
            },
            error: function(response) {
            }
        })
    });
    $('#sendtrame_lien').on('submit', function (e){
        e.preventDefault();
        var url = $('#jsonurl').val();
        $.ajax({
            type: 'GET',
            url: url,
            success: function (response) {
                $.ajax({
                    type: 'POST',
                    url: 'ajax/addtrame.php',
                    data: {
                        trame : response,

                        from : "jsonurl"
                    },
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        if (response['success'] == true) {
                            $('#error_json_url').empty();
                            $('#ok_json_url').empty();
                            $('#ok_json_url').css('color','green');
                            $('#ok_json_url').html('Trame enregistrer !');
                            setTimeout(
                                function()
                                {
                                    window.location.replace('index.php')
                                }, 2000);

                        }
                        else if (response['success'] == false){
                            $('#error_json_url').empty();
                            $('#error_json_url').html(response['errors']['json']);
                        }    
                    },
                    error: function(response) {
                        console.log(response);
                    }
                })
            },
            error: function(response) {
            }
        })
    });
    $('#sendtrame_TA').on('submit', function (e){
        e.preventDefault();
        var trame = $('#jsonTA').val();
        $.ajax({
            type: 'POST',
            url: 'ajax/addtrame.php',
            data: {
                trame : trame,
                
                from : 'jsonTA'
            },
            dataType: 'json',
            success: function (response) {
                if (response['success'] == true) {
                    $('#ok_json_TA').empty();
                    $('#ok_json_TA').css('color','green');
                    $('#ok_json_TA').html('Trame enregistrer !');
                    setTimeout(
                        function()
                        {
                            window.location.replace('index.php')
                        }, 2000);
                }
                else if (response['success'] == false){
                    $('#error_json_TA').empty();
                    $('#error_json_TA').html(response['errors']['json']);
                }
            },
            error: function(response) {
            }
        })
    });
});
