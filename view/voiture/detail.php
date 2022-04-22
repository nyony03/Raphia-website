<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des voitures</title>
</head>
<body>
<?php
    echo '<p> Voiture immatriculation ' . $v->getImmatriculation() . '</p>';
    echo '<p> Voiture de marque ' . $v->getMarque() . '</p>';
    echo '<p> Voiture de couleur ' . $v->getCouleur() . '</p>';

?>
</body>
</html>
