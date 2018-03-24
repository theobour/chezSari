function toMenu(value) {
    var btnReset = document.getElementById("btnReset");
    btnReset.style.display = "block";
    var lieuElt = document.getElementById('surPlace');
    lieu = value;
    var menu = document.getElementById("menus");
    lieuElt.style.display = "none";
    menu.style.display = "block";
    progressBar(21);
    window.scrollTo(0, 0);
}

function toSandwich() {
    var k = 0;
    var menuSelect = document.getElementsByName("menu");
    var menuElt = document.getElementById("menus");
    var sandwichElt = document.getElementById('sandwich');
    for (i = 0; i < menuSelect.length; i++) {
        if (menuSelect[i].checked === true) {
            menuValue += menuSelect[i].value + " ";
            menuAdmin += menuSelect[i].dataset.nameadmin + " ";
            prix += 0.5;
        }
    }
    if (k==0) {
        menuValue = 'Aucun';
    }
    menuElt.style.display = "none";
    sandwichElt.style.display = "block";
    console.log(prix);
    progressBar(36);
    window.scrollTo(0, 0);
}

function toPain(value, prixElt) {
    sandwich = value;
    prix += Number(prixElt);
    var sandwichElt = document.getElementById('sandwich');
    var painElt = document.getElementById("typePain");
    sandwichElt.style.display = "none";
    painElt.style.display = "block";
    console.log(prix);
    progressBar(52);
    window.scrollTo(0, 0);
}

function toGarnitureSansSelection (value, prixElt, typePain) {
    sandwich = value;
    prix += Number(prixElt);
    pain = typePain
    var sandwichElt = document.getElementById('sandwich');
    var typeGarnitureElt = document.getElementById("typeGarniture");
    sandwichElt.style.display = "none";
    typeGarnitureElt.style.display = "block";
    progressBar(68);
    window.scrollTo(0, 0);
}

function toGarniture (value) {
    pain = value;
    var painElt = document.getElementById("typePain");
    var typeGarnitureElt = document.getElementById("typeGarniture");
    painElt.style.display = "none";
    typeGarnitureElt.style.display = "block";
    progressBar(68);
    window.scrollTo(0, 0);
}

function toSupplement1() {
    var k = 0;
    var typeGarnitureElt = document.getElementById("typeGarniture");
    var supplementViandeElt = document.getElementById("supplement1");
    var garniture = document.getElementsByName("garniture[]");
    for (i = 0; i < garniture.length; i++) {
        if (garniture[i].checked === true) {
            garnitureValue += garniture[i].value + " ";
            garnitureAdmin += " X ";
        } else {
            garnitureAdmin += " - ";
        }
    }
    if (k ===0 ) {
        garnitureValue = 'Aucune';
    }
    var sauceElt = document.getElementsByName("sauce");
    k = 0;
    for (i = 0; i < sauceElt.length; i++) {
        if (sauceElt[i].checked === true) {
            sauceValue += sauceElt[i].value + " ";
            sauceAdmin += sauceElt[i].dataset.nameadmin + " ";
            k++
        }
    }
    if (k > 2) {
        var ajoutPrix = k - 2;
        prix += ajoutPrix * 0.2;
    } else if(k ===0) {
        sauceValue = 'Aucune';
    }
    console.log(prix);
    typeGarnitureElt.style.display = "none";
    supplementViandeElt.style.display = "block";
    window.scrollTo(0, 0);
}

function toSupplement2 () {
    var k = 0;
    var supplement1Elt = document.getElementById("supplement1");
    var supplement2Elt = document.getElementById("supplement2");
    var supplementElt = document.getElementsByName("supplement1");
    for (i = 0; i < supplementElt.length; i++) {
        if (supplementElt[i].checked === true) {
            supplement1 += supplementElt[i].value + " ";
            prix += Number(supplementElt[i].dataset.prix);
            k++
        }
    }
    if (k === 0) {
        supplement1 = 'Aucun';
    }
    supplement1Elt.style.display = "none";
    supplement2Elt.style.display = "block";
    window.scrollTo(0, 0);
}

