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

	public function send(){
		if(isset($_POST['to']) && isset($_POST['message']) && is_numeric($_POST['to']) && ! empty($_POST['message'])){
			ChatMessage::send(getUser()->id,$_POST['to'],$_POST['message']);
			renderJSON(array(type=>"success",message=>"Isok"));
		}else{
			renderJSON(array(type=>"error",message=>"Lol pas bon ;)"));
		}
	}
}

?>