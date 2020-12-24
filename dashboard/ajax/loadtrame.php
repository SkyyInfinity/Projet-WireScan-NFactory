<?php 
session_start();
require('../../src/inc/functions.php');
require('../../src/inc/pdo.php');
$errors = array();
$success = false;
$trames = SQL_SELECT('trames',true,'WHERE user_id =',$_SESSION['user']['id'],'ORDER BY date ASC');

$data = array(
    'trames' => $trames, 
);

showJson($data);
?>