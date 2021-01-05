<?php
require('../src/inc/functions.php');
require('../src/inc/pdo.php');
session_start();
if (!is_logged()) {
    header('Location: ../401.php');
}
$title = 'Dashboard';
include('src/template/db_header.php');

$trames = SQL_SELECT('trames',true,'WHERE user_id =',$_SESSION['user']['id'],'ORDER BY date ASC');
$div_class = 1;
if (!empty($trames)) {
    foreach ($trames as $trame) {
        echo '<div class ="trame_'.$div_class.'" id="trame_'.$div_class.'">';
            echo '<div class="wrap2">';
                echo '<div class="items">';
                    echo '<div class="item itemDate" id="test">';
                        echo '<a id="db_left" class="db_left"><</a>';
                        echo '<p id="date">Date : '. $trame['date'] .'</p>';
                        echo '<a id="db_right" class="db_left">></a>';
                    echo '</div>';
                    echo '<div class="item itemInfoPaquet">';
                        echo '<h3 class="graph-title">Info paquet</h3>'; 
                    echo '</div>';
                    echo '<div class="item itemIp">';
                        echo '<h3 class="graph-title">Info paquet</h3>';
                    echo '</div>';
                    echo '<div class="item itemw2">';
                        echo '<h3 class="graph-title">TTL (Time To Live)</h3>';
                        echo '<canvas id="myChart" width="400" height="400"></canvas>';
                    echo '</div>';
                echo '</div>';     
            echo '</div>';
        echo '</div>';
        $div_class +=1;
    }   
} else {
    echo '<div class="wrap2">';
        echo '<div class="notrames">';   
            echo '<p> Vous n\'avez pas de trames pour le moment </p>';
            echo '<p> Veuillez en ajouter une en utilisant le bouton ci-dessous </p>';
            echo '<a href="#" class="btn_addtrame" id="btn_addtrame_no">Ajouter une trame<a>';
        echo '</div>';
    echo '</div>';
}

?>



<?php include('src/template/db_footer.php'); ?>
