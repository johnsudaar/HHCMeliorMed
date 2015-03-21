<?php
// Data
class MessageController{
	function postRequest(){
		if(isset($_POST['message']) != "" && $_POST['message'] != ""){
			$lines = explode("\n", $_POST['message']);
			$titre = $lines[0];
			array_shift($lines);
			$message = nl2br(implode("\n",$lines));
			$req = new Request(Request::getNextId(),getUser()->id,$titre, $message,"requ");
			$req->insert();
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
			$rep = new Reply(Reply::getNextId(),$_POST['message'], $_POST['request'], 0, getUser()->id);
			$rep->insert();
			redirect("/");
		}else{
			redirect("index.php/Message/testReply");
		}
	}

	function testReply(){
		render('tests/form_reply');
	}
}
?>