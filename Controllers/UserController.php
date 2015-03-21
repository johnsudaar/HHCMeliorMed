<?php

class UserController{
	function login($data){
		if(login($data[0])){
			redirect("/");
		}else{
			notFound();
		}
	}

	function logout(){
		logout();
		redirect("/");
	}

	function info(){
		$user = getUser();
		$data = Array();
		if($user == NULL){
			$data['is_connected'] = "false";
			$data['username'] = "NULL";
		}else{
			$data['is_connected'] = "true";
			$data['username'] = $user->nom;
		}
		render("user_info",$data);
	}

	function profile($data){
		if($data[0]){
			$user = (array) User::getUserById($data[0]);
			$nbResolutions = Reply::countResolutionsByIdUser($data[0]);
			$user['nbResolution'] = $nbResolutions;
			render('user_profile', $user);
		} else {
			notFound();
		}
	}

	function connect(){
		getUser()->setConnect();
	}

	function connected(){
		$users = User::getConnected();
		$data = array();

		foreach($users as $user){
			if($user->id != getUser()->id){
				$cur["id"] = $user->id;
				$cur["nom"] = $user->nom;
				$cur["prenom"] = $user->prenom;
				$cur["pays"] = $user->pays;
				$cur["fonct"] = $user->fonction;
				$data[] = $cur;
			}
		}
		renderJSON($data);
	}
}

?>