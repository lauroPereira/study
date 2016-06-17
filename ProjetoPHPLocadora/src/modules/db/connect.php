<?php
class Connect extends mysqli{

	private $servername = "localhost";
	private $username = "dev";
	private $password = "0eac5f93b24395a365f291021a482976";
	protected $con;
	
	function __construct(){
		try{
			$this->con = new mysqli($this->servername, $this->username, $this->password);

		}catch(Exception $e){
			echo "Falha ao se conectar com MySQL: " . $e->errorMessage();
		}
	}
	
	function getCon(){
		return $this->con;
	}
	
	function createDb(){
		try{

			$sql = "CREATE DATABASE IF NOT EXISTS db_locadora";
			$this->query($sql);
			
		} catch(Exception $e){
			echo "Falha ao criar o banco de dados: " . $e->errorMessage();
		}
	}
	
	function createTables(){
		try{
			self::createDb();
			$this->select_db("db_locadora");
		} catch(Exception $e){
			echo "Falha ao conectar no banco de dados: " . $e->errorMessage();
		}
		
		try{
			$sql_create ="	CREATE TABLE IF NOT EXISTS tbl_protagonistas(
							ID_protagonista SMALLINT AUTO_INCREMENT PRIMARY KEY,
							nome_protagonista VARCHAR(60) NOT NULL
							);";
			$this->query($sql_create);
		} catch(Exception $e){
			echo "Falha ao criar a tabela tbl_protagonistas: " . $e->errorMessage();
		}
		try{	
			$sql_create ="	CREATE TABLE IF NOT EXISTS tbl_generos(
							ID_genero SMALLINT AUTO_INCREMENT PRIMARY KEY,
							genero VARCHAR(20) NOT NULL
							);";
			$this->query($sql_create);
		} catch(Exception $e){
			echo "Falha ao criar a tabela tbl_generos: " . $e->errorMessage();
		}
		try{
			$sql_create ="	CREATE TABLE IF NOT EXISTS tbl_clientes(
							ID_cliente SMALLINT AUTO_INCREMENT PRIMARY KEY,
							nome_cliente VARCHAR(40) NOT NULL,
							cidade_cliente VARCHAR(40) NOT NULL,
							bairro_cliente VARCHAR(40) NOT NULL,
							rua_cliente VARCHAR(40) NOT NULL,
							numero INT,
							data_nascimento DATE NOT NULL,
							data_cadastro DATE NOT NULL
							);";
			$this->query($sql_create);
		} catch(Exception $e){
			echo "Falha ao criar a tabela tbl_clientes: " . $e->errorMessage();
		}
		try{					
			$sql_create ="	CREATE TABLE IF NOT EXISTS tbl_filmes(
							ID_filme SMALLINT AUTO_INCREMENT PRIMARY KEY,
							titulo_filme VARCHAR(40) NOT NULL,
							data_lancamento DATE NOT NULL,
							preco_locacao DECIMAL(10,2) NOT NULL,
							preco_desconto DECIMAL(10,2),
							ID_protagonista SMALLINT,
							ID_genero SMALLINT,
							FOREIGN KEY(ID_protagonista) REFERENCES tbl_protagonistas(ID_protagonista),
							FOREIGN KEY(ID_genero) REFERENCES tbl_generos(ID_genero)
							);";
			$this->query($sql_create);
		} catch(Exception $e){
			echo "Falha ao criar a tabela tbl_filmes: " . $e->errorMessage();
		}
		try{				
			$sql_create ="	CREATE TABLE IF NOT EXISTS tbl_locacao(
							ID_locacao SMALLINT AUTO_INCREMENT PRIMARY KEY,
							codigo_filme SMALLINT,
							codigo_cliente SMALLINT,
							data_locacao DATE,
							FOREIGN KEY (codigo_filme) REFERENCES tbl_filmes(ID_filme),
							FOREIGN KEY (codigo_cliente) REFERENCES tbl_clientes(ID_cliente)
							);";
			$this->query($sql_create);
		} catch(Exception $e){
			echo "Falha ao criar a tabela tbl_locacao: " . $e->errorMessage();
		}
	}
}