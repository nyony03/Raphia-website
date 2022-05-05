

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>panier</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <!-- la div entete à ne pas toucher -->
    <div class="d-flex flex-row flex-shrink-1 justify-content-between" style="padding-bottom: 22px;padding-top: 8px;">
        <div class="d-flex flex-row flex-shrink-1">
            <div class="d-flex flex-column flex-shrink-1" style="padding-left: 98px;">
                <p style="font-size: 22px;font-weight: bold;letter-spacing: 1px;padding-left: 50px;">Produits</p>
                <div class="d-flex flex-row"></div>
            </div>
        </div>
        <p class="d-flex flex-shrink-1 justify-content-xl-center" style="padding-right: 20px;font-weight: bold;font-size: 20px;letter-spacing: 1px;"><strong>Total</strong></p>
    </div>
    <!--la div du produit dans le panier--->
    <div class="d-flex flex-row flex-shrink-1 justify-content-between" style="padding-bottom: 12px;">
        <div class="d-flex flex-row flex-shrink-1 align-content-center"><img>
            <div class="d-flex flex-column flex-shrink-1" style="padding-left: 50px;">
                <!-- celle ci est à demander en php -->
                <p style="font-size: 18px;font-weight: bold;letter-spacing: 1px;">NomProduit&nbsp;</p>
                <div class="d-flex flex-row">
                    <p style="font-size: 18px;letter-spacing: 1px;font-style: italic;">Quantité&nbsp; :</p>
                    <!-- celle ci est à calculer en php -->
                    <p style="font-size: 18px;letter-spacing: 1px;padding-left: 15px;">int&nbsp;</p>
                </div>
                <div class="d-flex flex-row justify-content-evenly"><button class="btn btn-primary" type="button" style="font-size: 16px;font-weight: bold;background: #d36e70;border-color: #d36e70;">+</button><button class="btn btn-primary" type="button" style="font-weight: bold;background: #d36e70;border-color: #d36e70;">-</button></div>
            </div>
        </div>
        <!-- à calculer en php -->
        <p class="d-flex flex-shrink-1 justify-content-xl-center" style="padding-right: 20px;font-size: 18px;letter-spacing: 1px;"><strong>Total</strong></p>
    </div>

    <!-- la div du montant total -->
    <div class="d-flex flex-column flex-shrink-1 align-items-end" style="padding-bottom: 22px;padding-top: 8px;">
        <p class="d-flex flex-shrink-1 justify-content-xl-center" style="padding-right: 20px;font-weight: bold;font-size: 20px;letter-spacing: 1px;"><strong>Total</strong></p>
        <p style="font-size: 19px;letter-spacing: 1px;">TotalInt&nbsp;</p>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>