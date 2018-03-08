<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=bourtheo_chezsari;charset=utf8', 'bourtheo_gestion', 'Boxon57');
    $recuperation = 'SELECT * FROM encours';
    $stmt = $bdd->query($recuperation);
    $resultat = $stmt->fetchAll();

    foreach ($resultat as $item) {
        echo '<div class="dataElt"> <input type="radio" name="commande" value="' . $item['ID'] . '" id="' . $item['ID'] . '"><label for="' .$item['ID'] . '">';
        echo $item['ID'] . ' | ';
        echo $item['date'] . ' | ';
        echo $item['lieu'] . ' | ';
        echo 'Menu : ' . $item['menu'] . '<br>';
        echo 'Sandwich: ' . $item['sandwich'] . ' | ';
        echo 'Pain: ' . $item['pain'] . ' | ';
        echo 'Sauce: ' . $item['sauce'] . '<br>';
        echo $item['garniture'] . ' ';
        echo '</label></div>';
        echo '<br>';
    }

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
