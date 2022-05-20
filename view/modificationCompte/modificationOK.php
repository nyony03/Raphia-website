<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>connexion</title>
    <link rel="stylesheet" href="../raphia/view/modificationCompte/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../raphia/view/modificationCompte/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../raphia/view/modificationCompte/assets/css/styles.css">
</head>

<body class="d-flex d-sm-flex d-xxl-flex flex-column flex-shrink-1 justify-content-center align-items-center align-content-center justify-content-lg-center align-items-lg-center">
<nav class="navbar navbar-light navbar-expand-md d-flex justify-content-between justify-content-xxl-end align-items-xxl-start" style="background: #ebd9d5;">
    <div class="container-fluid">
        <div onclick='location.href="index.php?action=readAll"' >
            <picture><img src="../raphia/view/modificationCompte/assets/img/logo.png"  width="50" height="50"></picture><a class="navbar-brand" href="#" style="color: #a75b5b;"><strong><em>Raphia</em></strong></a>
        </div>
        <?php
        echo '</ul><p class="d-flex align-self-center navbar-text" style="color: rgb(167,91,91);letter-spacing: 1px;font-size: 18px; serif; margin-right:20px; margin-top:15px; font-weight: bold;margin-left: auto;" contenteditable="true"> Bienvenue ' .$_SESSION['nom'].'</p></ul>';
        echo '</ul><button class="btn btn-primary" type="button" style="background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;margin: 10px;" onclick="location.href=\'index.php?action=deconnexion\'">Deconnexion</button>';
        ?>
        <button class="btn btn-primary" type="button" style="background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;">Panier</button>
        <?php
        if(isset($_SESSION['panier_qte'])){
            echo '<button class="btn btn-primary ms-2" type="button" style="background: #B22222; color: rgb(255,255,255);border-width: 0px;opacity: 1;">' . $_SESSION['panier_qte'] . '</button>';
        }
        ?>
    </div>
</nav>
<div></div>
<div class="container flex-shrink-1">
    <div class="row d-md-flex d-lg-flex flex-shrink-1">
        <div class="col-md-6 d-flex" style="margin-top: 100px; padding-top: 100px; background: url('../raphia/view/modificationCompte/assets/img/Screenshot_from_2022-05-04_12-59-41-removebg-preview.png') center / contain no-repeat;">
        </div>
        <div class="col-md-6" style="margin-top: 120px;">
                    <div style="padding-right: 100px; background: rgba(222,222,222,0.58);border-radius: 25px;padding: 8px;margin-top: 15px;">
                        <p style="background: rgba(255,255,255,0);border-style: none;padding: 7px 2px;margin-left: 25px;color: rgb(186,156,156);">Votre Compte a été modifié avec succés !!!</p>
                    </div>
        </div>
    </div>
</div>
<script src="../raphia/view/modificationCompte/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>