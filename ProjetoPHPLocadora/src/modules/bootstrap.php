<?php
require_once 'db\connect.php';
class Bootstrap{
	
	static $connection;
	
	function __construct(){
		if(!filter_var($_SERVER['user'])){
			$_SERVER['user'] = true;
		}else{
			$conn = new Connect();
			$conn->createDb();
			$conn->createTables();
			
			$this->connection = $conn->getCon();
		}
	}
}