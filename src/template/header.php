<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="max 156 caractères">
        <meta name="keywords" content="html,css,formation">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.1/css/all.css" integrity="sha256-iqohlDG+xn9MRt53DKygzaORvtzhTCN4xvi1LHNU3OM=" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flexslider@2.7.2/flexslider.css" integrity="sha256-d/dpEBCLcGIwnda/oxASOoZ/ygGxLu9iw35dLQ0Mx5Q=" crossorigin="anonymous">
        <link rel="stylesheet" href="./src/plugins/jquery_modal/jquery.modal.css">
        <link rel="stylesheet" href="./assets/css/style.css">
        <title>WireScan &bull; <?= $title; ?></title>
    </head>
    <body>
        <?php include('src/inc/modal.php');?>
        <div id="overlay"></div>
        <!-- HEADER -->
        <header id="header">
            <div class="background-fix"></div>
            <div class="wrap">
                <nav>
                    <div class="logo">
                        <a href="./"><img src="./assets/img/logox250.png" alt="logo du site"></a>
                    </div>
                    <div class="hamburger">
                        <a id="js_hamburger" href="#"><i class="fas fa-bars"></i></a>
                    </div>
                    <ul id="js_nav-links">
                        <?php if (!is_logged()) : ?>
                        <li><a href="./">Accueil</a></li>
                        <li><a href="aboutUs.php">Qui sommes-nous ?</a></li>
                        <?php else :?>
                        <li><a href="./contact.php">Nous contacter</a></li>
                        <li><a href="aboutUs.php">Qui sommes-nous ?</a></li>
                        <?php endif;?>
                        <?php if (!is_logged()) : ?>
                        <li><a id="js_connexion" class="btn-1" href="#login-modal">Connexion</a></li>
                        <li><a id="js_inscription" class="btn-2" href="#login-modal">Inscription</a></li>
                        <?php else :?>
                        <li><a class="btn-2" href="dashboard/index.php">Dashboard</a></li>    
                        <?php endif;?>
                    </ul>
                </nav>
            </div>
        </header>
        

        <!-- CONTENT -->
        <div id="content">