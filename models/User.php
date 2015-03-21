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
	public $tags;

	public function __construct($id,$nom,$prenom,$fonction,$pays,$etablissement, $ville, $adresse, $photo, $tags) {
		$this->id = $id;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->fonction = $fonction;
		$this->pays = $pays;
		$this->etablissement = $etablissement;
		$this->ville = $ville;
		$this->adresse = $adresse;
		$this->photo = $photo;
		$this->tags = $tags;
	}

	public static function getByName($name){
		$driver = DBDriver::get()->getDriver();
		$query  = $driver->prepare("SELECT * FROM user WHERE nom = '".$name."'");
		$query->execute();	
		if ($row = $query->fetch()) {
			$user = new User($row["id"],$row["nom"],$row["prenom"],$row["fonction"],$row["pays"],$row["etablissement"],$row["ville"], $row["adresse"], $row["photo"], User::getTagsForUser($row["id"]));

		}else{
			throw new Exception("No user found ...");
		}
		return $user;
	}

	public static function getAll(){
		$driver = DBDriver::get()->getDriver();
		$query  = $driver->prepare("SELECT * FROM user");
		$query->execute();	
		$data = array();
		while ($row = $query->fetch()) {
			$data[] = new User($row["id"],$row["nom"],$row["prenom"],$row["fonction"],$row["pays"],$row["etablissement"],$row["ville"], $row["adresse"], $row["photo"], User::getTagsForUser($row["id"]));
		}
		return $data;
	}

	public static function getUserById($id) {
		$query = DBDriver::get()->getDriver()->prepare("SELECT * FROM user WHERE id =".$id);
		$query->execute();
		$row = $query->fetch();
		$user = null;
		if($row) {
				$user = new User($row["id"],$row["nom"],$row["prenom"],$row["fonction"],$row["pays"],$row["etablissement"],$row["ville"], $row["adresse"], $row["photo"], User::getTagsForUser($row["id"]));
			}
			return $user;
		}

		public static function getTagsForUser($id){
		$query = DBDriver::get()->getDriver()->prepare("SELECT * FROM userTag uT, tag t WHERE uT.idUser =".$id." && uT.idTag = t.id");
		$query->execute();
		$data = array();
		while($row = $query->fetch()) {
			$data[$row['id']] = $row['libelle'];
		}
		return $data;

	}
}

?>