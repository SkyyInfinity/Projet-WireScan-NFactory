<?php
require('src/inc/functions.php');
include('src/inc/pdo.php');

$title = 'Changement de mot de passe';
$usertoken = trim(strip_tags($_GET['token']));

// if (empty($usertoken)) {
//     header('Location: 401.php');
// }
$sql = SQL_SELECT('users',false,'WHERE token =',$usertoken);

// if (empty($sql)) {
//     header('Location: 401.php');
// }

// if ($sql['status_passwrd'] == false) {
//     header('Location: 401.php');
// }
// EDIT SQL STATUS_PASSWRD APRES MODIF MDP
// $userid = $sql['id'];


include('src/template/resetheader.php');
echo '<p style="display:none" id="userid">'.$sql['id'].'</p>';
?>
<div id="reset_cont">
    <h1 class="title-form">Modification de votre mot de passe</h1>
    <form method="post" id="passchange" class="formulaire">
        <div class="champ mdp1">
            <label for="password">Nouveau mot de passe</label>
            <input type="password" name="password" id="password">
            <span class="error" id="error_password"></span>
            <div class="info_mdp" id="info_mdp">
                <span class="verifmdp" id="verifmdp">Votre mot de passe doit contenir au moins 8 caractéres ainsi qu'une majuscule , une minuscule , un chiffre et un charactére spécial."</span>
            </div>
        </div>
        <div class="champ mdp2">
            <label for="password2">Confirmation</label>
            <input type="password" name="password2" id="password2">
            div>ul>l
            <span class="error" id="error_password2"></span>
        </div>
        <input type="submit">
    </form>
</div>

<?php 

include('src/template/resetfooter.php');