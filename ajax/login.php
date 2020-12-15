<?php 
 require('../inc/function.php');
 $errors = array();
 $succes = false;

 $nom = trim(strip_tags($_POST['nom']));
 $prenom = trim(strip_tags($_POST['prenom']));
 $email = trim(strip_tags($_POST['email']));
 $password = trim(strip_tags($_POST['password'])); 
 $entreprise = trim(strip_tags($_POST['entreprise']));

 $errors = validText($errors,$nom,'nom',4,30);
 $errors = validText($errors,$prenom,'prenom',4,30);
 $errors = validText($errors,$email,'email','','',$emailM = true);
 $errors = validText($errors,$password,'password');
 $errors = validText($errors,$entreprise,'entreprise');

 if(count($errors) == 0 ) {
     $succes = true;
 }

 $data = array(
     'errors' => $errors,
     'succes' => $succes
 );

 showJson($data);