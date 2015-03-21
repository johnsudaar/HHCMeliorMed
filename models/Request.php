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

	public function getAll(){
		$driver = DBDriver::get()->getDriver();
		$query  = $driver->prepare("SELECT * FROM request");
		$query->execute();
		$data   = Array();
		while($row = $query->fetch()){
			$data[] = new Request($row["id"],$row["idUser"],$row["titre"],$row["message"],$row["type"]);
		}
		return $data;
	}

	public function getById($id){
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
}

?>