<!doctype html>
<html>

<head>
    <title>Chez Sari</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
</head>

<body>
<div class="container-fluid">
    <div class="row" style="margin-top: 15px;">
        <div class="col-4">
            <h2 class="text-center">En attente de payement</h2>
            <div class="contain">
                <div id="getdata"></div>
            </div>
        </div>
        <div class="col-4">
            <h2 class="text-center">Commande prête</h2>
            <div class="contain">
                <div id="pret"></div>
            </div>
        </div>
        <div class="col-4">
            <h2 class="text-center">Commande payée</h2>
            <div class="contain">
                <div id="paye"></div>
            </div>
        </div>
    </div>
    <footer>
        <p>Pour accéder à la collecte de data <a href="collectdata.php">cliquez ici</a></p>
    </footer>
</div>

<script type="text/javascript">
    function dis3(idElt) {
        xtr = new XMLHttpRequest();
        xtr.open("GET", "commandeprete.php?ID=" + idElt, false);
        xtr.send(null);
    }
    function getPret() {
        xtml = new XMLHttpRequest();
        xtml.open("POST", "commandeprete.php", false);
        xtml.send(null);
        document.getElementById("pret").innerHTML = xtml.responseText;
    }
    function dis2(idElt) {
        console.log(idElt);
        xtr = new XMLHttpRequest();
        xtr.open("GET", "commandevalide.php?ID=" + idElt, false);
        xtr.send(null);
        document.getElementById("paye").innerHTML = xtr.responseText;
    }

    function dis() {
        xtml = new XMLHttpRequest();
        xtml.open("GET", "selectcommande.php", false);
        xtml.send(null);
        document.getElementById("getdata").innerHTML = xtml.responseText;
    }

    setInterval(function () {
        dis();
        getPret();
    }, 1000);


</script>
</body>

</html>
