<?php
  require_once '../modele/Panier.php';

  testAfficherPanierVide();
  testAfficherPanierUnArticle();  
  
   function testAfficherPanierVide()
 {
    // Arrange
	$panier = new Panier();
	$expectedValue = '[]';	
	
	// Act
	$actualValue = $panier->affPanier();

    // Assert
	echo "========================" . __FUNCTION__ . "===========================================</br>";
	echo "valeur attendue " . $expectedValue . " </br>";
	echo "valeur réelle " . $actualValue . " </br>";
	assert($expectedValue == $actualValue);
 }

    function testAfficherPanierUnArticle()
 {
    // Arrange
	$panier = new Panier();
	$expectedValue = '[{"libelleProduit":"test","qteProduit":1,"prixProduit":1.5}]';	
	$panier->ajouterArticle("test",1,1.5);
	
	// Act
	$actualValue = $panier->affPanier();

    // Assert
	echo "========================" . __FUNCTION__ . "===========================================</br>";
	echo "valeur attendue " . $expectedValue . " </br>";
	echo "valeur réelle " . $actualValue . " </br>";
	assert($expectedValue == $actualValue);
 }
?>
