<?php 
require('../src/inc/functions.php');
include('../src/inc/pdo.php');
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
$errors = validEmail($errors,$email,'email');
// Validation et hashage du MDP
$errors = validPassword($errors, $password, $password2,'password','password2',8,32);
$errors = validText($errors,$entreprise,'entreprise',4,30);

if(count($errors) == 0 ) {
    $success = true;
    $passwordhash = password_hash($password, PASSWORD_DEFAULT);
    $token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($token);
    $values = array('nom' => $nom, 'prenom' => $prenom,'email' =>$email, 'password'=>$passwordhash, 'token'=>$token, 'created_at'=>date('Y-m-d H:i:s'),'status' =>'1','ip'=>$_SERVER['REMOTE_ADDR'],'entreprise'=>$entreprise);
    $dateNow = date('Y-m-d H:i:s');
    SQL_INSERT('users','nom,prenom,email,password,token,created_at,status,ip,entreprise',$values);
}
$data = array(
    'errors' => $errors,
    'success' => $success
);
showJson($data);