<?php 
require('../src/inc/functions.php');
$errors = array();
$success = false;
$nom = trim(strip_tags($_POST['nom']));
$prenom = trim(strip_tags($_POST['prenom']));
$email = trim(strip_tags($_POST['email']));
// Validation Email deja utilisé ?
$password = trim(strip_tags($_POST['password'])); 
$password2 = trim(strip_tags($_POST['password2'])); 
$entreprise = trim(strip_tags($_POST['entreprise']));
$errors = validText($errors,$nom,'nom',4,30);
$errors = validText($errors,$prenom,'prenom',4,30);
$errors = validText($errors,$email,'email','','',$emailM = true);
$errors = validText($errors,$password,'password',4,30);
$errors = validText($errors,$entreprise,'entreprise',4,30);
if(count($errors) == 0 ) {
    $success = true;
    $values = array (
        'nom' => $nom,
        'prenom' => $prenom,
    );
    // SQL_INSERT('users','')
}
$data = array(
    'errors' => $errors,
    'success' => $success
);
showJson($data);