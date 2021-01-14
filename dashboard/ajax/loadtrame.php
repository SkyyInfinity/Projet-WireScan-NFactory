<?php 
session_start();
require('../../src/inc/functions.php');
require('../../src/inc/pdo.php');
$errors = array();
$info = array();
$success = false;

$trames = SQL_SELECT('trames',true,'WHERE user_id =',$_SESSION['user']['id'],'ORDER BY date DESC');


if (!empty($trames)) {
    $success = true;
    $ttl_sum = 0;
    $ttl_count = 0;
    $udpN = 0;
    $tlsN = 0;
    $icmpN = 0;
    $tcpN = 0;
    $echecN = 0;
    foreach ($trames as $key => $trame) {
        foreach ($trame as $keyconv => $conv) {
            if ($keyconv == 'from_ip' or $keyconv == 'dest_ip') {
               $trames[$key][$keyconv] = ipfromHex($conv);
            }
            if ($keyconv == 'ttl') {
                $trames[$key][$keyconv.'_lost'] = 128 - $conv;
                $trames[$key][$keyconv.'_pass%'] = abs(($conv / 128) * 100 );
                $trames[$key][$keyconv.'_lost%'] = abs((($conv / 128) * 100 ) - 100);
                $ttl_sum += $conv;
            }
            if ($keyconv == 'status') {
                if ($conv == 'timeout') {
                    $echecN += 1;
                } else {
                    $trames[$key][$keyconv] = 'Ok';
                }
            }
            switch ($keyconv == "name") {
                case 0 : 

                    break;
                case $conv == 'UDP':
                    $udpN += 1;
                    break;
                case $conv == 'TCP':
                    $tcpN += 1;
                    break;
                case $conv == 'TLSv1.2':
                    $tlsN += 1;
                    break;
                case $conv == 'ICMP':
                    $icmpN += 1;
                    break;
            }
        }
    }
    $info['ttl_sum'] = $ttl_sum;
    $info['ttl_count'] = (128*count($trames));
    $info['ttl_pass_%'] = (($ttl_sum / $info['ttl_count'])*100);
    $info['ttl_lost_%'] = abs((($ttl_sum / $info['ttl_count'])*100) - 100);
    $info['nbrTrames'] = count($trames);
    $info['udp'] = $udpN;
    $info['tls'] = $tlsN;
    $info['icmp'] = $icmpN;
    $info['tcp'] = $tcpN;
    $info['trameN'] = count($trames) - $echecN;
    $info['echecN'] = $echecN;

}

$data = array(
    'trames' => $trames,
    'info' => $info,
    'success' => $success
);

showJson($data);
?>