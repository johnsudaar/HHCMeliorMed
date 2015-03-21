<?php
function render($view, $data=Array(), $template = true){
	if($template)
		include "views/header.html.php";
	include	"views/".$view.".html.php";
	if($template)
		include "views/footer.html.php";
}

function renderJSON($data){
	echo(json_encode($data));
	die();
}

function notFound(){
	render("404");
	die();
}

function redirect($path){
	$BASE_PATH = "http://localhost/";
	header('Location:'.$BASE_PATH.$path);
	die();
}

function login($name){
	try{
		User::getByName($name);
	}catch(Exception $e){
		return false;
	}
	$_SESSION['login'] = $name;
	return true;
}

function getUser(){
	if(isset($_SESSION['login'])){
		return User::getByName($_SESSION['login']);
	}else{
		return NULL;
	}
}

function logout(){
	unset($_SESSION['login']);
}

?>