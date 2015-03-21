<?php
// Data
class MessageController{
	function postRequest(){
		if(isset($_POST['message']) != "" && $_POST['message'] != ""){
			$lines = explode("\n", $_POST['message']);
			$titre = $lines[0];
			array_shift($lines);
			$message = nl2br(implode("\n",$lines));
			$id_request = Request::getNextId();
			$req = new Request($id_request,getUser()->id,$titre, $message,"requ");
			$req->insert();
			Notification::addNotif($id_request, 0);
			redirect("/");
		}else{
			redirect("/");
		}
	}

	function testSend(){
		render('tests/form_request');
	}

	function testGet(){
		$data['data'] = Request::getAll();
		render('tests/show_all',$data);
	}

	function setResolu($data){
		if($data[0]) {
			$rep = Reply::getById($data[0]);
			var_dump($rep);
			$rep->setResolu(true);
			redirect("index.php/Message/testGet");
		} else {
			redirect("index.php/Message/testGet");
		}
	}

	function reply(){
		if(isset($_POST['request']) && isset($_POST['message']) && !empty($_POST['request']) && !empty($_POST['message'])){
			$id_reply = Reply::getNextId();
			$rep = new Reply($id_reply,$_POST['message'], $_POST['request'], 0, getUser()->id);
			$rep->insert();
			Notification::addNotif(0, $id_reply);
			redirect("/");
		}else{
			redirect("index.php/Message/testReply");
		}
	}

	function testReply(){
		render('tests/form_reply');
	}

	public function testGetAllForMyTags(){
		$user = getUser();
		$messages = Request::getAllByTags($user->tags);
		render('tests/allByTags', $messages);
	}
}
?>