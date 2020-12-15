<?php


?>

<?php include('src/template/header.php'); ?>

<!-- Modal Connexion/Deconnexion  -->

<div class="modal" id="login-modal">
    <div class="login_select">
        <a href="#" class="btn_login active_login" id="btn_inscription">Inscription</a>
        <a href="#" class="btn_login" id="btn_connexion">Connexion</a>
    </div>
    <div class="login_container">
        <div class="inscription">
            <form action="" id="login-form" class="formulaire">
                <label for="nom">Identifiant</label>
                <input type="text" id="nom" name="nom">

                <label for="password">Password</label>
                <input type="password" id="password" name="password">

                <label for="password2">Comfirmation</label>
                <input type="password" id="password2" name="password2">

                <input type="submit" name="connexion">
            </form>
        </div>
        <div class="connexion">
            <form action="" id="login-form" class="formulaire">
                <label for="Emailpseudo">Identifiant</label>
                <input type="text" id="Emailpseudo" name="Emailpseudo">

                <label for="password">Password</label>
                <input type="text" id="password" name="password">

                <input type="submit" name="connexion">
            </form>
        </div>
    </div>
</div>

<p><a href="#login-modal" rel="modal:open">Compte</a></p>

<script>



</script>

<?php include('src/template/footer.php'); ?>