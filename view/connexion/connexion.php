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
<nav class="navbar navbar-light navbar-expand-md d-flex justify-content-between justify-content-xxl-end align-items-xxl-start" style="background: #ebd9d5;">
    <div class="container-fluid">
        <div onclick='location.href="index.php?action=readAll"' >
            <picture><img src="../raphia/view/connexion/assets/img/logo.png"  width="50" height="50"></picture><a class="navbar-brand" href="#" style="color: #a75b5b;"><strong><em>Raphia</em></strong></a>
        </div><button class="btn btn-primary" type="button" style="background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;">Panier</button>
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
                    <div style="background: rgba(222,222,222,0.58);border-radius: 25px;padding: 8px;"><i class="fas fa-envelope" style="margin-left: 15px;font-size: 20px;color: rgb(186,156,156);"></i><input type="text" style="background: rgba(255,255,255,0);border-style: none;padding: 7px 2px;margin-left: 25px;color: rgb(186,156,156);" name="mail" method="post" action="../raphia/controller/ControllerUtilisateur.php" placeholder="Mail" ></div>
                    <div style="background: rgba(222,222,222,0.58);border-radius: 25px;padding: 8px;margin-top: 15px;"><i class="fas fa-lock" style="margin-left: 15px;font-size: 20px;color: rgb(186,156,156);"></i><input type="text" style="background: rgba(255,255,255,0);border-style: none;padding: 7px 2px;margin-left: 25px;color: rgb(186,156,156);" name="mdp" method="post" action="../raphia/controller/ControllerUtilisateur.php" placeholder="Mot de passe"></div>
                    <div style="background: rgba(211,110,112,0.57);border-radius: 25px;padding: 8px;margin-top: 15px;">
                        <p onclick='location.href="index.php?action=authentification"' style="color: rgb(255,255,255);font-weight: bold;letter-spacing: 1px;text-align: center;margin-top: 1px;margin-bottom: 1px;margin-right: 0;">Se Connecter</p>
                    </div>
                    <div>
                        <p style="letter-spacing: 1px;text-align: center;color: rgba(211,110,112,0.77);padding: 3px;">Créez votre compte en cliquant ici</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../raphia/view/connexion/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>