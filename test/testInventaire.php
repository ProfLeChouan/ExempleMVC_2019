<?php
  require_once '../modele/Inventaire.php';

  $allo = new Inventaire();
  echo "getItems</br>";
  echo "========================</br>";
  echo $allo->getItems();
  echo "</br>========================</br>";
?>
