<?php

class Notification{
	public $id;
	public $dest;
	public $reply;
	public $request;

	public function __construct($id,$dest,$reply,$request){
		$this->id = $id;
		$this->dest = $dest;
		$this->reply = $request;
	}

	public static function addNotif($request, $reply){
		$db = DBDriver::get()->getDriver();
		$users = User::getAll();
		foreach($users as $user){
			if($user->id != getUser()->id){
				$query = $db->prepare("INSERT INTO notif(dest,reply_id,request_id) VALUES (".$user->id.",".$reply.",".$request.")");
				$query->execute();
			}
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

	public function isReply(){
		return $this->reply == 0;
	}

	public function isRequest(){
		return $this->request == 0;
	}

}

?>