<?php
require_once 'ModeleBD.php';

class Inventaire extends ModeleBD {
  public function getItems(){
    $result = $this->executerRequete("SELECT * FROM inventaire");
    $resultArray = $result->fetch_all(MYSQLI_ASSOC);
    return json_encode($resultArray);
  }
}
?>
