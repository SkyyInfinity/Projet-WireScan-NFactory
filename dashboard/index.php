<?php
require('../src/inc/functions.php');
require('../src/inc/pdo.php');
session_start();
if (!is_logged()) {
    header('Location: ../401.php');
}
$title = 'Dashboard';
include('src/template/db_header.php');
?>
    <div class="wrap2">
        
        <div class="notrames" id="notrames">
            <p> Vous n'avez pas de trames pour le moment </p>
            <p> Veuillez en ajouter une en utilisant le bouton ci-dessous </p>
            <a href="#" class="btn_addtrame" id="btn_addtrame_no">Ajouter une trame<a>
        </div>
        
    </div>
<?php include('src/template/db_footer.php'); ?>
