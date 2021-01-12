<?php
session_start();
require('src/inc/functions.php');
require('src/inc/pdo.php');

$title = 'Nous contacter';

include('src/template/header.php'); ?>

<section class="section-contact">
    <!-- PAR MESSAGE -->
    <div class="parmessage">
        <h1 class="title-form">Par email</h1>
        <form id="contact" action="" method="post" novalidate>
            <!-- NOM -->
            <div class="champ nom">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom">
                <span class="error" id="error_nom"></span>
            </div>
            <!-- PRENOM -->
            <div class="champ prenom">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom">
                <span class="error" id="error_prenom"></span>
            </div>
            <!-- EMAIL -->
            <div class="champ email">
                <label for="email">Adresse Email</label>
                <input type="email" id="email" name="email">
                <span class="error" id="error_email"></span>
            </div>
            <!-- SUJET -->
            <div class="champ subject">
                <label for="subject">Sujet</label>
                <input type="text" id="subject" name="subject">
                <span class="error" id="error_subject"></span>
            </div>
            <!-- MESSAGE -->
            <div class="champ message">
                <label for="message">Votre message</label>
                <textarea name="message"></textarea>
                <span class="error" id="error_message"></span>
            </div>
            <input class="btn-3" type="submit" value="Envoyer">
        </form>
    </div>
    <!-- PAR RESEAUX SOCIAUX -->
    <div class="parrs">
        <h1 class="title-form">Par réseaux sociaux</h1>
        <div class="rs">
            <a href="https://linkedin.com" target="_blank" class="linkedin">LinkedIn | <i class="fab fa-linkedin-in"></i></a>
            <a href="https://facebook.com" target="_blank" class="facebook">Facebook | <i class="fab fa-facebook"></i></a>
            <a href="https://twitter.com" target="_blank" class="twitter">Twitter | <i class="fab fa-twitter"></i></a>
            <a href="https://instagram.com" target="_blank" class="instagram">Instagram | <i class="fab fa-instagram"></i></a>
        </div>
    </div>
</section>
<section class="section-logocontact">
    <img src="./assets/img/logox500.png" alt="logo du site">
</section>

<?php include('src/template/footer.php'); ?>