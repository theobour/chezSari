<?php
$bdd = new PDO('mysql:host=localhost;dbname=bourtheo_chezsari;charset=utf8', 'bourtheo_gestion', 'Boxon57');
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    /*================
    Début: récupération élément à supprimer
    =====================*/

    $recuperation = 'SELECT * FROM encours WHERE ID="' . $_GET['ID'] . '"';
    $stmt = $bdd->query($recuperation);
    $resultat = $stmt->fetchAll();
//Insertion dans la bdd de stockage total
    foreach ($resultat as $item) {
        $ID = $item['ID'];
        $lieu = $item['lieu'];
        $menu = $item['menu'];
        $sandwich = $item['sandwich'];
        $pain = $item['pain'];
        $sauce = $item['sauce'];
        $garniture = $item['garniture'];
        $prix = $item['prix'];
        $supplement1 = $item['supplementviande'];
        $supplement2 = $item['supplement'];
        $numtable = $item['numtable'];
        $date = $item['date'];
        $insertion = "INSERT INTO pret (ID,date, lieu, menu, sandwich, pain, sauce, garniture, supplementviande, supplement, prix, numtable) VALUES ('$ID', '$date', '$lieu', '$menu', '$sandwich', '$pain', '$sauce', '$garniture', '$supplement1', '$supplement2', '$prix', '$numtable')";
        $succes = $bdd->query($insertion);
    }

    /*================
    Fin: récupération élément à supprimer
    =====================*/

    /*================
    Début et fin: suppression de l'élément pris au début
    =====================*/

    $suppression = 'DELETE FROM encours WHERE ID="' . $_GET['ID'] . '"';
    $action = $bdd->query($suppression);
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    /*================
Début: récupération des éléments stocker pour afficher la liste des commandes payés
=====================*/
    $recuperation = 'SELECT * FROM pret ORDER BY ID DESC';
    $stmt = $bdd->query($recuperation);
    $resultat = $stmt->fetchAll();
    foreach ($resultat as $item) {
        $ID = $item['ID'];
        echo '<div class="dataElt" onclick="dis2(this.id)" id="' . $ID . '">';
        echo $item['ID'] . ' ';
        echo $item['lieu'] . ' ';
        echo $item['prix'] . '€ ';
        echo $item['numtable'] . '<br>';
        echo $item['menu'] . ' ';
        echo $item['sandwich'] . ' ';
        echo $item['pain'] . ' ';
        echo $item['sauce'] . ' ';
        echo $item['garniture'] . '<br>';
        echo $item['supplementviande'] . ' ';
        echo $item['supplement'] . ' ';
        echo '</div>';
        echo '<br>';
    }
    /*================
    Fin: récupération des éléments stocker pour afficher la liste des commandes payés
    =====================*/
}