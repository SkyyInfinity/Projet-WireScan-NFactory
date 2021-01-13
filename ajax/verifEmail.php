<?php
require('../src/inc/functions.php');
include('../src/inc/pdo.php');
$errors = array();
$success = false;
$email = trim(strip_tags($_POST['email']));
$sql = SQL_SELECT('users',false,'WHERE email = :email',$email);
if (!empty($email)) {
    if (!empty($sql)) {
        $errors['email'] = 'Cette adresse est déja utilisé';
    }
} else {
    $errors['email'] = 'Veuillez renseigner ce champ';
}

if (!empty($sql)) {
    $errors['email'] = 'Cette adresse est déja utilisé';
}
if(count($errors) == 0 ) {
    $success = true;
}
$data = array(
    'errors' => $errors,
    'success' => $success
);

showJson($data);
