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

/*function handleFileUpload($files){
	$target_dir = "uploads/";
	$target_file = $target_dir . $files["fileToUpload"]["name"];
	$uploadOk = 1;
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$uploadOk = 1;
	}
	// Check if file already exists
	if (file_exists($target_file)) {
    	echo "Sorry, file already exists.";
    	$uploadOk = 0;
	}
	 // Check file size
	if ($files["fileToUpload"]["size"] > 20000000) {
    	echo "Sorry, your file is too large.";
    	$uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($files["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $files["fileToUpload"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
}*/

?>