<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>raphia</title>
    <link rel="stylesheet" href="../raphia/view/Produit/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Abhaya+Libre&amp;display=swap">
    <link rel="stylesheet" href="../raphia/view/Produit/assets/css/Articles-Cards.css">
    <link rel="stylesheet" href="../raphia/view/Produit/assets/css/Navbar-Right-Links.css">
    <link rel="stylesheet" href="../raphia/view/Produit/assets/css/styles.css">
</head>

<body>
<nav class="navbar navbar-light navbar-expand-md" style="background: #ebd9d5;">
    <div class="container-fluid">
        <picture><img src="../raphia/view/Produit/assets/img/logo.png" width="50" height="50"></picture><a class="navbar-brand" href="#" style="color: #a75b5b;"><strong><em>Raphia</em></strong></a>
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
        //Utilisateur  connexté
        else{
            echo '</ul><p class="d-flex align-self-center navbar-text" style="color: rgb(167,91,91);letter-spacing: 1px;font-size: 18px; serif; margin-right:20px; margin-top:15px; font-weight: bold;margin-left: auto;" contenteditable="true"> Bienvenue ' .$_SESSION['nom'].'</p></ul>';
            echo '</ul><button class="btn btn-primary" type="button" style="background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;margin: 10px;" onclick="location.href=\'index.php?action=deconnexion\'">Deconnexion</button>';
            echo '</ul><button class="btn btn-primary" type="button" style="background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;margin: 10px;" onclick="location.href=\'index.php?action=modificationView\'">Modifier mon compte</button>';
        }
        ?>
        <button onclick='location.href="index.php?action=readPanier"' class="btn btn-primary" type="button" style="background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;">Panier</button>
        <?php
        if(isset($_SESSION['panier_qte'])){
            echo '<button class="btn btn-primary ms-2" type="button" style="background: #B22222; color: rgb(255,255,255);border-width: 0px;opacity: 1;">' . $_SESSION['panier_qte'] . '</button>';
        }
        ?>
    </div>
</nav>
<div id="promo" style="background: url('../raphia/view/Produit/assets/img/photo-accueil.png') left / cover no-repeat;">
    <div class="container" style="background: rgba(235,217,213,0.78);">
        <h1 style="font-family: 'Abhaya Libre', serif;">Bienvenue sur Raphia</h1>
        <p style="font-style: italic;font-family: 'Abhaya Libre', serif;font-size: 20px;">Découvrez l'art de toute une île</p>
        <nav class="navbar navbar-light navbar-expand-md">
            <div class="container-fluid"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-2">
                    <ul class="navbar-nav mx-auto">
                        <?php
                        foreach ($tab_cat as $v){
                            echo "<li class='nav-item'><a class='nav-link active' href='index.php?action=readCategorie&nomCategorie={$v->getNomCategorie()}' style='color: #a75b5b;font-weight: bold'>{$v->getNomCategorie()}</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="d-flex justify-content-center" style="margin-top: 20px;"><input type="search" style="margin-right: 10px;border-style: solid;border-color: #d36e70;border-radius: 5px;"><button class="btn btn-primary" type="button" style="background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;">Rechercher</button></div>
<div id="article">
    <div class="container py-4 py-xl-5">
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <?php
            foreach ($tab_detail as $v){
                echo $v->afficher();
            }
            ?>
        </div>
    </div>
</div>

</div>
<div>
    <footer class="text-center" style="background: #ebd9d5;">
        <div class="container text-muted py-4 py-lg-5">
            <ul class="list-inline">
                <li class="list-inline-item me-4"><a class="link-secondary" href="index.php?action=readAll" style="font-size: 17px;">Produits</a></li>
                <li class="list-inline-item me-4"><a class="link-secondary" href="index.php?action=readConnexion" style="font-size: 17px;">Connexion</a></li>
                <li class="list-inline-item"><a class="link-secondary" href="index.php?action=viewAdmin" style="font-size: 17px;">Administration</a></li>
            </ul>
            <p class="mb-0">Copyright © 2022 Raphia</p>
        </div>
    </footer>
</div>
<script src="../raphia/view/Produit/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>