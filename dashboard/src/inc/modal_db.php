<p id="output_field" class="output_field"></p>
<p id="user_id" class="user_id"><?php echo $_SESSION['user']['id'] ?></p>
<div class="modal" id="modal_addTrame">
    <div class="login_select">
        <a href="#" class="btn_addcont" id="btn_viaLien">Lien</a>
        <a href="#" class="btn_addcont" id="btn_viaInput">Fichier</a>
        <a href="#" class="btn_addcont" id="btn_viaTA">Brut</a>
    </div>

    <div class="viaLien_container">
        <h1 class="title-form">Via un lien</h1>
        <form id="sendtrame_lien" class="sendtrame_input">
            <input type="text" id="jsonurl" class="jsonurl">
            <input type="submit">
        </form>
    </div>

    <div class="viaInput_container">
        <h1 class="title-form">Via un fichier</h1>
        <form id="sendtrame_input" class="sendtrame_input">
            <input type="file" id="jsonfile" accept=".json">
            <span class="error" id="error_json"></span>
            <input type="submit">
        </form>
    </div>

    <div class="viaTA_container">
        <h1 class="title-form">Via du text brut</h1>
        <form id="sendtrame_TA" class="sendtrame_input">
            <textarea name="jsonTA" id="jsonTA" cols="30" rows="10"></textarea>
            <span class="error" id="error_json_TA"></span>
            <input type="submit">
        </form>
    </div>
</div>