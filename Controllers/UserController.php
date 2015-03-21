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
}

?>