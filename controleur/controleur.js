
$(document).ready(function(){
  // charger le gabarit html
  $("#gabarit").load("vue/gabarit.html", function() {
    // charger le contenu du catalogue et du panier
    loadCatalogue();
    loadPanier();
  });
});

function loadCatalogue(){
  let modeleInventaire = new AhuntsicModele("modele-inventaire", "contenu");
  let requete = new RequeteAjaxAhuntsicModele("controleur/controleur.php", modeleInventaire); 
  requete.openAndSend();
 }

 function loadPanier(){
   let modelePanier = new AhuntsicModele("modele-panier", "panier");
   let requete = new RequeteAjaxAhuntsicModele("controleur/controleur.php?action=getPanier", modelePanier);
   requete.openAndSend();
 }

 function ajouterPanier(noArticle){
   let requete = new RequeteAjax("controleur/controleur.php?action=ajouterPanier&noArticle=" + noArticle, 
	loadPanier);
   requete.openAndSend();
 }
