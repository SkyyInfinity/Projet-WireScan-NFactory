<?php
// require('src/inc/functions.php');
// require('src/inc/pdo.php');

$title = 'Dashboard';

include('src/template/db_header.php'); ?>

<div class="wrap2">
    <form id="sendtrame" class="sendtrame">
        <input type="file" id="jsonfile" accept=".json" >
        <span class="error" id="error_json"></span>
        <input type="submit">
    </form>
</div>

<?php include('src/template/db_footer.php'); ?>