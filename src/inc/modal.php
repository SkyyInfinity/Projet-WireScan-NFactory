<!-- Modal Connexion/Deconnexion  -->
<div class="modal" id="login-modal">
    <div class="login_select">
        <a href="#" class="btn_login active_login" id="btn_inscription">Inscription</a>
        <a href="#" class="btn_login" id="btn_connexion">Connexion</a>
    </div>
    <div class="login_container">
        <div class="inscription_cont">
            <form id="inscription" class="formulaire" novalidate>
                <h1>Inscription</h1>
                <label for="nom">Nom :</label>
                <input type="text" id="nom" name="nom">
                <span class="error" id="error_nom"></span>

                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="prenom">
                    <span class="error" id="error_prenom"></span>
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email">
                    <span class="error" id="error_email"></span>
    
                    <label for="password">Password :</label>
                    <input type="password" id="password" name="password">
                    <span class="error" id="error_password"></span>
    
                    <label for="password2">Confirmation :</label>
                    <input type="password" id="password2" name="password2">
                    <span class="error" id="error_password2"></span>
                    <label for="entreprise">Entreprise :</label>
                    <input type="text" id="entreprise" name="entreprise">
                    <span class="error" id="error_entreprise"></span>
    
                    <input type="submit" value="Inscription">
            </form>
        </div>
        <div class="connexion_cont">
            <form id="connexion" class="formulaire">
                <h1>Connexion</h1>
                <label for="Emailpseudo">Identifiant :</label>
                <input type="text" id="Emailpseudo" name="Emailpseudo">
                <span class="error" id="error_Emailpseudo"></span>
                <label for="password">Password</label>
                <input type="text" id="password" name="password">
                <span class="error" id="error_password"></span>
                <input type="submit" value="Connexion">
            </form>
        </div>
    </div>
</div>