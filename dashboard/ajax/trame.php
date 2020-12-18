<?php 
require('../../src/inc/functions.php');
include('../../src/inc/pdo.php');
$errors = array();
$success = false;

// $json = trim(strip_tags($_POST['trame'])); // récuperation du contenu du fichier trame
$json = file_get_contents('trame.txt');
$json = json_decode($json, true); // JSON vers string
// debug($json); 


if (!empty($json)) {

} else {
    $errors['json'] = 'Veuillez ajouter un fichier .json';
}


if(count($errors) == 0 ) {
    $success = true;
    //Ajouter a fonction.php une fois terminer !!!!

    ///////////////////////////////////
    breakJSONToSQL($json);
}
$data = array(
    'errors' => $errors,
    'success' => $success,
);
debug($data);
// showJson($data);
?>