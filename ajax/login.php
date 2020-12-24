<?php 
require('../src/inc/functions.php');
include('../src/inc/pdo.php');
session_start();
$errors = array();
$success = false;
$email = trim(strip_tags($_POST['email']));
$password = trim(strip_tags($_POST['password'])); 
$sql = SQL_SELECT('users',false,'WHERE email =',$email);


if (empty($email)) {
    $errors['email'] = 'Veuillez renseigné ce champs';
}
if (empty($password)) {
    $errors['password'] = 'Veuillez renseigné ce champs';
}
if (!empty($sql)) {
    if(!password_verify($password, $sql['password'])) {
        $errors['password'] = 'Erreur mot de passe incorrect.';
    }
} elseif (empty($sql)) {
    if (empty($errors['email'])) {
        $errors['email'] = 'Cette adresse ne correspond à aucun compte.';
    }
}

if(count($errors) == 0 ) {
    $success = true;
        $_SESSION['user'] = array(
          'id' => $sql['id'],
          'nom' => $sql['nom'],
          'prenom' => $sql['prenom'],
          'entreprise' => $sql['entreprise'],
        );
}
$data = array(
    'errors' => $errors,
    'success' => $success
);     
showJson($data);
