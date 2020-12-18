<?php
require('src/inc/functions.php');
require('src/inc/pdo.php');

$title = 'Oups, cette page n\'existe pas';

include('src/inc/modal.php');
include('src/template/header.php'); ?>

<section class="section-errorCode">
    <h2 class="title-errorCode">401</h2>
    <p class="para-errorCode">Oups, vous devez être connecté pour accéder à cette page.</p>
    <a href="./index.php" class="btn-1 backToHome">Retour à l'accueil</a>
    <img src="./assets/img/error-code.svg" alt="Fond des code d'erreurs">
</section>

<?php include('src/template/footer.php'); ?>