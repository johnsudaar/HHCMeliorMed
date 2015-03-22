<?php

class Notification{
	public $id;
	public $dest;
	public $reply;
	public $request;
	public $libelle;
	public $nom;
	public $prenom;
	public $photo;

	public function __construct($id,$dest,$reply,$request){
		$this->id = $id;
		$this->dest = $dest;
		$this->reply = $reply;
		$this->request = $request;
		if ($reply == 0) {
			$this->libelle = "Une question a été postée";
		}
		else {
			$this->libelle = "Vous avez reçu une réponse";
		}
	}

	public static function addNotif($request, $reply){
		$db = DBDriver::get()->getDriver();
		$users = User::getAll();
		if ($reply == 0) {
			foreach($users as $user){
				if($user->id != getUser()->id){
					$query = $db->prepare("INSERT INTO notif(dest,reply_id,request_id) VALUES (".$user->id.",".$reply.",".$request.")");
					$query->execute();
				}
			}
		}
		else {
			$r = Reply::getById($reply);
			$origine = $r->request;
			$createur = Request::getById($origine)->idUser;
			$query = $db->prepare("INSERT INTO notif(dest,reply_id,request_id) VALUES (".$createur.",".$reply.",".$request.")");
			$query->execute();
		}
	}

	public static function getFor($id){
		$db = DBDriver::get()->getDriver();
		$query = $db->prepare("SELECT * FROM notif WHERE dest=".$id);
		$query->execute();

		$data = array();
		while($row = $query->fetch()){
			$data[] = new Notification($row["id"],$row["dest"],$row["reply_id"],$row["request_id"]);
		}

		return $data;
	}

	public static function deleteNotif($id) {
		$db = DBDriver::get()->getDriver();
		$query = $db->prepare("DELETE FROM notif WHERE id=".$id);
		$query->execute();
	}

	public function isReply(){
		return $this->reply != 0;
	}

	public function isRequest(){
		return $this->request != 0;
	}

}

?>