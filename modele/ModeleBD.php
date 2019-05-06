<?php
abstract class ModeleBD{
  private $servername = "localhost";
  private $username = "root";
  private $password = "";
  private $dbname = "monMagasin";
  protected $mysqli_conn = "";
  private $mysqli_result = "";
	
  function __construct() {
		$this->mysqli_conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($this->mysqli_conn->connect_error) {
			error_log("Echec de la connexion: " . $this->mysqli_conn->connect_error . "\n" , 3, "ModelBD.log");
			die("Echec de la connexion: " . $this->mysqli_conn->connect_error);
		}
  }

	 function __destruct() {
		$this->mysqli_conn->close();
		// echo "Fermeture de la connexion ModelBD"."<br>";
		error_log("Fermeture de la connexion ModelBD\n" , 3, "ModelBD.log");
	}
  
  function selectItems($sql){
	error_log("selectItems : " . $sql . "\n" , 3, "ModelBD.log");
	
	if ($this->mysqli_result = $this->mysqli_conn->query($sql))
	{
		$this->resultArray = $this->mysqli_result->fetch_all(MYSQLI_ASSOC);
		// echo "Le select a retourné : " . count($this->resultArray) . " ligne(s) <br>";
		error_log("Le select a retourné : " . count($this->resultArray) . " ligne(s)\n" , 3, "ModelBD.log");
		return $this->resultArray;
	}
	else {
		//echo "Erreur en éxécutant la commande sql : " . $sql ."<br>";		
		error_log("Erreur en éxécutant la commande sql : " . $sql . "\n" , 3, "ModelBD.log");
		return FALSE;
	}
  }

 
   function insertItem($sql){

	if ($this->mysqli_conn->query($sql) === TRUE) {
			error_log("Un nouvel enregistrement a été inséré avec succès\n" , 3, "ModelBD.log");
			//echo "Un nouvel enregistrement a été inséré avec succès" . "<br>";
		} else {
			error_log("Échec de l'insertion: " . $sql . "\n" . $this->mysqli_conn->error . "\n" , 3, "ModelBD.log");
			//echo "Échec de l'insertion: " . $sql . "<br>" . $this->mysqli_conn->error . "<br>";
		}
  }

}

?>
