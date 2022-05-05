<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled (Backup 1651764693972)</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body class="d-flex flex-column flex-shrink-1 justify-content-center align-items-center">

    <nav class="navbar navbar-light navbar-expand-md d-flex justify-content-between align-self-start justify-content-xxl-end align-items-xxl-start" style="background: #ebd9d5;">
        <div class="container-fluid">
            <div>
                <picture><img src="assets/img/logo.png" width="50" height="50"></picture><a class="navbar-brand" href="#" style="color: #a75b5b;"><strong><em>Raphia</em></strong></a>

                <?php
                //à changer en php en fonction de la connexion du client--->
                //l'utilisateur n'est pas connecté
                if(!isset($_SESSION['nom'])) {
                    //aide pour la gestion des boutons à changer l'action du routeur je pense
                    echo '</div><button class="btn btn-primary" type="button" style="background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;">Connexion</button>'
                }
                else{
                    echo '<p style="color: #ad5355;font-weight: bold;font-size: 18px;letter-spacing: 0.5px;">'.$_SESSION['nom'].'</p>';

                }
                ?>

        </div>
    </nav>
    <div>
        <div class="d-flex d-lg-flex flex-column justify-content-center align-items-center align-content-around" style="padding-top: 110px;"><i class="fas fa-shopping-basket" style="font-size: 170px;color: rgba(211,110,112,0.57);"></i>
            <p style="font-size: 20px;letter-spacing: 1px;color: rgb(255,255,255);background: #d36e7092;border-radius: 22px;padding-left: 6px;padding-right: 6px;">Votre panier est vide</p>
            <p style="color: rgb(211,110,112);text-decoration: underline;font-weight: bold;letter-spacing: 1px;">Accueil</p>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>