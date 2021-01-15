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
    </div>
    <div class="globalmode" id="globalmode">
      <div class="select_btnGlob" id="select_btnGlob">
        <div class="select select_glob">
          <a href="#" id="recap_btn">Recapitulatif</a>
          <a href="#" id="graphique_btn">Graphique</a>
          <a href="#" id="textuel_btn">Journal d'évènements</a>
        </div>
      </div>

      <div class="recap" id="recap">
      <h1 class="title-dashboard">Recapitulatif</h1>
      </div>

      <div class="graphique" id="graphique">
        <h1 class="title-dashboard">Graphiques</h1>
        <div class="item">
          <p>Pertes de TTL :</p>
          <canvas id="myChart"></canvas>
        </div>
        <div class="item">
          <p>Trames par type de requête :</p>
          <canvas id="myChart2"></canvas>
        </div>
        <div class="item">
          <p>Requête en echec :</p>
          <canvas id="myChart3"></canvas>
        </div>
      </div>

      <div class="textuel_cont" id="textuel_cont">
        <h1 class="title-dashboard">Journal d'évènements</h1>
        <div class="textuel" id="textuel">

        </div>
      </div>

    </div>

    <div class="uniquemode" id="uniquemode">
      <div class="select select_trame">
        <div class="item itemDate">
          <div class="left_cont" id="left_cont">
            <a id="db_left" class="db_left"><img src="assets/img/chevron-left-solid.svg" alt=""></a>
          </div>
          <div class="date_cont" id="date_cont">
            <p id="date"></p>
          </div>
          <div class="right_cont" id="right_cont">
            <a id="db_right" class="db_right"><img src="assets/img/chevron-right-solid.svg" alt=""></a>
          </div>
        </div>
      </div>
      <div class="item item_unique_TTLGRAPH">
        <p>TTL :</p>
        <canvas id="myChart4"></canvas>
      </div>
      <div class="item item_unique_ip" id="from_unique">
        <p>Expediteur et destinataire</p>
        <br>
      </div>
      <div class="item item_unique_protocol">
        
      </div>
    </div>
  </div>

  <div class="notrames" id="notrames">
    <p> Vous n'avez pas de trames pour le moment </p>
    <p> Veuillez en ajouter une en utilisant le bouton ci-dessous </p>
    <a href="#" class="btn_addtrame" id="btn_addtrame_no">Ajouter une trame<a>
  </div>
</div>
<?php include('src/template/db_footer.php'); ?>