<?php
  require_once '../modele/Panier.php';

  $panier = new Panier();
  echo "affPanier</br>";
  echo "========================</br>";
  echo $panier->affPanier();
  echo "</br>========================</br>";
  echo "ajouterArticle</br>";
  echo "========================</br>";
  echo $panier->ajouterArticle(10,1,10.0);
  echo "</br>========================</br>";
  echo "affPanier</br>";
  echo "========================</br>";
  echo $panier->affPanier();
  echo "</br>========================</br>";
?>
