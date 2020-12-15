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
                    <div class="hamburger">
                        <a id="js_hamburger" href="#"><i class="fas fa-bars"></i></a>
                    </div>
                    <ul id="js_nav-links">
                        <li><a href="./index.php">Accueil</a></li>
                        <li><a href="#">Qui sommes-nous ?</a></li>
                        <li><a href="#login-modal" rel="modal:open">Compte</a></li>
                        <li><a class="btn-2" href="#">Inscription</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        

        <!-- CONTENT -->
        <div id="content">