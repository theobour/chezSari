# Chez Sari
## Front-End
### Application mobile - Client
- Sous forme de formulaire <form>
- Chaque fois que la personne sélectionne une option, scroll automatique vers la section en dessous.
- Chaque section comporte un bouton : "annuler la commande"
    -Section Sur Place/À Emporter
    -menus disponibles
    -sandwich
    -garniture
    -sauce
    -supplément
    -boisson
    -Confirmation finale : Souhaitez-vous ajouter quelquechose à votre commande? Commande terminée
    
    -Page finale une fois la commande réalisée : indique le n° de commande
    
### Application tablette - Admin
- Affichage des commandes en deux colonnes :
  - Colonne "en attente de payement" : reçoit les commandes éffectué sur les téléphones.
  - Colonne "payer": quand le kébabier clique sur une commande la commande va dans cette colonne
### Application pour récupérer la data
- Récupérer la data pour les consulter. Récupérer la data par critère : type de kebab, menu/pas menu, horaire
## Back-End
### Sitemap
- traitementcommande.php : permet de récupérer par méthode POST la commande et la stocker dans la BDD (encours)
- Index.php : permet à l'utilisateur de visualiser les commandes
- selectcommande.php : permet de récupérer l'ensemble des commandes dans la BDD(encours) et de les transférer par méthode AJAX à index.php
- commandevalide.php : Lorsque l'utilisateur clique sur le bouton 3 actions s'effectue :
    1 : On récupère les données de la commande validé et on l'insère dans la BDD (stockage).
    2 : On imprime l'ensemble de ces données dans la la colonne "commande payé" de index.php
    3 : On supprime ces données de la BDD (encours)
### BDD et champ
Deux bases de données :
- encours: pour les commandes qui sont entrain d'être préparée
- stockage: pour stocker les commandes payées et en relever la data

Elles comportent les mêmes champ :
- ID
- date
- lieu (emporter/sur place)
- menu (sandwich/sandwich-frite-boisson)
- pain (type de pain)
- sauce
- garniture

