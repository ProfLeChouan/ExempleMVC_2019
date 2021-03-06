<?php
class Panier{

  function __construct() {
    $this->creationPanier();
  }

  /**
  * Verifie si le panier existe, le créé sinon
  * @return booleen
  */
 public function creationPanier(){
    if (!isset($_SESSION['panier'])){
        $_SESSION['panier']=array();
        $_SESSION['panier']['libelleProduit'] = array();
        $_SESSION['panier']['qteProduit'] = array();
        $_SESSION['panier']['prixProduit'] = array();
        $_SESSION['panier']['verrou'] = false;
      }
      return true;
  }


  /**
   * Ajoute un article dans le panier
   * @param string $libelleProduit
   * @param int $qteProduit
   * @param float $prixProduit
   * @return void
   */
  public function ajouterArticle($libelleProduit,$qteProduit,$prixProduit){

    //Si le panier existe
    if ($this->creationPanier() && !$this->isVerrouille())
    {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

      if ($positionProduit !== false)
      {
        $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
      }
      else
      {
        //Sinon on ajoute le produit
        array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
        array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
        array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
      }
    }
    else
      echo "Un problème est survenu veuillez contacter l'administrateur du site.";
  }

  /**
   * Modifie la quantité d'un article
   * @param $libelleProduit
   * @param $qteProduit
   * @return void
   */
  public function modifierQTeArticle($libelleProduit,$qteProduit){
     //Si le panier éxiste
     if ($this->creationPanier() && !$this->isVerrouille())
     {
        //Si la quantité est positive on modifie sinon on supprime l'article
        if ($qteProduit > 0)
        {
           //Recharche du produit dans le panier
           $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

           if ($positionProduit !== false)
           {
              $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
           }
        }
        else
        $this->supprimerArticle($libelleProduit);
     }
     else
     echo "Un problème est survenu veuillez contacter l'administrateur du site.";
  }

  /**
   * Supprime un article du panier
   * @param $libelleProduit
   * @return unknown_type
   */
  public function supprimerArticle($libelleProduit){
     //Si le panier existe
     if ($this->creationPanier() && !$this->isVerrouille())
     {
        //Nous allons passer par un panier temporaire
        $tmp=array();
        $tmp['libelleProduit'] = array();
        $tmp['qteProduit'] = array();
        $tmp['prixProduit'] = array();
        $tmp['verrou'] = $_SESSION['panier']['verrou'];

        for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
        {
           if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
           {
              array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
              array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
              array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
           }

        }
        //On remplace le panier en session par notre panier temporaire à jour
        $_SESSION['panier'] =  $tmp;
        //On efface notre panier temporaire
        unset($tmp);
     }
     else
     echo "Un problème est survenu veuillez contacter l'administrateur du site.";
  }


  /**
   * Montant total du panier
   * @return int
   */
  public function MontantGlobal(){
     $total=0;
     for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
     {
        $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
     }
     return $total;
  }

  public function affPanier(){
    $contenu = array();

    for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
    {
      $libelleProduit = $_SESSION['panier']['libelleProduit'][$i];
      $qteProduit = $_SESSION['panier']['qteProduit'][$i];
      $prixProduit = $_SESSION['panier']['prixProduit'][$i];

      $contenu[] = array('libelleProduit'=> $libelleProduit, 'qteProduit'=> $qteProduit, 'prixProduit'=>$prixProduit);
    }

    return json_encode($contenu);
  }


  /**
   * Fonction de suppression du panier
   * @return void
   */
  public function supprimePanier(){
     unset($_SESSION['panier']);
  }

  /**
   * Permet de savoir si le panier est verrouillé
   * @return booleen
   */
  public function isVerrouille(){
     if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
     return true;
     else
     return false;
  }

  /**
   * Compte le nombre d'articles différents dans le panier
   * @return int
   */
  public function compterArticles()
  {
     if (isset($_SESSION['panier']))
     return count($_SESSION['panier']['libelleProduit']);
     else
     return 0;

  }
}
?>
