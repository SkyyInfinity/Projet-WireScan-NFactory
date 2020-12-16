<?php
require('src/inc/functions.php');
require('src/inc/pdo.php');

$title = 'Accueil';


include('src/template/header.php'); ?>

<div class="flexslider flexslider-home">
  <ul class="slides">
    <li>
      <img src="https://picsum.photos/1920/600" />
    </li>
    <li>
      <img src="https://picsum.photos/1920/600" />
    </li>
    <li>
      <img src="https://picsum.photos/1920/600" />
    </li>
    <li>
      <img src="https://picsum.photos/1920/600" />
    </li>
  </ul>
</div>

<?php include('src/template/footer.php'); ?>