$(document).ready(function () {
    function changeTrame(trames,indexTrame) {
        console.log(trames);
        $('#date').text(trames[indexTrame]['version']);
        $('.items').append('<div class="item itemDate">')
        $('#from_ip').text('De : ' + trames[indexTrame]['from_ip'] + ' Port : ' +trames[indexTrame]['from_ports']);
        $('#dest_ip').text('Vers : ' + trames[indexTrame]['dest_ip']+ ' Port : ' +trames[indexTrame]['dest_ports']);

    }
    var indexTrame = 0;
    var trames;
    var tramesCount;
    $.ajax({
        type: 'GET',
        url: 'ajax/loadtrame.php',
        dataType: 'json',
        beforeSend: function(){
            $("#loading").show()
        },
        success: function (response) {
            if (response['success']) {
                $('#notrames').hide();
                $('#trames').show();
                trames = response['trames']
                tramesCount = trames.length - 1
                changeTrame(trames,indexTrame)
            } else {
                $('#trames').hide();
                $('#notrames').show();
            }
        },
        complete: function(data){
            $("#loading").hide();
        },
    });

    $('#db_left').on('click', function(e) {
        e.preventDefault();
        if (indexTrame == 0) {
            indexTrame = 0;
        } else {
            indexTrame -= 1;
        }
        changeTrame(trames,indexTrame)
    });
    $('#db_right').on('click', function(e) {
        e.preventDefault();
        if (indexTrame == tramesCount) {
            indexTrame = tramesCount;
        } else {
            indexTrame += 1;
        }
        changeTrame(trames,indexTrame)
    });
});