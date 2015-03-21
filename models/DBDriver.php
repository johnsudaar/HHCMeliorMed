<?php

class DBDriver{
	private static $_instance = null;
	private $bdd;
	private function __construct() {
		$USERNAME = "root";
		$PASSWORD = "root";
		$HOST = "127.0.0.1";
		$DB = "melio";
		$this->bdd = new PDO('mysql:host='.$HOST.';dbname='.$DB.';charset=utf8', $USERNAME, $PASSWORD);

	}
	public static function get() {
		if(is_null(self::$_instance)) {
			self::$_instance = new DBDriver();  
		}

		return self::$_instance;
	}

	public function getDriver(){
		return $this->bdd;
	}
}

?>