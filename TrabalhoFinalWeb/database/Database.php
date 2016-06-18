<?php

/**
 * Description of Connect
 *
 * @author Lauro Pereira
 */
class Database{

	private $servername = "localhost";
	private $username = "dev";
	private $password = "3188";
        private $databaseName = "webcommerce";
	protected $con;
	
	function __construct(){
            try{
                $this->con = new mysqli($this->servername, $this->username, $this->password, $this->databaseName);
            }catch(Exception $e){
                echo "Falha ao se conectar com MySQL: " . $e->errorMessage();
            }
	}
        function getCon(){
            return $this->con;
        }
        
        function __destruct() {
            unset($this->con);
        }
}