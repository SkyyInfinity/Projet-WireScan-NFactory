<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="max 156 caractères">
        <meta name="keywords" content="html,css,formation">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="src/plugins/jquery_modal/jquery.modal.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.1/css/all.css" integrity="sha256-iqohlDG+xn9MRt53DKygzaORvtzhTCN4xvi1LHNU3OM=" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flexslider@2.7.2/flexslider.css" integrity="sha256-d/dpEBCLcGIwnda/oxASOoZ/ygGxLu9iw35dLQ0Mx5Q=" crossorigin="anonymous">
        <title>NAME | <?= $title; ?></title>
    </head>
    <body>
        <!-- HEADER -->
        <header id="header">
            <div class="wrap">
                <nav>
                    <div class="logo">
                        <h1><a href="./index.php">Name</a></h1>
                    </div>
                    <ul>
                        <li><a href="./index.php">Accueil</a></li>
                        <li><a href="#">Qui sommes-nous ?</a></li>
                        <li><a href="#login-modal" rel="modal:open">Compte</a></li>
                        <li><a class="btn-2" href="#">Inscription</a></li>
                    </ul>
                    
                </nav>
            </div>
        </header>
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

        <!-- CONTENT -->
        <div id="content">