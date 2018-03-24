<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bourtheo_chezsari;charset=utf8', 'bourtheo_gestion', 'Boxon57');
        $recuperation = 'SELECT * FROM encours ORDER BY ID DESC';
        $stmt = $bdd->query($recuperation);
        $resultat = $stmt->fetchAll();

        foreach ($resultat as $item) {
            $ID = $item['ID'];
            echo '<div class="dataElt" onclick="dis3(this.id)" id="' . $ID . '">';
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

    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
