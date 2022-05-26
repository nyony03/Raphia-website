


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="../raphia/view/panierVide/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre&amp;display=swap">
    <link rel="stylesheet" href="../raphia/view/panierVide/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../raphia/view/panierVide/assets/css/styles.css">
</head>

<body class="d-flex flex-column">
<nav class="navbar navbar-light navbar-expand-md" style="background: #ebd9d5;">
    <div class="container-fluid">
        <div onclick='location.href="index.php?action=readAll"'>
            <picture><img src="../raphia/view/Produit/assets/img/logo.png" width="50" height="50"></picture>
            <a class="navbar-brand" href="#" style="color: #a75b5b;"><strong><em>Raphia</em></strong></a>
        </div>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active d-md-flex justify-content-md-start" href="#"></a></li>
                <li class="nav-item"></li>
                <li class="nav-item"></li>
            </ul>

        </div>

        <?php
        //Gestion de l'affichage du boutton connexion ou du nom
        //utilisateur non connecté
        if(!isset($_SESSION['nom'])) {
            echo '</ul><button class="btn btn-primary" type="button" style="background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;margin: 10px;" onclick="location.href=\'index.php?action=readConnexion\'">Connexion</button>';
        }
        //Utilisateur connecté
        else{
            echo '<p class="d-flex align-self-center navbar-text" style="color: rgb(167,91,91);letter-spacing: 1px;font-size: 18px; serif; margin-right:20px; margin-top:15px; font-weight: bold;margin-left: auto;"> Bienvenue ' .$_SESSION['nom'].'</p>';
            echo '</ul><button class="btn btn-primary" type="button" style="background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;margin: 10px;" onclick="location.href=\'index.php?action=deconnexion\'">Deconnexion</button>';
            echo '</ul><button class="btn btn-primary" type="button" style="background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;margin: 10px;" onclick="location.href=\'index.php?action=modificationView\'">Modifier mon compte</button>';

        }
        ?>
    </div>
</nav>
    <div class="d-flex d-lg-flex flex-column justify-content-center align-items-center align-content-around" style="padding-top: 110px;"><i class="fas fa-shopping-basket" style="font-size: 170px;color: rgba(211,110,112,0.57);"></i>
        <p style="font-size: 20px;letter-spacing: 1px;color: rgb(255,255,255);background: #d36e7092;border-radius: 22px;padding-left: 6px;padding-right: 6px;font-family: 'Abhaya Libre', serif;">Votre panier est vide</p>
        <p onclick="location.href='index.php'" style="color: rgb(211,110,112);text-decoration: underline;font-weight: bold;letter-spacing: 1px;font-family: 'Abhaya Libre', serif;">Accueil</p>
    </div>
    <script src="../raphia/view/panierVide/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>