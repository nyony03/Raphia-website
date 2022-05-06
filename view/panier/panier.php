<?php
session_start();
$_SESSION['nom'] = 'Obada';
$_SESSION['idUser'] = 31;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>panier</title>
    <link rel="stylesheet" href="../raphiaphp/view/panier/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./raphiaphp/view/panier/assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md" style="background: #ebd9d5;">
        <div class="container-fluid"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><img src="../raphiaphp/view/panier/assets/img/logo.png" style="width: 50px;">
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#" style="color: rgb(167,91,91);font-weight: bold;font-size: 20px;letter-spacing: 1px;font-family: 'Abhaya Libre', serif;">Raphia</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>

                    <?php
                    //Gestion de l'affichage du boutton connexion ou du nom
                    //utilisateur non connecté
                    if(!isset($_SESSION['nom'])) {
                        echo '</ul><button class="btn btn-primary d-xxl-flex" type="button" style="background: rgb(211,110,112);margin-left: auto; serif;font-weight: bold;font-size: 18px;letter-spacing: 1px;">Connexion</button>';
                    }
                    //Utilisateur  connexté
                    else{
                        echo '</ul><p class="d-flex align-self-center navbar-text" style="color: rgb(167,91,91);letter-spacing: 1px;font-size: 18px; serif;font-weight: bold;margin-left: auto;" contenteditable="true"> Bienvenue ' .$_SESSION['nom'].'</p></ul>';
                    }
                    ?>
            </div>
        </div>
    </nav>
    <!-- Div entete apres la bar de navigation -->
    <div class="d-flex flex-row flex-shrink-1 justify-content-between" style="padding-bottom: 22px;padding-top: 8px;">
        <div class="d-flex flex-row flex-shrink-1">
            <div class="d-flex flex-column flex-shrink-1" style="padding-left: 98px;">
                <p style="font-size: 22px;font-weight: bold;letter-spacing: 1px;padding-left: 50px;color: #a75b5b;">Produits</p>
                <div class="d-flex flex-row"></div>
            </div>
        </div>
        <p class="d-flex flex-shrink-1 justify-content-xl-center" style="padding-right: 20px;font-weight: bold;font-size: 20px;letter-spacing: 1px;color: rgb(167,91,91);border-color: rgb(167,91,91);"><strong>Total</strong></p>
    </div>
    <?php
    //for each dans le panier de la session pour recuperer les articles
    echo'<div class="d-flex flex-row flex-shrink-1 justify-content-between" style="padding-bottom: 12px;">';
    echo '<div class="d-flex flex-row flex-shrink-1 align-content-center"><img src="'.$lienArecupDansLaSession.'" style="width: 120px;height: 120px;">';
    echo '            <div class="d-flex flex-column flex-shrink-1" style="padding-left: 50px;">';
    echo '            <div class="d-flex flex-column flex-shrink-1" style="padding-left: 50px;">';
    echo '            <div class="d-flex flex-column flex-shrink-1" style="padding-left: 50px;">';
    echo '                <p style="font-size: 18px;font-weight: bold;letter-spacing: 1px;color: rgb(0,0,0);">'.$NomProduit.'&nbsp;</p>';
    echo '                <div class="d-flex flex-row">';
    echo '                <div class="d-flex flex-row">';
    echo '                    <p style="font-size: 18px;letter-spacing: 1px;font-style: italic;color: rgb(0,0,0);">'.$Quantité.'&nbsp; :</p>;';
    echo '                    <p style="font-size: 18px;letter-spacing: 1px;padding-left: 15px;">int&nbsp;</p>';
    echo '                </div>';
    echo '                <div class="d-flex flex-row justify-content-evenly"><button class="btn btn-primary" type="button" style="font-size: 16px;font-weight: bold;background: rgb(211,110,112);border-color: rgb(211,110,112);">-</button><button class="btn btn-primary" type="button" style="font-weight: bold;background: rgb(211,110,112);border-color: rgb(211,110,112);">+</button></div>';
    echo '            </div>';
    echo '        </div>';
    echo '        <p class="d-flex flex-shrink-1 justify-content-xl-center" style="padding-right: 20px;font-size: 18px;letter-spacing: 1px;color: rgb(0,0,0);"><strong>Total</strong></p>';
    echo '    </div>';
    ?>


    <div class="d-flex flex-column flex-shrink-1 align-items-end" style="padding-bottom: 22px;padding-top: 8px;">
        <p class="d-flex flex-shrink-1 justify-content-xl-center" style="padding-right: 20px;font-weight: bold;font-size: 20px;letter-spacing: 1px;color: rgb(167,91,91);"><strong>Total</strong></p>
        <p style="font-size: 19px;letter-spacing: 1px;">TotalInt&nbsp;</p>
    </div>
    <script src="../raphiaphp/view/panier/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>