<?php

// Inclure les modèles
require_once '../modele/Inventaire.php';
require_once '../modele/Panier.php';

session_start();

if(!isset($_GET["action"])){
  $action = "getItems";
} else {
  $action = $_GET["action"];
}

if($action == "getItems"){
  $inventaire = new Inventaire();
  echo $inventaire->getItems();
}
else if($action == "ajouterPanier"){
  $panier = new Panier();
  $panier->ajouterArticle($_GET["noArticle"],1,10.0);
  echo $_GET["noArticle"];
}
else if($action == "getPanier"){
  $panier = new Panier();
  echo $panier->affPanier();
}

?>
