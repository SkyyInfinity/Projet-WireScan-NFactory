<?php 
session_start();
require('../../src/inc/functions.php');
include('../../src/inc/pdo.php');
$errors = array();
$success = false;

$user_id = $_SESSION['user']['id'];
$trames = trim(strip_tags($_POST['trame'])); 
$from = trim(strip_tags($_POST['from']));

if ($from == "jsonurl") {
    if (!empty($trames)) {

    } else {
        $errors['json'] = 'Veuillez renseigner le champ';
    }
} elseif ($from == "jsoninput") {
    if (!empty($trames)) {
        $trames = json_decode($trames, true);
    } else {
        $errors['json'] = 'Veuillez ajouter un fichier .json';
    }
} elseif ($from == "jsonTA") {
    if (!empty($trames)) {
        $trames = json_decode($trames, true);
    } else {
        $errors['json'] = 'Veuillez renseigné le champ';
    }
}
if(count($errors) == 0 ) {
    $success = true;
    breakJSONToSQL($trames,$user_id);
}
$data = array(
    'errors' => $errors,
    'success' => $success,
);
showJson($data);
?>