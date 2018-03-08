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
        <div class="col-12 text-center" style="margin-top: 15px;">
            <button class="btn btn-primary" id="btnEnvoi">Commande éffectué</button>
        </div>
        <div class="col-6">
            <form>
                <h2 class="text-center">En attente de payement</h2>
                <div class="contain">
                    <span style="display: none;"><input type="radio" name="commande">test <br></span>
                    <div id="getdata"></div>
                </div>
            </form>
        </div>
        <div class="col-6">
            <h2 class="text-center">Commande payée</h2>
            <div class="contain">
                <div id="paye"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function dis2(idElt) {
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
        var btnElt = document.getElementById("btnEnvoi");
        var formElt = document.querySelector("form");
        var commandeElt = formElt.elements.commande;
        console.log(commandeElt.length);
        btnElt.addEventListener('click', function () {
            for (i = 0; i < commandeElt.length; i++) {
                if (commandeElt[i].checked) {
                    dis2(commandeElt[i].value);
                    console.log(commandeElt[i].value);
                }
            }
        });
    }, 4000);


</script>
</body>

</html>
