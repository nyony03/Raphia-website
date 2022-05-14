<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="../raphiaphp/view/panierVide/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre&amp;display=swap">
    <link rel="stylesheet" href="../raphiaphp/view/panierVide/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../raphiaphp/view/panierVide/assets/css/styles.css">
</head>

<body class="d-flex flex-column">
    <nav class="navbar navbar-light navbar-expand-md" style="background: #ebd9d5;">
        <div class="container-fluid"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button><img src="../raphiaphp/view/panierVide/assets/img/logo.png" style="width: 50px;">
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#" style="color: rgb(167,91,91);font-weight: bold;font-size: 20px;letter-spacing: 1px;font-family: 'Abhaya Libre', serif;">Raphia</a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <?php
                    //utilisateur non connecté
                    if(!isset($_SESSION['nom'])) {
                        echo '</ul><button class="btn btn-primary d-xxl-flex" type="button" style="background: rgb(211,110,112);margin-left: auto; serif;font-weight: bold;font-size: 18px;letter-spacing: 1px;">Connexion</button>';
                    }
                    //Utilisateur  connecté
                    else{
                        echo '</ul><p class="d-flex align-self-center navbar-text" style="color: rgb(167,91,91);letter-spacing: 1px;font-size: 18px; serif;font-weight: bold;margin-left: auto;" contenteditable="true"> Bienvenue ' .$_SESSION['nom'].'</p></ul>';
                    }
                ?>
            </div>
        </div>
    </nav>
    <div class="d-flex d-lg-flex flex-column justify-content-center align-items-center align-content-around" style="padding-top: 110px;"><i class="fas fa-shopping-basket" style="font-size: 170px;color: rgba(211,110,112,0.57);"></i>
        <p style="font-size: 20px;letter-spacing: 1px;color: rgb(255,255,255);background: #d36e7092;border-radius: 22px;padding-left: 6px;padding-right: 6px;font-family: 'Abhaya Libre', serif;">Votre panier est vide</p>
        <p style="color: rgb(211,110,112);text-decoration: underline;font-weight: bold;letter-spacing: 1px;font-family: 'Abhaya Libre', serif;">Accueil</p>
    </div>
    <script src="../raphiaphp/view/panierVide/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>