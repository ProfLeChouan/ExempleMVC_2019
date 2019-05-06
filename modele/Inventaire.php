<?php
require_once 'ModeleBD.php';

class Inventaire extends ModeleBD {
  public function getItems(){
    $result = $this->selectItems("SELECT * FROM inventaire");
    return json_encode($result);
  }
}
?>
