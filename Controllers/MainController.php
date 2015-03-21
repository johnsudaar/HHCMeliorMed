<?php
class MainController{
	function index(){
		$data['test'] = $data[0];
		render("index",$data);
	}
}
?>