<?php
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

	function test(){
		render('tests/form_request');
	}
}
?>