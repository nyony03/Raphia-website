<?php
session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>.produit{
            border: 1px dotted black;

        }
    </style>
</head>
<body>
<?php
$panier = $_SESSION['panier'];


foreach ($panier as $cle => $value ){
    $total = $value['prixU']*$value['qte'];
    $nbProduit++;
    $totalPanier = $totalPanier + $total;
    echo "<div class='produit'><div>Produit n°{$cle}</div>"
        . "<div><div>Quantité : {$value['qte']}</div>"
        . "<div><div>Prix :  {$value['prixU']}</div>"
        . "<div><div>Prix Total : {$total} </div>"
        . "<div><a href='ajoutPanier.php?id={$value['id']}&prixU={$value['prixU']}'>+</a></div></div>";
}
echo "<div class='produit'><div>Total Panier : {$totalPanier}</div>"
    . "<div><div>Nombre de Produits : {$nbProduit}</div>";


?>
</body>
</html>
