<?php
abstract class ModeleBD{
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $dbname = "monMagasin";
  private $conn;

  function __construct() {
      $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
      if ($this->conn->connect_error) {
        die("Echec de la connexion: " . $this->conn->connect_error);
      }
  }

  function __destruct() {
    $this->conn->close();
  }

  protected function executerRequete($sql){
    $result = $this->conn->query($sql);
    return $result;
  }

}
?>
