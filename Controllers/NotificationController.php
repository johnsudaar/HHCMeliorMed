<?php

class NotificationController{
	public function mine(){
		$nots = Notification::getFor(getUser()->id);
		$data = array();
		foreach($nots as $not){
			if($not->isReply()){
				$rep = Reply::getById($not->reply);
			}else{
				$rep = Request::getById($not->request);
			}
			$user = User::getUserById($rep->idUser);
			$cur["text"] = $rep->message;
			$cur["from"] = $user->nom ." ".$user->prenom;
			$cur["pic"] = $user->photo;
			$data[] = $cur;
		}
		renderJSON($data);
	}

	public function removeNotif() {
		if(isset($_POST['id'])){
			Notification::deleteNotif($_POST['id']);
			renderJSON(array("type"=>"success","message"=>"Isok"));
		}
	}

	public function getInfos() {
		$user = getUser();
		$notifications = Notification::getFor($user->id);
		$notifications = (array) $notifications;
		foreach($notifications as $notif) {
			$user;
			if($notif->reply == 0) {
				$req = Request::getById($notif->request);
				$user = User::getUserById($req->idUser);
			}
			else {
				$rep = Reply::getById($notif->reply);
				$user = User::getUserById($rep->idUser);
			}
			$notif->nom = $user->nom;
			$notif->prenom = $user->prenom;
			$notif->photo = $user->photo;
		}
		renderJSON($notifications);
	}
}

?>