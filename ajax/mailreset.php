<?php
require('../src/inc/functions.php');
include('../src/inc/pdo.php');
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;
$errors = array();
$success = false;
$useremail = trim(strip_tags($_POST['email']));
// $useremail = "florian.galvani@gmail.com";
$sql = SQL_SELECT('users',false,'WHERE email =',$useremail);


if (empty($useremail)) {
   $errors['email'] = 'Veuillez renseigné ce champs';
} else {
   if (empty($sql)) {
   $errors['email'] = 'Cette adresse ne correspond à aucun compte.';
   }
   if ($sql['status_passwrd'] == TRUE) {
      $errors['email'] = 'Un email vous a déja etait envoyé';
   }
}

if(count($errors) == 0 ) {
   $success = true;
   $token = $sql['token'];
   require '../vendor/autoload.php';
   $mail = new PHPMailer(); // create a new object
   $mail->IsSMTP(); // enable SMTP
   $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
   $mail->SMTPAuth = true; // authentication enabled
   $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
   $mail->Host = "smtp.gmail.com";
   $mail->Port = 465; // or 587
   $mail->IsHTML(true);

   $mail->Subject = "Reinitialisation de votre mot de passe";
   $mail->Body = "Bonjour" . $sql['prenom'] . "Veuillez cliqué sur le lien suivant afin de modifier votre mot de passe<br> http://localhost/projet/Projet-Reseaux-NFactory/passreset.php?token=".$token;
   $mail->AddAddress($useremail);
   if(!$mail->Send()) {
      $mailerror = $mail->ErrorInfo;
       echo "Mailer Error: " . $mail->ErrorInfo;
   } else {
      // EDIT SQL STATUS_PASSWRD APRES MODIF MDP
      $userid = $sql['id'];
      $updatevals = array(
          'status_passwrd' => '1'
      );
      SQL_UPDATE('users',$updatevals,$param = 'WHERE id = ',$userid);
   }
}
$data = array(
   'errors' => $errors,
   'success' => $success,
);
showJson($data);


