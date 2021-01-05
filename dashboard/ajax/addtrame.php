<?php 
require('../../src/inc/functions.php');
include('../../src/inc/pdo.php');
$errors = array();
$success = false;

$json = trim(strip_tags($_POST['trame'])); // récuperation du contenu du fichier trame
$user_id = trim(strip_tags($_POST['user_id']));
$from = trim(strip_tags($_POST['from']));
//$user_id = "45";
//$from = 'jsonurl';
//$json = file_get_contents('tram.txt');
$json = json_decode($json, true); // JSON vers string
// debug($json); 

if ($from == "jsonurl") {
    if (!empty($json)) {

    } else {
        $errors['json'] = 'Veuillez renseigner le champ';
    }
} elseif ($from == "jsoninput") {
    if (!empty($json)) {

    } else {
        $errors['json'] = 'Veuillez ajouter un fichier .json';
    }
} elseif ($from == "jsonTA") {
    if (!empty($json)) {
    } else {
        $errors['json'] = 'Veuillez renseigné le champ';
    }
}

if(count($errors) == 0 ) {
    $success = true;
    breakJSONToSQL($json,$user_id);
}
$data = array(
    'errors' => $errors,
    'success' => $success,
);
showJson($data);
?>