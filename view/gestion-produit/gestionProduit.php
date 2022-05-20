<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>connect</title>
    <link rel="stylesheet" href="../raphia/view/gestion-produit/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../raphia/view/gestion-produit/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../raphia/view/gestion-produit/assets/css/styles.css">
</head>

<body class="d-flex d-sm-flex d-xxl-flex flex-column flex-shrink-1 justify-content-center align-items-center align-content-center justify-content-lg-center align-items-lg-center">
<nav class="navbar navbar-light navbar-expand-md d-flex justify-content-between justify-content-xxl-end align-items-xxl-start" style="background: #ebd9d5;">
    <div class="container-fluid">
        <div onclick='location.href="index.php?action=readAll"'>
            <picture><img src="../raphia/view/gestion-produit/assets/img/logo.png" width="50" height="50"></picture><a class="navbar-brand" href="#" style="color: #a75b5b;"><strong><em>Raphia</em></strong></a>
        </div>
        <div style="background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;">Bienvenue sur la page d'administration du site</div>
    </div>
</nav>
<div></div>
<div class="container flex-shrink-1" style="margin-top: 30px;">
    <div>
        <div style="border-radius: 25px; margin-top: 50px;">
            <p style="font-size: 25px;font-weight: bold;letter-spacing: 1PX;color: rgba(167,91,91,0.74);">Création produit</p>
        </div>
            <form method="post" action="#">
                <p style="font-size: 15px;font-weight: bold;letter-spacing: 1PX;color: rgba(167,91,91,0.74);">Nom du produit</p>
                <div style="background: rgba(222,222,222,0.58);border-radius: 25px;padding: 8px;"><input type="text" name="nom_produit" style="background: rgba(255,255,255,0);border-style: none;padding: 7px 2px;margin-left: 25px;color: rgb(186,156,156);padding-right: 9px;width: 630px;" placeholder="Nom du produit"></div>
                <div style="margin-top: 20px;">
                    <p style="font-size: 15px;font-weight: bold;letter-spacing: 1PX;color: rgba(167,91,91,0.74);">Description du produit</p>
                </div>
                <div style="background: rgba(222,222,222,0.58);border-radius: 25px;padding: 8px;margin-top: 15px;"><input type="text" name="description" style="background: rgba(255,255,255,0);border-style: none;padding: 7px 2px;margin-left: 25px;color: rgb(186,156,156);width: 630px;" placeholder="Description"></div>
                <div style="margin-top: 20px;">
                    <p style="font-size: 15px;font-weight: bold;letter-spacing: 1PX;color: rgba(167,91,91,0.74);">Prix de vente</p>
                </div>
                <div style="background: rgba(222,222,222,0.58);border-radius: 25px;padding: 8px;margin-top: 15px;"><input type="text" name="prix" style="background: rgba(255,255,255,0);border-style: none;padding: 7px 2px;margin-left: 25px;color: rgb(186,156,156);" placeholder="Prix"></div>
                <fieldset>
                    <legend style="margin-top: 20px; font-size: 15px;font-weight: bold;letter-spacing: 1PX;color: rgba(167,91,91,0.74);">Choisir le type de catégorie</legend>
                    <div>
                        <input type="checkbox" id="decoration" name="decoration">
                        <label for="decoration">Décoration</label>
                    </div>
                    <div>
                        <input type="checkbox" id="plage" name="plage">
                        <label for="plage">Plage</label>
                    </div>
                    <div>
                        <input type="checkbox" id="mode" name="mode">
                        <label for="mode">Mode</label>
                    </div>
                </fieldset>
                <div style="margin-top: 20px;">
                    <p style="font-size: 15px;font-weight: bold;letter-spacing: 1PX;color: rgba(167,91,91,0.74);">Choisir l'image du produit</p>
                </div>
                <input type="file"  accept="image/png, image/jpeg" name="image" style="background: rgba(255,255,255,0);border-style: none;padding: 7px 2px;margin-left: 25px;color: rgb(186,156,156);"></div>
                <div style="padding-top: 50px;">
                    <input type="submit" value="Créer le produit" style="background: rgba(211,110,112,0.57);border-radius: 25px;padding: 8px;margin-top: 15px;">
                </div>
            </form>

    </div>
</div>
<script src="../raphia/view/gestion-produit/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>