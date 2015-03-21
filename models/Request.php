<?php

require_once("DBDriver.php");

class Request{
	public $id;
	public $idUser;
	public $titre;
	public $message;
	public $type;

	public function __construct($id,$idUser,$titre,$message, $type){
		$this->id = $id;
		$this->idUser = $idUser;
		$this->titre = $titre;
		$this->message = $message;
		$this->type = $type;
	}

	public function insert(){
		$driver = DBDriver::get()->getDriver();
		$query = 'INSERT INTO request(id,idUser,titre,message,type) VALUES("'.$this->id.'","'.$this->idUser.'","'.$this->titre.'","'.$this->message.'","'.$this->type.'")';
		return $driver->exec($query);
	}

	public function getReply(){
		return Reply::getAllByPost($this->id);
	}

	public static function getAll(){
		$driver = DBDriver::get()->getDriver();
		$query  = $driver->prepare("SELECT * FROM request ORDER BY id DESC");
		$query->execute();
		$data   = Array();
		while($row = $query->fetch()){
			$data[] = new Request($row["id"],$row["idUser"],$row["titre"],$row["message"],$row["type"]);
		}
		return $data;
	}

	public static function getById($id){
		$driver = DBDriver::get()->getDriver();
		$query  = $driver->prepare("SELECT * FROM request WHERE id=".$id);
		$query->execute();
		if($row = $query->fetch()){
			return new Request($row["id"],$row["idUser"],$row["titre"],$row["message"],$row["type"]);
		}else{
			return NULL;
		}
	}

	public static function getNextId(){
		$driver = DBDriver::get()->getDriver();
		$query  = $driver->prepare("SELECT MAX( id ) FROM request");
		$query->execute();
		$row = $query->fetch();
		return $row[0]+1;
	}

	public static function getAllByTags($data) {
		$query = DBDriver::get()->getDriver()->prepare("SELECT * FROM request r, requestTag rt, tag t WHERE r.id = rt.idRequest AND rt.idTag = t.id AND rt.idTag IN (".implode(',', array_keys($data)).")");
		$query->execute();
		$values = array();
		while($row = $query->fetch()){
			$values[] = new Request($row["id"],$row["idUser"],$row["titre"],$row["message"],$row["type"]);
		}
		return $values;
	}
}

?>