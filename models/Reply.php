<?php

require_once("DBDriver.php");


class Reply{
	public $id;
	public $message;
	public $request;
	public $resolu;
	public $idUser;

	public function __construct($id,$message,$request, $resolu, $idUser){
		$this->id = $id;
		$this->message = $message;
		$this->request = $request;
		$this->resolu  = $resolu;
		$this->idUser  = $idUser;
	}

	public function insert(){
		$db = DBDriver::get()->getDriver();
		$query = $db->prepare('INSERT INTO reply(id,message,request,resolu,idUser) VALUES("'.$this->id.'","'.$this->message.'","'.$this->request.'","'.$this->resolu.'","'.$this->idUser.'")');
		return $query->execute();
	}

	public function getAllByPost($request){
		$db = DBDriver::get()->getDriver();
		$query = $db->prepare('SELECT * FROM reply WHERE request = '.$request);
		$query->execute();
		$data = array();

		while($row = $query->fetch()){
			$data[] = new Reply($row["id"],$row["message"],$row["request"],$row["resolu"],$row["idUser"]);
		}

		return $data;
	}

	public static function getNextId(){
		$driver = DBDriver::get()->getDriver();
		$query  = $driver->prepare("SELECT MAX( id ) FROM reply");
		$query->execute();
		$row = $query->fetch();
		return $row[0]+1;
	}
}

?>