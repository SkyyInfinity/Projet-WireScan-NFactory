<?php
session_start();
$title = 'Qui sommes-nous ?';
?>

<?php
include('src/inc/functions.php');
include('./src/template/header.php'); ?>

  <!--  TITRE + PRESENTATION  -->

<section class="section-intro">
  <div class="wrap">
    <h1 class="titre3">Qui sommes-nous ?</h1>
    <p class="paraG">En tant qu’intégrateur d’infrastructure informatique, <span class="gras">WireScan</span> vous explique, à travers ce tout nouvel article, les enjeux de son métier. De la phase d’audit et d’analyse du contexte d’un client jusqu’au déploiement et à la maintenance du réseau d’entreprise, l’équipe Expert Line vous accompagne tout au long de votre projet et vous assure un niveau de sécurisation maximum.</p>
  </div>
</section>
      <!--   CARROUSEL     -->

<div class="flexslider carousel flexslider-carroussel">
  <ul class="slides">
    <li>
      <img src="./assets/img/aboutUs/slide1.jpg" />
    </li>
    <li>
      <img src="./assets/img/aboutUs/slide1.jpg" />
    </li>
    <li>
      <img src="./assets/img/aboutUs/slide1.jpg" />
    </li>
    <li>
      <img src="./assets/img/aboutUs/slide1.jpg" />
    </li>
  </ul>
</div>
        <!-- ARTICLE 1 : TITRE + DESCRIPTION DU SERVICE -->

<section class="section_solution">
  <div class="wrap">
    <h1 class="titre4">Des solutions de sécurité intégrées robustes</h1>
    <p class="paraG">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id</p>
    <p class="paraG">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim</p>
    <p class="paraG"></br>Vous voulez en savoir plus sur notre expertise et notre savoir-faire en intégration et sécurité réseau ?
      <a href="#">Contactez-nous !</a> </p>
  </div>
</section>

        <!-- ARTICLE 2 : NOUS + PRARAGRAPHE DE PRESENTATION DU GROUPE A L'ORIGINE DU PROJET -->

<section class="section_presentation">
  <div class="wrap">
    <h1 class="titre4">Nous, c'est qui exactement ?</h1>
    <p class="paraG">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</section>

        <!-- PRESENTATION DES DIFFERENTS MEMBRES -->

<div class="fondateur-box">
  <div class="fondateur">
    <i class="fas fa-user-circle"></i>
    <h1 class="prenom">Lui c'est Kévin</h1>
    <p>Lorem ipsum dolor sit amet.</p>
  </div>
  <div class="fondateur">
    <i class="fas fa-user-circle"></i>
    <h1 class="prenom">Lui c'est Valentin</h1>
    <p>Lorem ipsum dolor sit amet.</p>
  </div>
  <div class="fondateur">
    <i class="fas fa-user-circle"></i>
    <h1 class="prenom">Lui c'est Florian</h1>
    <p>Lorem ipsum dolor sit amet.</p>
  </div>
  <div class="fondateur">
    <i class="fas fa-user-circle"></i>
    <h1 class="prenom">Lui c'est Dylan</h1>
    <p>Lorem ipsum dolor sit amet.</p>
  </div>
</div>
</div>


<?php include('./src/template/footer.php'); ?>
