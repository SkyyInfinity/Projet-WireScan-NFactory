<?php 
require('../../src/inc/functions.php');
include('../../src/inc/pdo.php');
$errors = array();
$success = false;

$json = array();
$json = trim(strip_tags($_POST['trame']));
// echo $_POST['trame'];


if (!empty($json)) {

} else {
    $errors['json'] = 'Veuillez ajouter un fichier .json';
}

if(count($errors) == 0 ) {
    $success = true;
}
$data = array(
    'errors' => $errors,
    'success' => $success,
);
showJson($data);
?>