<?php
require('../src/inc/functions.php');
include('../src/inc/pdo.php');

$errors = array();
$success = false;

$password = trim(strip_tags($_POST['password'])); 
$password2 = trim(strip_tags($_POST['password2']));
$usertoken = trim(strip_tags($_POST['usertoken']));


$errors = validPassword($errors, $password, $password2,'password','password2',8,32);

if(count($errors) == 0 ) {
    $success = true;
    $sql = SQL_SELECT('users',false,'WHERE token =',$usertoken);
    $userid = $sql['id'];
    $passhash = password_hash($password, PASSWORD_DEFAULT);
    $token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($token);
    $status = 0;
    $sql = "UPDATE users SET password = :passhash, token = :ntoken, status_passwrd = :status_password  WHERE token = :token AND id = :id";
    $query = $pdo->prepare($sql);
    $query->bindValue(':passhash',$passhash,PDO::PARAM_STR);
    $query->bindValue(':ntoken',$token,PDO::PARAM_STR);
    $query->bindValue(':status_password',$status,PDO::PARAM_STR);
    $query->bindValue(':token',$usertoken,PDO::PARAM_INT);
    $query->bindValue(':id',$userid,PDO::PARAM_INT);

    $query->execute();
    
}
$data = array(
    'errors' => $errors,
    'success' => $success
);
showJson($data);


?>