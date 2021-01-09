<?php 
session_start();
require('../../src/inc/functions.php');
require('../../src/inc/pdo.php');
$errors = array();
$success = false;

$trames = SQL_SELECT('trames',true,'WHERE user_id =',$_SESSION['user']['id'],'ORDER BY date DESC');

if (!empty($trames)) {
    $success = true;
    foreach ($trames as $key => $trame) {
        foreach ($trame as $keyip => $ip) {
            if ($keyip == 'from_ip' or $keyip == 'dest_ip') {
               $trames[$key][$keyip] = ipfromHex($ip);
            }
        }
    }
}

$data = array(
    'trames' => $trames,
    'success' => $success
);

showJson($data);
?>