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
            <div class="items">
                <div class="item itemDate">
                    <a id="db_left" class="db_left"><</a>
                    <p id="date"></p>
                    <a id="db_right" class="db_right">></a>
                </div>
                <div class="item itemInfoPaquet">
                    <h3 class="graph-title">Info paquet</h3>

                </div>
                <div class="item itemIp">
                    <h3 class="graph-title">Info Expediteur/Destinataire</h3>
                    <p id="from_ip"></p>
                    <p id="dest_ip"></p>
                </div>
                <div class="item itemflags">
                    <h3 class="graph-title">Flags</h3>
                    <p id="from_ip"></p>
                    <p id="dest_ip"></p>
                </div>
                <div class="item itemw2">
                    <h3 class="graph-title">TTL (Time To Live)</h3>
                    <canvas id="myChart" width="400" height="400"></canvas>
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
