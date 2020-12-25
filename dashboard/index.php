<?php
require('../src/inc/functions.php');
require('../src/inc/pdo.php');
session_start();
if (!is_logged()) {
    header('Location: ../401.php');
}
$title = 'Dashboard';
include('src/template/db_header.php');
$trames = SQL_SELECT('trames',true,'WHERE user_id =',$_SESSION['user']['id'],'ORDER BY date ASC');
if (!empty($trames)) {
    $div_class = 1;
    foreach ($trames as $trame) {
        $ip_protocol = SQL_SELECT('trames_protocol_ip',false,'WHERE unique_id =',$trame['unique_id']);
        echo '<div class ="trame_'.$div_class.'" id="trame_'.$div_class.'">';
             echo '<div class="wrap2">';
                     echo '<div class="items">';
                         echo '<div class="item itemDate">';
                             echo '<a id="db_left" class="db_left"><</a>';
                             echo '<p id="date">Date : '. $trame['date'] .'</p>';
                             echo '<a id="db_right" class="db_left">></a>';
                         echo '</div>';
                         echo '<div class="item itemInfoPaquet">';
                             echo '<h3 class="graph-title">Info paquet</h3>';
                             if ($trame['version'] == '4') {
                                 echo '<p id="protocol">Protocole : Ipv4 </p>';
                             } elseif ($trame['version'] == '6') {
                                 echo '<p id="protocol">Protocole : Ipv6 </p>';
                             }
                             echo '<p id="headerLength">Header Length : '. $trame['headerLength'] .' </p>';
                             echo '<p id="service">Service : '. $trame['service'] .'</p>';
                             echo '<p id="identification">Identification : '. $trame['identification'] .'</p>';
                             echo '<p id="flags">Flags : '. $trame['flags'] .'</p>';
                             echo '<p id="ttl">TTL (Time to live) : '. $trame['ttl'] .'</p>';
                             echo '<p id="headerChecksum">Header Checksum : '. $trame['headerChecksum'] .' </p>';
                             echo '<p id="name">Name : '. $ip_protocol['name'] .' </p>';
                             echo '<p id="flags_code">flags_code : '. $ip_protocol['flags_code'] .' </p>';
                             echo '<p id="checksum_status">checksum_status : '. $ip_protocol['checksum_status'] .' </p>';
                             echo '<p id="checksum_code">checksum_code : '. $ip_protocol['checksum_code'] .' </p>';
                             echo '<p id="type">type : '. $ip_protocol['type'] .' </p>';
                             echo '<p id="code">code : '. $ip_protocol['code'] .' </p>';
                         echo '</div>';
                         echo '<div class="item itemIp">';
                             echo '<h3 class="graph-title">Info paquet</h3>';
                             echo '<p id="ip_from">Source : '. ipfromHex($ip_protocol['ip_from']) .':'.$ip_protocol['ports_from'].' </p>';
                             echo '<p id="ip_dest">Destination : '. ipfromHex($ip_protocol['ip_dest']) .':'.$ip_protocol['ports_dest'].' </p>';
                         echo '</div>';
                         echo '<div class="item itemw2">';
                             echo '<h3 class="graph-title">TTL (Time To Live)</h3>';
                             echo '<canvas id="myChart" width="400" height="400"></canvas>';
                         echo '</div>';
                     echo '</div>';     
             echo '</div>';
         echo '</div>';
        $div_class += 1;
    }   
} else {
    echo '<div class="wrap2">';
        echo '<div class="notrames">';   
            echo '<p> Vous n\'avez pas de trames pour le moment </p>';
            echo '<p> Veuillez en ajouter une en utilisant le bouton ci-dessous </p>';
            echo '<a href="#" class="btn_addtrame" id="btn_addtrame_no">Ajouter une trame<a>';
        echo '</div>';
    echo '</div>';
}

 ?>



<?php include('src/template/db_footer.php'); ?>
