<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>connexion</title>
    <link rel="stylesheet" href="../raphia/view/formulaireCreationCompte/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../raphia/view/formulaireCreationCompte/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../raphia/view/formulaireCreationCompte/assets/css/styles.css">
</head>

<body class="d-flex d-sm-flex d-xxl-flex flex-column flex-shrink-1 justify-content-center align-items-center align-content-center justify-content-lg-center align-items-lg-center">
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
<div class="container flex-shrink-1" style="padding-top: 100px">
    <div class="row d-md-flex d-lg-flex flex-shrink-1">
        <div class="col-md-6 d-flex" style="background: url('../raphia/view/formulaireCreationCompte/assets/img/Screenshot_from_2022-05-04_12-59-41-removebg-preview.png') center / contain no-repeat;">
        </div>
        <div class="col-md-6">
            <div>
                <div>
                    <div style="padding-right: 100px; background: rgba(222,222,222,0.58);border-radius: 25px;padding: 8px;margin-top: 15px;">
                        <p style="background: rgba(255,255,255,0);border-style: none;padding: 7px 2px;margin-left: 25px;color: rgb(186,156,156);">Vous avez déjà un compte ! Veuillez vous connecté</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../raphia/view/formulaireCreationCompte/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>