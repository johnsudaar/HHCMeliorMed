<?php

class ChatMessage{
	public $id;
	public $sender;
	public $dest;
	public $message;

	public function __construct($id,$sender,$dest,$message){
		$this->id = $id;
		$this->sender = $sender;
		$this->dest = $dest;
		$this->message = $message;
	}

	public static function last($user){
		$db = DBDriver::get()->getDriver();
		$query = $db->prepare('SELECT * FROM chatmessage WHERE dest='.$user);
		$query->execute();

		$res["uid"] = -1;
		$res["lmess"] = -1;

		while($row = $query->fetch()){
			if($row['id'] > $res['lmess']){
				$res['uid'] = $row['sender'];
				$res['lmess'] = $row['id'];
			}
		}
		return $res;
	}

	public static function send($from,$to,$message){
		$db = DBDriver::get()->getDriver();
		$query = $db->prepare('INSERT INTO chatmessage (sender,dest,message) VALUES ("'.$from.'","'.$to.'","'.$message.'")');
		$query->execute();
	}

	public function getByConv($me,$him){
		$db = DBDriver::get()->getDriver();
		$query = $db->prepare("SELECT * FROM chatmessage WHERE dest = ".$me." OR (sender=".$me." AND dest=".$him.")");
		$query->execute();
		$data = array();

		while($row = $query->fetch()){
			$data[] = new ChatMessage($row['id'],$row['sender'],$row['dest'],$row['message']);
		}
		return $data;
	}
}

?>