<?php 
require('../src/inc/functions.php');
include('../src/inc/pdo.php');
$errors = array();
$success = false;

$nom = cleanXss($_POST['nom']);
$errors = validText($errors, $nom , 'nom', 1, 50);
$prenom = cleanXss($_POST['prenom']);
$errors = validText($errors,$prenom, 'prenom', 2, 50);
$email = cleanXss($_POST['email']);
$errors = validEmail($errors, $email , 'email');
$subject = cleanXss($_POST['subject']);
$errors = validText($errors, $subject, 'subject', 10, 100);
$message = cleanXss($_POST['message']);
$errors = validText($errors, $message, 'message', 7, 2000);

if (count($errors) == 0) {
    $success = true;
    $values = array (
    'nom' => $nom,
    'prenom' => $prenom,
    'email' => $email,
    'subject' => $subject,
    'message' => $message
    );
    SQL_INSERT('contact','nom,prenom,email,subject,message',$values);
}

$data = array(
    'errors' => $errors,
    'success' => $success
);     
showJson($data);
?>