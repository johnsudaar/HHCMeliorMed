<?php

class ChatController{	
	public function with($data){
		if(count($data) == 1 && is_numeric($data[0])){
			$data['me'] = getUser();
			$data['him'] = User::getUserById($data[0]);
			$data['posts'] = ChatMessage::getByConv(getUser()->id,$data[0]);
			$data['last_id'] = -1;
			foreach($data['posts'] as $post){
				if($post->id > $data['last_id']){
					$data['last_id'] = $post->id;
				}
			}
			render("chat/main",$data,false);
		}else{
			notFound();
		}
	}

	public function lastMe(){
		renderJSON(array(ChatMessage::last(getUser()->id)));
	}

	public function send(){
		if(isset($_POST['to']) && isset($_POST['message']) && is_numeric($_POST['to']) && ! empty($_POST['message'])){
			ChatMessage::send(getUser()->id,$_POST['to'],$_POST['message']);
			renderJSON(array("type"=>"success","message"=>"Isok"));
		}else{
			renderJSON(array("type"=>"error","message"=>"Lol pas bon ;)"));
		}
	}

	public function from($data){
		if(count($data) == 2 && is_numeric($data[0]) && is_numeric($data[1])){
			$posts = ChatMessage::getByConv(getUser()->id, $data[0]);
			$him = User::getUserById($data[0]);
			$all = array();
			foreach($posts as $post){
				if($post->id > $data[1]){
					$m["message"] = $post->message;
					if($post->sender == getUser()->id){
						$m["from"] = getUser()->nom." ".getUser()->prenom;
						$m["me"] = true;
					}else{
						$m["from"] = $him->nom." ".$him->prenom;
						$m["me"] = false;
					}
					$m["id"] = $post->id;
					$all[] = $m;
				}
			}
			renderJSON($all);
		}else{
			renderJSON(array(type=>"error",message=>"LOL NOPE !"));
		}
	}
}

?>