$(document).ready(function () {
    function changeTrame(trames,indexTrame) {
            var ctx = document.getElementById('myChart').getContext('2d');
            if(myChart) {
                myChart.destroy();
            }
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Reçus', 'Pertes',],
                    datasets: [{
                        label: '# of Votes',
                        data: [trames[indexTrame]['ttl_pass%'], trames[indexTrame]['ttl_lost%']],
                        backgroundColor: [
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 99, 132, 0.2)'
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 99, 132, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    legend: {
                        display: true,
                        labels: {
                            fontColor: '#cccccc'
                        }
                    }
                }
            });
        $('#date').text(trames[indexTrame]['date']);
        // $('.items').append('<div class="item itemDate">')
        $('#from_ip').text('De : ' + trames[indexTrame]['from_ip'] + ' Port : ' +trames[indexTrame]['from_ports']);
        $('#dest_ip').text('Vers : ' + trames[indexTrame]['dest_ip']+ ' Port : ' +trames[indexTrame]['dest_ports']);

    }
    var indexTrame = 0;
    var trames;
    var info;
    var tramesCount;
    $.ajax({
        type: 'GET',
        url: 'ajax/loadtrame.php',
        dataType: 'json',
        beforeSend: function(){
            $("#loading").show();
        },
        success: function (response) {
            if (response['success']) {
                console.log(response);
                $('#notrames').hide();
                $('#trames').show();
                trames = response['trames']
                info = response['info']
                tramesCount = trames.length - 1
                changeTrame(trames,indexTrame)
            } else {
                $('#trames').hide();
                $('#notrames').show();
            }
        },
        error: function(response) {
            console.log(response);

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
            changeTrame(trames,indexTrame)
        }
        
    });
    $('#db_right').on('click', function(e) {
        e.preventDefault();
        if (indexTrame == tramesCount) {
            indexTrame = tramesCount;
        } else {
            indexTrame += 1;
            changeTrame(trames,indexTrame)
        }
    });
});