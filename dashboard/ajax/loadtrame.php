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
        }
    }
    $info['ttl_sum'] = $ttl_sum;
    $info['ttl_count'] = (128*count($trames));
    $info['ttl_pass_%'] = (($ttl_sum / $info['ttl_count'])*100);
    $info['ttl_lost_%'] = abs((($ttl_sum / $info['ttl_count'])*100) - 100);
    $info['nbrTrames'] = count($trames);
}

$data = array(
    'trames' => $trames,
    'info' => $info,
    'success' => $success
);

showJson($data);
?>