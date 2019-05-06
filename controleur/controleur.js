
$(document).ready(function(){
  // charger le gabarit html
  $("#gabarit").load("vue/gabarit.html", function() {
    // charger le contenu du catalogue et du panier
    loadCatalogue();
    loadPanier();
  });
});

function loadCatalogue(){
  $("#template").load("vue/modeleInventaire.html", function() {
    // charger le contenu du catalogue et du panier
	  let modeleInventaire = new AhuntsicModele("modele-inventaire", "contenu");
	  let requete = new RequeteAjaxAhuntsicModele("controleur/controleur.php", modeleInventaire); 
	  requete.openAndSend();
  });
 }

 function loadPanier(){
  $("#template").load("vue/modelePanier.html", function() {
    // charger le contenu du catalogue et du panier
	let modelePanier = new AhuntsicModele("modele-panier", "panier");
	let requete = new RequeteAjaxAhuntsicModele("controleur/controleur.php?action=getPanier", modelePanier);
	requete.openAndSend();
	});	
 }

 function ajouterPanier(noArticle){
   let requete = new RequeteAjax("controleur/controleur.php?action=ajouterPanier&noArticle=" + noArticle, 
	loadPanier);
   requete.openAndSend();
 }
