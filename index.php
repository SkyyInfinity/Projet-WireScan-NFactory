<?php
require('src/inc/functions.php');
require('src/inc/pdo.php');

$title = 'Accueil';

include('src/inc/modal.php');
include('src/template/header.php'); ?>

<div class="flexslider flexslider-home">
  <ul class="slides">
    <li><img src="./assets/img/home-slide1.jpg"/></li>
    <li><img src="./assets/img/home-slide2.jpg"/></li>
    <li><img src="./assets/img/home-slide3.jpg"/></li>
  </ul>
</div>
<section class="section-subscribeNow">
    <a id="js_inscription2" href="#login-modal" rel="modal:open" class="btn-2">S'inscrire maintenant !</a>
</section>
<section class="section-informations">
    <div class="info-box">
        <i class="fas fa-tachometer-alt"></i>
        <h2>Rapide</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta, doloremque, omnis numquam qui distinctio neque unde iusto voluptate nobis eos praesentium quisquam assumenda. Eos earum laboriosam ipsum ipsam at. Consequuntur tenetur ab quis nisi eius officia nobis dolorem, facere laboriosam voluptas, perspiciatis repudiandae tempore suscipit, quia quidem illum voluptate. Officia excepturi libero quidem neque quas velit iusto qui accusamus</p>
    </div>
    <div class="info-box">
        <i class="fas fa-shield-alt"></i>
        <h2>Sécurisé</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta, doloremque, omnis numquam qui distinctio neque unde iusto voluptate nobis eos praesentium quisquam assumenda. Eos earum laboriosam ipsum ipsam at. Consequuntur tenetur ab quis nisi eius officia nobis dolorem, facere laboriosam voluptas, perspiciatis repudiandae tempore suscipit, quia quidem illum voluptate. Officia excepturi libero quidem neque quas velit iusto qui accusamus</p>
    </div>
    <div class="info-box">
        <i class="fas fa-hand-holding-usd"></i>
        <h2>Gratuit</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta, doloremque, omnis numquam qui distinctio neque unde iusto voluptate nobis eos praesentium quisquam assumenda. Eos earum laboriosam ipsum ipsam at. Consequuntur tenetur ab quis nisi eius officia nobis dolorem, facere laboriosam voluptas, perspiciatis repudiandae tempore suscipit, quia quidem illum voluptate. Officia excepturi libero quidem neque quas velit iusto qui accusamus</p>
    </div>
</section>

<?php include('src/template/footer.php'); ?>