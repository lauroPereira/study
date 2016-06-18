<?php
require_once ('PerfilUsuario.php');

class Usuario{
	private $id = int;
	private $login = string;
	private $nomeCompleto = string;
	private $senha = string;
	private $PerfilUsuario = new PerfilUsuario();
	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	
	public function setLogin($login){
		$this->login = $login;
	}
	public function getLogin(){
		return $this->login;
	}
	
	public function setNomeCompleto($nomeCompleto){
		$this->nomeCompleto = $nomeCompleto;
	}
	public function getNomeCompleto(){
		return $this->NomeCompleto;
	}
	
	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function getSenha(){
		return $this->senha;
	}
	
	public function setPerfilUsuario($PerfilUsuario){
		$this->PerfilUsuario = $PerfilUsuario;
	}
	public function getPerfilUsuario(){
		return $this->PerfilUsuario;
	}
}