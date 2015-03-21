<?php
class MainController{
	function index(){
		$data["posts"] = Request::getAll();
		render("index",$data);
	}
}
?>