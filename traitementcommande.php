<?php

try {

    $bdd = new PDO('mysql:host=localhost;dbname=bourtheo_chezsari;charset=utf8', 'bourtheo_gestion', 'Boxon57');
    /*if (!isset($_SESSION['visite'])) {
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
        $IDcommande = $item['ID'];
    }
    if ($succes) {
        echo '<div class="container"><div class="alert alert-success" style="margin-top: 20px;">
                    <strong>Votre commande a bien été prise en compte !</strong><br>
                    Votre commande est la: <strong> ' . $IDcommande . '</strong>
                </div></div>';
    }
        $_SESSION['visite'] = "premier test";
    } else {
                echo '<div class="container"><div class="alert alert-danger" style="margin-top: 20px;">
                    Actualisation impossible
                </div></div>';
    }
*/
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $recuperation = 'SELECT * FROM encours ORDER BY ID DESC LIMIT 1';
        $stmt = $bdd->query($recuperation);
        $resultat = $stmt->fetchAll();
        foreach ($resultat as $item) {
            $IDcommande = $item['ID'];
        }
        echo $IDcommande;
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $lieu = $_POST['lieu'];
        $menu = $_POST['menu'];
        $sandwich = $_POST['sandwich'];
        $pain = $_POST['pain'];
        $sauce = $_POST['sauce'];
        $garniture = $_POST['garniture'];
        $prix = $_POST['prix'];
        $supplement1 = $_POST['supplement1'];
        $supplement2 = $_POST['supplement2'];
        $numtable = $_POST['table'];
        $date = date('Y/m/d H:i:s');
        $insertion = "INSERT INTO encours (date, lieu, menu, sandwich, pain, sauce, garniture, supplementviande, supplement, prix, numtable) VALUES ('$date', '$lieu', '$menu', '$sandwich', '$pain', '$sauce', '$garniture', '$supplement1', '$supplement2', '$prix', '$numtable')";
        $succes = $bdd->query($insertion);
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
