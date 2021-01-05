<!-- Modal Reset password -->
<div class="modal" id="passwd-modal">
    <div class="reset_cont" id="reset_cont">
        <h1 class="title-form">Mot de passe oublié</h1>
        <form id="mailresetform" class="formulaire" method="post" >
            <div class="champ email">
                <label for="mailreset">Email</label>
                <input type="email" id="mailreset" name="mailreset">
                <span class="error" id="error_email_reset"></span>
            </div>
            <input type="submit">
        </form>
    </div>
</div>
<!-- Modal Connexion/Deconnexion  -->
<div class="modal" id="login-modal">
    <div class="login_select">
        <a href="#" class="btn_login" id="btn_inscription">Inscription</a>
        <a href="#" class="btn_login" id="btn_connexion">Connexion</a>
    </div>
    <div class="login_container">
        <div class="inscription_cont" id="inscription_cont">
            <h1 class="title-form">Inscription</h1>

            <form id="inscription" class="formulaire" novalidate>
                <!-- NOM -->
                <div class="champ nom">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom">
                    <span class="error" id="error_nom"></span>
                </div>
                <!-- PRENOM -->
                <div class="champ prenom">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom">
                    <span class="error" id="error_prenom"></span>
                </div>
                <!-- EMAIL -->
                <div class="champ email">
                    <label for="email">Adresse Email</label>
                    <input type="email" id="email" name="email">
                    <span class="error" id="error_email"></span>
                </div>
                <!-- MDP1 -->
                <div class="champ mdp1">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">
                    <span class="error" id="error_password"></span>
                    <div class="info_mdp" id="info_mdp">
                        <span class="verifmdp" id="verifmdp">Votre mot de passe doit contenir au moins 8 caractéres ainsi qu'une majuscule , une minuscule , un chiffre et un charactére spécial."</span>
                    </div>
                </div>
                <!-- MDP2 -->
                <div class="champ mdp2">
                    <label for="password2">Confirmation du mot de passe</label>
                    <input type="password" id="password2" name="password2">
                    <span class="error" id="error_password2"></span>
                </div>
                <!-- COMPANY -->
                <div class="champ company">
                    <label for="entreprise">Votre entreprise</label>
                    <input type="text" id="entreprise" name="entreprise">
                    <span class="error" id="error_entreprise"></span>
                </div>

                <input class="btn-2" type="submit" value="Inscription">
            </form>
        </div>

        <div class="connexion_cont">
            <h1 class="title-form">Connexion</h1>
            
            <form id="connexion" class="formulaire" novalidate>
                <!-- EMAIL -->
                <div class="champ email">
                    <label for="email2">Adresse Email</label>
                    <input type="text" id="email2" name="email">
                    <span class="error" id="error_email_log"></span>
                </div>
                <!-- MDP -->
                <div class="champ mdp">
                    <label for="password_log">Mot de passe</label>
                    <input type="password" id="password_log" name="password">
                    <span class="error" id="error_password_log"></span>
                    <a id="resetpasswd" href="#">Mot de passe oublié</a>
                </div>

                <input class="btn-2" type="submit" value="Connexion">
            </form>
        </div>
    </div>
</div>