<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>connect</title>
    <link rel="stylesheet" href="../raphia/view/gestionProduit/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../raphia/view/gestionProduit/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../raphia/view/gestionProduit/assets/css/styles.css">
</head>

<body class="d-flex d-sm-flex d-xxl-flex flex-column flex-shrink-1 justify-content-center align-items-center align-content-center justify-content-lg-center align-items-lg-center">
<nav class="navbar navbar-light navbar-expand-md d-flex justify-content-between justify-content-xxl-end align-items-xxl-start" style="background: #ebd9d5;">
    <div class="container-fluid">
        <div onclick='location.href="index.php?action=readAll"'>
            <picture><img src="../raphia/view/gestionProduit/assets/img/logo.png" width="50" height="50"></picture><a class="navbar-brand" href="#" style="color: #a75b5b;"><strong><em>Raphia</em></strong></a>
        </div>
        <div class="btn btn-primary" style="background: #d36e70;color: rgb(255,255,255);border-width: 0px;opacity: 1;">Bienvenue sur la page d'administration du site</div>
    </div>
</nav>
<div></div>
<div class="container flex-shrink-1" style="margin-top: 30px;">
    <div>
        <div style="margin-top: 40px; border-radius: 25px;">
            <p style="font-size: 25px;font-weight: bold;letter-spacing: 1PX;color: rgba(167,91,91,0.74);">Création produit</p>
        </div>
        <form method="post" action="#">
            <div style="margin-top: 20px;">
                <p style="font-size: 15px;font-weight: bold;letter-spacing: 1PX;color: rgba(167,91,91,0.74);">Nom du produit</p>
            </div>
            <div style="background: rgba(222,222,222,0.58);border-radius: 25px;padding: 8px;"><input type="text" style="background: rgba(255,255,255,0);border-style: none;padding: 7px 2px;margin-left: 25px;color: rgb(186,156,156);padding-right: 9px;width: 630px;" placeholder="Nom du produit"></div>
            <div style="margin-top: 20px;">
                <p style="font-size: 15px;font-weight: bold;letter-spacing: 1PX;color: rgba(167,91,91,0.74);">Description</p>
            </div>
            <div style="background: rgba(222,222,222,0.58);border-radius: 25px;padding: 8px;margin-top: 15px;"><input type="text" style="background: rgba(255,255,255,0);border-style: none;padding: 7px 2px;margin-left: 25px;color: rgb(186,156,156);width: 630px;" name="description" placeholder="description"></div>
            <div style="margin-top: 20px;">
                <p style="font-size: 15px;font-weight: bold;letter-spacing: 1PX;color: rgba(167,91,91,0.74);">Prix</p>
            </div>
            <div style="background: rgba(222,222,222,0.58);border-radius: 25px;padding: 8px;margin-top: 15px;"><input type="text" style="background: rgba(255,255,255,0);border-style: none;padding: 7px 2px;margin-left: 25px;color: rgb(186,156,156);" name="prix" placeholder="Prix"></div>
            <fieldset>
                <legend style="margin-top: 20px; font-size: 15px;font-weight: bold;letter-spacing: 1PX;color: rgba(167,91,91,0.74);">Choisir la catégorie :</legend>
                <div>
                    <input type="checkbox" id="decoration" name="decoration">
                    <label for="decoration">Décoration</label>
                </div>
                <div>
                    <input type="checkbox" id="Plage" name="Plage">
                    <label for="Plage">Plage</label>
                </div>
                <div>
                    <input type="checkbox" id="Mode" name="Mode">
                    <label for="Mode">Mode</label>
                </div>
            </fieldset>
            <label style="margin-top:20px; font-size: 15px;font-weight: bold;letter-spacing: 1PX;color: rgba(167,91,91,0.74);"" for="image">Sélectionner une image de produit:</label>
            <input type="file" id="image" name="image" accept="image/png, image/jpeg">
            <div>
                <input type="submit" value="Créer le produit" style="background: rgba(211,110,112,0.57);border-radius: 25px;padding: 8px;margin-top: 15px;">
            </div>
        </form>

    </div>
</div>
<script src="../raphia/view/gestionProduit/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>