function toFinish() {
    var btnReset = document.getElementById("btnReset");
    btnReset.style.display = "none";
    var k = 0;
    var supplement2Elt = document.getElementById("supplement2");
    var recap = document.getElementById("envoiRecap");
    var supplementElt = document.getElementsByName("supplement2");
    for (i = 0; i < supplementElt.length; i++) {
        if (supplementElt[i].checked === true) {
            supplement2 += supplementElt[i].value + " ";
            prix += Number(supplementElt[i].dataset.prix);
            k++;
        }
    }
    if (k === 0) {
        supplement2 = 'Aucun';
    }
    supplement2Elt.style.display = "none";
    recap.style.display = "block";
    var recapField = document.getElementById("recap");
    recapField.innerHTML = '<table><tr><td>Où vous mangez:</td><td><strong>' + lieu + '</strong></td></tr><tr><td>Votre menu:</td><td><strong>' + menuValue + '</strong></td></tr><tr><td>Votre sandwich:</td><td><strong>' + sandwich + '</strong></td></tr><tr><td>Votre pain:</td><td><strong>' + pain + '</strong></td></tr><tr><td>Votre garniture:</td><td><strong>' + garnitureValue + '</strong></td></tr><tr><td>Votre sauce:</td><td><strong>' + sauceValue + '</strong></td></tr><tr><td>Supplément sandwich :</td><td><strong>' + supplement1 + '</strong></td></tr><tr><tr><td>Supplément :</td><td><strong>' + supplement2 + '</strong></td></tr><tr></tr><tr><td>Prix total :</td><td><strong>' + prix + '</strong></td></tr></table>';

    progressBar(84);
    window.scrollTo(0, 0);
}

function annulationCommande() {
    window.location.reload(true);
}

function $_GET(param) {
    var vars = {};
    window.location.href.replace( location.hash, '' ).replace(
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function( m, key, value ) { // callback
            vars[key] = value !== undefined ? value : '';
        }
    );

    if ( param ) {
        return vars[param] ? vars[param] : null;
    }
    return vars;
}
function getTable() {
    numeroTable = Number($_GET('table'));
}

function recupData() {
    var xdr = new XMLHttpRequest();
    xdr.open("GET", "traitementcommande.php", false);
    xdr.send(null);
    document.getElementById("getdata").textContent = xdr.responseText;
}

function envoieValeur() {
    var sendMessage = "lieu=" + lieu + "&menu=" + menuAdmin + "&sandwich=" + sandwich + "&pain=" + pain + "&sauce=" + sauceAdmin + "&garniture=" + garnitureAdmin + "&supplement1=" + supplement1 + "&supplement2=" + supplement2 + "&prix=" + prix + "&table=" + numeroTable;
    var xtr = new XMLHttpRequest();
    xtr.open("POST", "traitementcommande.php");
    xtr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xtr.send(sendMessage);
}

function progressBar(pourcentage) {
    var progressBarElt = document.getElementById("progressBar");
    progressBarElt.style.width = pourcentage + "%";
}

/*
if (!(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent))) {
    var divDetect = document.getElementById("detectJS");
    divDetect.style.display = "none";
}
*/
var lieu = "";
var menuValue = "";
var menuAdmin = "";
var sandwich = "";
var pain = "";
var garnitureValue = "";
var garnitureAdmin = "";
var sauceValue = "";
var sauceAdmin = "";
var supplement1 = "";
var supplement2 = "";
var prix = 0;
var numeroTable = 0;


var formGlobal = document.getElementById("envoi");
formGlobal.addEventListener('click', function () {
    envoieValeur();
    setTimeout(function () {
        recupData();
    }, 500);
    var recap = document.getElementById("envoiRecap");
    var finalisationElt = document.getElementById("finalisation");
    finalisationElt.style.display = "block";
    recap.style.display = "none";
    progressBar(100);
});

