<?php

require_once("DBDriver.php");

class User{
	public $id;
	public $nom;
	public $prenom;
	public $fonction;
	public $pays;
	public $etablissement;
	public $ville;
	public $adresse;
	public $photo;
	public $in_db;

	public function __construct($id,$nom,$prenom,$fonction,$pays,$etablissement, $ville, $adresse, $photo) {
		$this->id = $id;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->fonction = $fonction;
		$this->pays = $pays;
		$this->etablissement = $etablissement;
		$this->ville = $ville;
		$this->adresse = $adresse;
		$this->photo = $photo;
	}

	public static function getByName($name){
		$driver = DBDriver::get()->getDriver();
		$query  = $driver->prepare("SELECT * FROM user WHERE nom = '".$name."'");
		$query->execute();	
		if ($row = $query->fetch()) {
			return new User($row["id"],$row["nom"],$row["prenom"],$row["fonction"],$row["pays"],$row["etablissement"],$row["ville"], $row["adresse"], $row["photo"]);
		}else{
			throw new Exception("No user found ...");
		}
	}

}

?>