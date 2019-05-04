
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
  let modeleInventaire = new ahuntsic_modele("modele-inventaire");
  requete.getJSON(data => {modeleInventaire.applyTemplate_toAll(data, "contenu");});
 }

 function ajouterPanier(noArticle){
   let requete = new RequeteAjax("controleur/controleur.php?action=ajouterPanier&noArticle=" + noArticle);
   let modeleInventaire = new ahuntsic_modele("modele-panier");
   requete.getJSON(loadPanier);
 }

 function loadPanier(){
   let requete = new RequeteAjax("controleur/controleur.php?action=getPanier");
   let modeleInventaire = new ahuntsic_modele("modele-panier");
   requete.getJSON(data => {modeleInventaire.applyTemplate_toAll(data, "panier");});
 }
