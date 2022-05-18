<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>connexion</title>
    <link rel="stylesheet" href="../raphia/view/administrator/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../raphia/view/administrator/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../raphia/view/administrator/assets/css/styles.css">
</head>

<body class="d-flex d-sm-flex d-xxl-flex flex-column flex-shrink-1 justify-content-center align-items-center align-content-center justify-content-lg-center align-items-lg-center">
<nav class="navbar navbar-light navbar-expand-md d-flex justify-content-between justify-content-xxl-end align-items-xxl-start" style="background: #ebd9d5;">
    <div class="container-fluid">
        <div onclick='location.href="index.php?action=readAll"'>
            <picture><img src="../raphia/view/administrator/assets/img/logo.png" width="50" height="50"></picture><a class="navbar-brand" href="#" style="color: #a75b5b;"><strong><em>Raphia</em></strong></a>
        </div>
        <div class="btn btn-primary" style="background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;">Bienvenue sur la page d'administration du site</div>
    </div>
</nav>
<div></div>
<div class="container flex-shrink-1" style="margin-top: 30px;">
    <div class="row d-md-flex d-lg-flex flex-shrink-1">
        <div class="col-md-6" style="margin-top: 50px;">
            <div>
                <div>
                    <div style="border-radius: 25px;">
                        <p style="font-size: 25px;font-weight: bold;letter-spacing: 1PX;color: rgba(167,91,91,0.74);">Gestion Produit</p>
                    </div>
                    <input type="button" value="Ajout produit" style="background: rgba(211,110,112,0.57);border-radius: 25px;padding: 8px;margin-top: 15px;">
                    <div>
                        <input type="submit" value="Modification produit" style="background: rgba(211,110,112,0.57);border-radius: 25px;padding: 8px;margin-top: 15px;">
                    </div>
                    <div>
                        <input type="submit" value="Suppression produit" style="background: rgba(211,110,112,0.57);border-radius: 25px;padding: 8px;margin-top: 15px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <div>
                    <div style="border-radius: 25px; margin-top: 50px">
                        <p style="font-size: 25px;font-weight: bold;letter-spacing: 1PX;color: rgba(167,91,91,0.74);">Gestion utilisateur</p>
                    </div>
                    <button type="button" style="background: rgba(211,110,112,0.57);border-radius: 25px;padding: 8px;margin-top: 15px;" onclick='location.href="index.php?action=creationCompteParAdminView"'>Créer un compte</button>
                        <form method="post" action="#">
                        <p style="letter-spacing: 1px;margin-top: 20px; color: rgba(211,110,112,0.77);padding: 10px;">Veuillez saisir le mail du compte à modifier</p>
                        <div style="background: rgba(222,222,222,0.58);border-radius: 25px;padding: 8px;margin-top: 15px;"><i class="fas fa-mail-bulk" style="margin-left: 15px;font-size: 20px;color: rgb(186,156,156);"></i><input type="text" name="mail-modify" style="background: rgba(255,255,255,0);border-style: none;padding: 7px 2px;margin-left: 25px;color: rgb(186,156,156);" placeholder="Mail"></div>
                        <input type="submit" value="Modifier le compte" style="background: rgba(211,110,112,0.57);border-radius: 25px;padding: 8px;margin-top: 15px;">
                        </form>
                    <form method="post" action="index.php?action=deleteUserByAdmin">
                        <p style="letter-spacing: 1px;margin-top: 20px;color: rgba(211,110,112,0.77);padding: 10px;">Veuillez saisir le mail du compte à supprimer</p>
                        <div style="background: rgba(222,222,222,0.58);border-radius: 25px;padding: 8px;margin-top: 15px;"><i class="fas fa-mail-bulk" style="margin-left: 15px;font-size: 20px;color: rgb(186,156,156);"></i><input type="text" style="background: rgba(255,255,255,0);border-style: none;padding: 7px 2px;margin-left: 25px;color: rgb(186,156,156);" name="mail-delete" placeholder="Mail"></div>
                        <input type="submit" value="Supprimer le compte" style="background: rgba(211,110,112,0.57);border-radius: 25px;padding: 8px;margin-top: 15px;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../raphia/view/administrator/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
