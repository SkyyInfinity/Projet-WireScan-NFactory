<?php
require('../src/inc/functions.php');
// require('src/inc/pdo.php');
session_start();
if (!is_logged()) {
    header('Location: ../401.php');
}
$title = 'Dashboard';

include('src/template/db_header.php'); ?>

<div class="wrap2">
    <!-- <form id="sendtrame" class="sendtrame">
        <input type="file" id="jsonfile" accept=".json" >
        <span class="error" id="error_json"></span>
        <input type="submit">
    </form> -->
    <div class="items">
        <div class="item itemw2">
            <h3 class="graph-title">TTL (Time To Live)</h3>
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item itemw2"></div>
        <div class="item itemw2"></div>
        <div class="item"></div>
        <div class="item itemw3"></div>
        <div class="item itemw3"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item itemw3"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
    </div>
</div>

<?php include('src/template/db_footer.php'); ?>
