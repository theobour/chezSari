<?php
$bdd = new PDO('mysql:host=localhost;dbname=bourtheo_chezsari;charset=utf8', 'bourtheo_gestion', 'Boxon57');
/*================
Début: récupération élément à supprimer
=====================*/

$recuperation = 'SELECT * FROM encours WHERE ID="' . $_GET['ID'] . '"';
$stmt = $bdd->query($recuperation);
$resultat = $stmt->fetchAll();
//Insertion dans la bdd de stockage total
foreach ($resultat as $item) {
    $lieu = $item['lieu'];
    $menu = $item['menu'];
    $sandwich = $item['sandwich'];
    $pain = $item['pain'];
    $sauce = $item['sauce'];
    $itemFinal = $item['garniture'];
    $date = $item['date'];
    $insertion = "INSERT INTO stockage (date, lieu, menu, sandwich, pain, sauce, garniture) VALUES ('$date', '$lieu', '$menu', '$sandwich', '$pain', '$sauce', '$itemFinal')";
    $succes = $bdd->query($insertion);
}

/*================
Fin: récupération élément à supprimer
=====================*/
/*================
Début: récupération des éléments stocker pour afficher la liste des commandes payés
=====================*/
$recuperation = 'SELECT * FROM stockage ORDER BY ID DESC LIMIT 3';
$stmt = $bdd->query($recuperation);
$resultat = $stmt->fetchAll();
foreach ($resultat as $item) {
    echo '<div class="dataElt">';
    echo $item['ID'] . ' | ';
    echo $item['date'] . ' | ';
    echo $item['lieu'] . ' | ';
    echo 'Menu : ' . $item['menu'] . '<br>';
    echo 'Sandwich: ' . $item['sandwich'] . ' | ';
    echo 'Pain: ' . $item['pain'] . ' | ';
    echo 'Sauce: ' . $item['sauce'] . '<br>';
    echo $item['garniture'] . ' ';
    echo '</div>';
    echo '<br>';
}
/*================
Fin: récupération des éléments stocker pour afficher la liste des commandes payés
=====================*/
/*================
Début et fin: suppression de l'élément pris au début
=====================*/

$suppression = 'DELETE FROM encours WHERE ID="' . $_GET['ID'] . '"';
$action = $bdd->query($suppression);