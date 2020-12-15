<?php 

require('../inc/function.php');
$errors = array();
$success = false;
// Faille XSS 
$nom = trim(strip_tags($_POST['nom']));
$prenom = trim(strip_tags($_POST['prenom']));
$email = trim(strip_tags($_POST['email']));
$password = trim(strip_tags($_POST['password'])); 
$entreprise = trim(strip_tags($_POST['entreprise']));

$errors = validText($errors,$nom,'nom',4,30);
$errors = validText($errors,$prenom,'prenom',4,30);
$errors = validText($errors,$email,'email','','',$emailM = true);
// $errors = validEmail($errors,$email,'email');