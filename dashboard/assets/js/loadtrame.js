$(document).ready(function () {
    function changeTrame(trames,info,indexTrame) {
        var i = 1;
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Reçus', 'Pertes',],
                datasets: [{
                    label: '# of Votes',
                    data: [info['ttl_pass_%'], info['ttl_lost_%']],
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
        new Chart(document.getElementById("myChart2"), {
            type: 'bar',
            data: {
              labels: ["UDP", "TLSv1.2", "ICMP", "TCP"],
              datasets: [
                {
                  label: "Requete",
                  backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9"],
                  data: [info['udp'], info['tls'], info['icmp'], info['tcp']],
                  scaleStartValue : 0 
                }
              ]
            },
            options: {
                scales: {
                    yAxes: [{
                        display: true,
                        ticks: {  
                            beginAtZero: true   
                        }
                    }]
                }, 
                legend: { display: false },
                title: {
                    display: false,
                }
            }
        });
        var ctx = document.getElementById('myChart3').getContext('2d');
        var myChart3 = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Reçus', 'Echec',],
                datasets: [{
                    label: '# of Votes',
                    data: [info['trameN'],info['echecN']],
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
        
        var ctx = document.getElementById('myChart4').getContext('2d');
        var myChart4 = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Reçus', 'Pertes',],
                datasets: [{
                    label: '# of Votes',
                    data: [trames[indexTrame]['ttl'], (128 -trames[indexTrame]['ttl'])],
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
        $('#textuel').html('');
        trames.forEach(element => {
            $('#textuel').append('<p id="trame'+ i+'"><span id="span_status'+i+'">'+ element['status'] +'</span> - '+ element['name'] +' - Le '+ element['date']+ ', L\'adresse '+ element['from_ip'] +':'+ element['from_ports']+ ' a envoyé une requete à l\'adresse '+ element['dest_ip']+ ':' + element['dest_ports'] +'<span id="ttl_perte'+i+'"> il y a eu '+ element['ttl_lost'] +' de perte (soit ' + Math.round(element['ttl_lost%'])+'% de perte)' +'</span></p>')
            if (Math.round(element['ttl_lost%']) >= 10) {
                $('#ttl_perte'+i).css('color','#ffd66b')
            } else if (Math.round(element['ttl_lost%']) >= 30) {
                $('#ttl_perte'+i).css('color','orange')
            } else if (Math.round(element['ttl_lost%']) >= 70) {
                $('#ttl_perte'+i).css('color','#ff4646')
            }
            if (element['status'] == 'Echec') {
                $('#span_status'+i).css('color','#ff4646')
            } else if (element['status'] == "Ok") {
                $('#span_status'+i).css('color','#6BEA12')
            }
            i += 1;
        });
        
        //AFFICHAGE UNIQUE 
        $('#from_unique').html('<p>Expediteur : ' + trames[indexTrame]['from_ip'] + ' Port : ' +trames[indexTrame]['from_ports']  + '</p>');
        $('#from_unique').append('<p>Destinataire : ' + trames[indexTrame]['dest_ip']+ ' Port : ' +trames[indexTrame]['dest_ports'] + '</p>');
        myChart.update();
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
            if (response['success'] == true) {
                $('#notrames').hide();
                $('#trames').show();
                trames = response['trames']
                info = response['info']
                tramesCount = trames.length - 1
                changeTrame(trames,info,indexTrame)
            } else if(response['success'] == false) {
                $('#trames').hide();
                $('#notrames').show();
            }
        },
        error: function(response) {

        },
        complete: function(data){
            $("#loading").hide();
        },
    });

    $('#left_cont').on('click', function(e) {
        e.preventDefault();
        if (indexTrame == 0) {
            indexTrame = 0;
        } else {
            indexTrame -= 1;
            changeTrame(trames,info,indexTrame)
        }

    });
    $('#left_cont,#right_cont').mouseenter(function() {
        console.log('ok')
        $(this).css('background','#15213c')
        $(this).children().css('filter','invert(1)')
    }).mouseleave(function() {
        $(this).css('background','none')
        $(this).children().css('filter','invert(0)')
    })
    $('#right_cont').on('click', function(e) {
        e.preventDefault();
        if (indexTrame == tramesCount) {
            indexTrame = tramesCount;
        } else {
            indexTrame += 1;
            changeTrame(trames,info,indexTrame)
        }
    });
    $('#glob').on('click', function (e) {
        e.preventDefault();
        $('#uniquemode').hide();
        $('#globalmode').show();
    });
    $('#uniq').on('click', function (e) {
        e.preventDefault();
        $('#globalmode').hide();
        $('#uniquemode').show();
    });
    $('#recap_btn').on('click', function (e) {
        e.preventDefault();
        $('#graphique').hide();
        $('#textuel_cont').hide();
        $('#recap').show();
    });
    $('#graphique_btn').on('click', function (e) {
        e.preventDefault();
        $('#recap').hide();
        $('#textuel_cont').hide();
        $('#graphique').show();
    });
    $('#textuel_btn').on('click', function (e) {
        e.preventDefault();
        $('#recap').hide();
        $('#graphique').hide();
        $('#textuel_cont').show();
    });
});
