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
                if (!isset($trames[$key][$keyconv.'_sum'])) {
                    $trames[$key][$keyconv.'_sum'] = 0;
                }
                $trames[$key][$keyconv.'_lost'] = 128 - $conv;
                $ttl_sum += $conv;
                $ttl_count += 128;
            }
        }
    }
    $info['ttl_sum'] = $ttl_sum;
    $info['ttl_count'] = $ttl_count;
    $info['nbrTrames'] = count($trames);
}

$data = array(
    'trames' => $trames,
    'info' => $info,
    'success' => $success
);

showJson($data);
?>