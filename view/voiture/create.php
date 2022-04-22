<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire Voiture</title>
</head>
<body>
<form method="post" action="index.php">
    <fieldset>
        <legend>Mon formulaire :</legend>
        <p>
            <label for="immat">Immatriculation</label> :
            <input type="text" placeholder="256AB34" name="immatriculation" id="immat_id" required/>
        </p>
        <p>
            <label for="marque">marque</label> :
            <input type="text" placeholder="Renault" name="marque" id="marque_id" required/>
        </p>
        <p>
            <label for="couleur">Couleur</label> :
            <input type="text" placeholder="Gris" name="couleur" id="couleur_id" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer"/>
        </p>
    </fieldset>
</form>
</body>
</html>