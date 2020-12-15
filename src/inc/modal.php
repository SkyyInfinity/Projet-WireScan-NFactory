<!-- Modal Connexion/Deconnexion  -->
<div class="modal" id="login-modal">
    <div class="login_select">
        <a href="#" class="btn_login active_login" id="btn_inscription">Inscription</a>
        <a href="#" class="btn_login" id="btn_connexion">Connexion</a>
    </div>
    <div class="login_container">
        <div class="inscription_cont">
            <form id="inscription" class="formulaire" novalidate>
                <label for="nom">Identifiant</label>
                <input type="text" id="nom" name="nom">
                <span class="error" id="error_nom"></span>

                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span class="error" id="error_nom"></span>

                <label for="password2">Comfirmation</label>
                <input type="password" id="password2" name="password2">
                <span class="error" id="error_nom"></span>

                <input type="submit" value="Inscription">
            </form>
        </div>
        <div class="connexion_cont">
            <form id="connexion" class="formulaire">
                <label for="Emailpseudo">Identifiant</label>
                <input type="text" id="Emailpseudo" name="Emailpseudo">

                <label for="password">Password</label>
                <input type="text" id="password" name="password">

                <input type="submit" value="Connexion">
            </form>
        </div>
    </div>
</div>