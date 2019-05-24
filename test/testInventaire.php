<?php
  require_once '../modele/Inventaire.php';

  //testGetItems();
  testGetOndeDefaultItem();
  
 function testGetItems()
 {
    // Arrange
	$inventaire = new Inventaire();
	$expectedValue = '[{"noArticle":"123","description":"Empire Burlesque - Bob Dylan - 1985","cheminImage":".\/album.png","prixUnitaire":"10.90","quantiteEnStock":"60","quantiteDansPanier":"0"},{"noArticle":"456","description":"Hide your heart - Bonnie Tyler - 1988","cheminImage":".\/album.png","prixUnitaire":"9.90","quantiteEnStock":"110","quantiteDansPanier":"0"}]';	
	
	// Act
	$actualValue = $inventaire->getItems();

    // Assert
	echo "========================" . __FUNCTION__ . "===========================================</br>";
	echo "valeur attendue " . $expectedValue . " </br>";
	echo "valeur réelle " . $actualValue . " </br>";
	assert($expectedValue == $actualValue);
 }

  function testGetOndeDefaultItem()
 {
    // Arrange
	$inventaire = new Inventaire();
	$expectedValue = '[{"noArticle":"1","description":"test ","cheminImage":"test","prixUnitaire":"1.00","quantiteEnStock":"1","quantiteDansPanier":"0"}]';	
	
	$inventaire->insertItem("DELETE FROM inventaire");
	$inventaire->insertItem("INSERT INTO inventaire (`noArticle`, `description`, `cheminImage`, `prixUnitaire`, `quantiteEnStock`, `quantiteDansPanier`) VALUES
(1, 'test', 'test', '1.0', 1, 0);");
	// Act
	$actualValue = $inventaire->getItems();

    // Assert
	echo "========================" . __FUNCTION__ . "===========================================</br>";
	echo "valeur attendue " . $expectedValue . " </br>";
	echo "valeur réelle " . $actualValue . " </br>";
	assert($expectedValue == $actualValue);
 }

?>
