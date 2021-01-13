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
  <div class="loading" id="loading">
    <img src="assets/img/preview.gif" alt="loading">
  </div>
  <div class="trames" id="trames">
    <div class="select select_all">
      <div class="select btn_switch">
        <a href="#" id="glob">Global</a>
        <a href="#" id="uniq">Unique</a>
      </div>
      <div class="globalmode" id="globalmode">
        <div class="select select_glob">
          <a href="#">changer de trames</a>
        </div>
        <div class="items select_global">
          <div class="item">
            <p>Graph :</p>
            <canvas id="myChart"></canvas>
          </div>
          <div class="item">
            <p>text :</p>
            <canvas id="myChart2"></canvas>
          </div>
          <div class="item">
            <p>flags :</p>
            <canvas id="myChart3"></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="uniquemode" id="uniquemode">
      <div class="items">
        <div class="select select_trame">
          <a href="#">changer de trames</a>
        </div>
        <div class="item" id="tTexte">tiyhjdtproityjpdom</div>
        <div class="item">lkdjhmowdjdwhguijd</div>
        <div class="item">wkfghnwdkghmwkdgh</div>
      </div>
      <div>
      </div>
      <div class="notrames" id="notrames">
        <p> Vous n'avez pas de trames pour le moment </p>
        <p> Veuillez en ajouter une en utilisant le bouton ci-dessous </p>
        <a href="#" class="btn_addtrame" id="btn_addtrame_no">Ajouter une trame<a>
      </div>

    </div>
    <?php include('src/template/db_footer.php'); ?>