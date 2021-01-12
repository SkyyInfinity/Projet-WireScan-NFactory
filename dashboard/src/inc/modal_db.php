<p id="output_field" class="output_field"></p>
<div class="modal" id="modal_addTrame">
    <div class="upload_select">    
        <a href="#" class="btn_addcont" id="btn_viaLien">Via lien</a>       
        <a href="#" class="btn_addcont" id="btn_viaTA">Via texte brut</a>
        <a href="#" class="btn_addcont" id="btn_viaInput">Via fichier</a>
    </div>

    <div class="viaLien_container">
        <h1 class="title-form">Via un lien</h1>
        <form id="sendtrame_lien" class="sendtrame_input">
            <div class="champ">
                <label for="jsonurl">Insérer votre lien</label>
                <input type="text" id="jsonurl" class="jsonurl">
                <span class="error" id="ok_json_url"></span>
                <span class="error" id="error_json_url"></span>
            </div>
            <input class="btn-2" type="submit" value="Ajouter">
        </form>
    </div>

    <div class="viaInput_container">
        <h1 class="title-form">Via un fichier</h1>
        <form id="sendtrame_input" class="sendtrame_input">
            <div class="champ">
                <label class="jsonfile" for="jsonfile">Télécharger votre fichier...</label>
                <input type="file" id="jsonfile" accept=".json">
                <span class="error" id="ok_json_file"></span>
                <span class="error" id="error_json_file"></span>
            </div>
            <input class="btn-2" type="submit" value="Ajouter">
        </form>
    </div>

    <div class="viaTA_container">
        <h1 class="title-form">Via du texte brut</h1>
        <form id="sendtrame_TA" class="sendtrame_input">
            <div class="champ">
                <label for="jsonTA">Insérer votre texte</label>
                <textarea name="jsonTA" id="jsonTA" cols="30" rows="10"></textarea>
                <span class="error" id="ok_json_TA"></span>
                <span class="error" id="error_json_TA"></span>
            </div>
            <input class="btn-2" type="submit" value="Ajouter">
        </form>
    </div>
</div>