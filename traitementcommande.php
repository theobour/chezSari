<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

</body>
</html>

<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=bourtheo_chezsari;charset=utf8', 'bourtheo_gestion', 'Boxon57');

    $lieu = $_POST['lieu'];
    $menu = $_POST['menu'];
    $sandwich = $_POST['sandwich'];
    $pain = $_POST['pain'];
    $sauce = $_POST['sauce'];
    foreach ($_POST['garniture'] as $item) {
        $itemFinal .= $item . ' ';
    }
    $date = date('Y/m/d H:i:s');

    $insertion = "INSERT INTO encours (date, lieu, menu, sandwich, pain, sauce, garniture) VALUES ('$date', '$lieu', '$menu', '$sandwich', '$pain', '$sauce', '$itemFinal')";
    $succes = $bdd->query($insertion);
    $recuperation = 'SELECT * FROM encours ORDER BY ID DESC LIMIT 1';
    $stmt = $bdd->query($recuperation);
    $resultat = $stmt->fetchAll();
    foreach ($resultat as $item){
        $IDcommande = $item['ID'] + 1;
    }
    if ($succes) {
        echo '<div class="container"><div class="alert alert-success">
                    <strong>Votre commande a bien été prise en compte !</strong><br>
                    Votre commande est la: <strong> ' . $IDcommande . '</strong>
                </div></div>';
    }

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
