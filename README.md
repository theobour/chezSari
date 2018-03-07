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
### Récupération des données
- Récupérer les données envoyé par la page web client
- Transmettre les données à l'application tablette (fonctionnement du chat en ligne)
### Stockage des data
- Entre la récupération et la transmission
- Stockage dans une bdd 
  - ID
  - Date timestamp
  - Sur place / à emporter
  - Type de kebab
  - Frite (oui/non)
  - Type de boisson
  - Supplément
  - Prix

