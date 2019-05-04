
$(document).ready(function(){
  // charger le gabarit html
  $("#gabarit").load("vue/gabarit.html", function() {
    // charger le contenu du catalogue et du panier
    loadCatalogue();
    loadPanier();
  });
});

function loadCatalogue(){
  let requete = new RequeteAjax("controleur/controleur.php");
  let modeleInventaire = new AhuntsicModele("modele-inventaire", "contenu");
  requete.getJSON(data => {modeleInventaire.applyTemplate_toAll(data);});
 }

 function ajouterPanier(noArticle){
   let requete = new RequeteAjax("controleur/controleur.php?action=ajouterPanier&noArticle=" + noArticle);
   requete.getJSON(loadPanier);
 }

 function loadPanier(){
   let requete = new RequeteAjax("controleur/controleur.php?action=getPanier");
   let modeleInventaire = new AhuntsicModele("modele-panier", "panier");
   requete.getJSON(data => {modeleInventaire.applyTemplate_toAll(data);});
 }
