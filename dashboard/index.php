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
          <div class="select select_glob">
            <a href="#" id="recap_btn">Recapitulatif</a>
            <a href="#" id="graphique_btn">Graphique</a>
            <a href="#" id="textuel_btn">Textuel</a>
          </div>

          <div class="recap" id="recap">
          
          </div>

          <div class="graphique" id ="graphique">
          <div class="item">
              <p>Graph :</p>
              <canvas id="myChart"></canvas>
            </div>
            <div class="item">
              <p>Nombre de requete :</p>
              <canvas id="myChart2"></canvas>
            </div>
            <div class="item">
              <p>Requete en echec :</p>
              <canvas id="myChart3"></canvas>
            </div>
          </div>

          <div class="textuel" id="textuel">

          </div>

        </div>

        <div class="uniquemode" id="uniquemode">
          <div class="select select_trame">
          <div class="item itemDate">
                    <a id="db_left" class="db_left"><</a>
                    <p id="date"></p>
                    <a id="db_right" class="db_right">></a>
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
        </div>
      </div>

      <div class="notrames" id="notrames">
        <p> Vous n'avez pas de trames pour le moment </p>
        <p> Veuillez en ajouter une en utilisant le bouton ci-dessous </p>
        <a href="#" class="btn_addtrame" id="btn_addtrame_no">Ajouter une trame<a>
      </div>
    </div>
    <?php include('src/template/db_footer.php'); ?>