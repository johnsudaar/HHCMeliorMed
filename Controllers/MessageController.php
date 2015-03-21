<?php
// Data
class MessageController{
	function postRequest(){
		if(isset($_POST['titre']) && isset($_POST['message']) && $_POST['titre'] != "" && $_POST['message'] != ""){
			$req = new Request(Request::getNextId(),getUser()->id,$_POST['titre'], $_POST['message'],"requ");
			$req->insert();
			redirect("/");
		}else{
			redirect("index.php/Message/test");
		}
	}

	function testSend(){
		render('tests/form_request');
	}

	function testGet(){
		$data['data'] = Request::getAll();
		render('tests/show_all',$data);
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