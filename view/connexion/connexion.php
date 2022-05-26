<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>connexion</title>
    <link rel="stylesheet" href="../raphia/view/connexion/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../raphia/view/connexion/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../raphia/view/connexion/assets/css/styles.css">
</head>

<body class="d-flex d-sm-flex d-xxl-flex flex-column flex-shrink-1 justify-content-lg-center align-items-lg-center">
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
        <button onclick='location.href="index.php?action=readPanier"' class="btn btn-primary" type="button" style="background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;">Panier</button>
        <?php
        if(isset($_SESSION['panier_qte'])){
            echo '<button class="btn btn-primary ms-2" type="button" style="background: #B22222;color: rgb(255,255,255);border-width: 0px;opacity: 1;">' . $_SESSION['panier_qte'] . '</button>';
        }
        ?>
    </div>
</nav>
<div></div>
<div class="container flex-shrink-1">
    <div class="row d-md-flex d-lg-flex flex-shrink-1" style="padding-top: 110px;">
        <div class="col-md-6 d-flex" style="background: url('../raphia/view/connexion/assets/img/Screenshot_from_2022-05-04_12-59-41-removebg-preview.png') center / contain no-repeat;">
            <div></div>
        </div>
        <div class="col-md-6">
            <div>
                <div>
                    <div style="border-radius: 25px;">
                        <p style="font-size: 25px;font-weight: bold;letter-spacing: 1PX;color: rgba(167,91,91,0.74);">Connexion</p>
                    </div>
                    <form method="post" action="index.php?action=authentification">
                        <div style="background: rgba(222,222,222,0.58);border-radius: 25px;padding: 8px;"><i class="fas fa-envelope" style="margin-left: 15px;font-size: 20px;color: rgb(186,156,156);"></i><input type="text" style="background: rgba(255,255,255,0);border-style: none;padding: 7px 2px;margin-left: 25px;color: rgb(186,156,156);" name="mail" placeholder="Mail" ></div>
                        <div style="background: rgba(222,222,222,0.58);border-radius: 25px;padding: 8px;margin-top: 15px;"><i class="fas fa-lock" style="margin-left: 15px;font-size: 20px;color: rgb(186,156,156);"></i><input type="password" style="background: rgba(255,255,255,0);border-style: none;padding: 7px 2px;margin-left: 25px;color: rgb(186,156,156);" name="mdp" placeholder="Mot de passe"></div>
                    <div style="margin-top: 50px">
                        <input type="submit" value="Se Connecter" style="background: rgba(211,110,112,0.57);border-radius: 25px;padding: 8px;margin-top: 15px;">
                    </div>
                    </form>
                    <div style="margin-top: 50px">
                        <a href="index.php?action=createAccount" style="letter-spacing: 1px;text-align: center;color: rgba(211,110,112,0.77);padding: 10px;">Créez votre compte en cliquant ici</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../raphia/view/connexion/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>