<?php 
require('../../src/inc/functions.php');
include('../../src/inc/pdo.php');
$errors = array();
$success = false;

// $json = array();

// $json = trim(strip_tags($_POST['trame']));
$json = file_get_contents('trame.txt');
$json = json_decode($json, true);
// debug($json); 
$i = 0;
foreach($json as $data) {
    ${'data_'.$i} = $data;
    $i += 1;
}
echo $i;
debug($data_2);

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
// showJson($data);
?>