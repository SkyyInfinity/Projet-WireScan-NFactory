<?php
$title = 'Qui sommes-nous ?';
?>

<?php 
include('src/inc/modal.php');
include('./src/template/header.php'); ?>

  <!--  TITRE + PRESENTATION  -->

<div>
  <h1 class="titre3">Qui sommes-nous ?</h1>
</div>
<div class="wrap">
  <div class="paraG">
    <p>En tant qu’intégrateur d’infrastructure informatique, <span class="gras">Wire<span class="or">scan</span></span> vous explique, à travers ce tout nouvel article, les enjeux de son métier. De la phase d’audit et d’analyse du contexte d’un client jusqu’au déploiement et à la maintenance du réseau d’entreprise, l’équipe Expert Line vous accompagne tout au long de votre projet et vous assure un niveau de sécurisation maximum.</p>
  </div>
</div>
      <!--   CARROUSEL     -->

<div class="flexslider carousel flexslider-carroussel">
  <ul class="slides">
    <li>
      <img src="https://picsum.photos/1920/1080" />
    </li>
    <li>
      <img src="https://picsum.photos/1920/1080" />
    </li>
    <li>
      <img src="https://picsum.photos/1920/1080" />
    </li>
    <li>
      <img src="https://picsum.photos/1920/1080" />
    </li>
  </ul>
</div>
        <!-- ARTICLE 1 : TITRE + DESCRIPTION DU SERVICE -->

<section class="section_solution">
  <div class="wrap">
    <h1 class="titre4">Des solutions de sécurité intégrées robustes</h1>
    <p class="paraT">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p class="paraT">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <p class="paraT">Vous voulez en savoir plus sur notre expertise et notre savoir-faire en intégration et sécurité réseau ?
      <a href="#">Contactez-nous !</a> </p>
  </div>
</section>

        <!-- ARTICLE 2 : NOUS + PRARAGRAPHE DE PRESENTATION DU GROUPE A L'ORIGINE DU PROJET -->

<section class="section_presentation">
  <div class="wrap">
    <h1 class="titre4">Nous, c'est qui exactement ?</h1>
    <p class="paraH">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</section>

        <!-- PRESENTATION DES DIFFERENTS MEMBRES -->

<h1 class="titre5"></h1>
<div class="fondateur-box">
  <div class="fondateur">
    <i class="fas fa-user-circle"></i>
    <h1 class="prenom">Lui c'est Laurent</h1>
    <p>Je suis le seul gas sérieux de la bande</p>
  </div>
  <div class="fondateur">
    <i class="fas fa-user-circle"></i>
    <h1 class="prenom">Lui c'est Thierry</h1>
    <p>Hmm j'adore la bonne tapenade de Marseille</p>
  </div>
  <div class="fondateur">
    <i class="fas fa-user-circle"></i>
    <h1 class="prenom">Lui c'est Michel</h1>
    <p>J'adore les chocapic, c'est fort en chocolat</p>
  </div>
  <div class="fondateur">
    <i class="fas fa-user-circle"></i>
    <h1 class="prenom">Lui c'est Patrick</h1>
    <p>J'adore l'humour, c'est vraiment très drole</p>
  </div>
</div>
</div>


<?php include('./src/template/footer.php'); ?>
