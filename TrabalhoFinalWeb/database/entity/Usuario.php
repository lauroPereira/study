<?php
require_once ('PerfilUsuario.php');

class Usuario{
	private $id = int;
	private $login = string;
	private $nomeCompleto = string;
	private $senha = string;
	private $PerfilUsuario = PerfilUsuario;
	
	function setId($id){
		$this->id = $id;
	}
	function getId(){
		return $this->id;
	}
	
	function setLogin($login){
		$this->login = $login;
	}
	function getLogin(){
		return $this->login;
	}
	
	function setNomeCompleto($nomeCompleto){
		$this->nomeCompleto = $nomeCompleto;
	}
	function getNomeCompleto(){
		return $this->NomeCompleto;
	}
	
	function setSenha($senha){
		$this->senha = $senha;
	}
	function getSenha(){
		return $this->senha;
	}
	
	function setPerfilUsuario($PerfilUsuario){
		$this->PerfilUsuario = $PerfilUsuario;
	}
	function getPerfilUsuario(){
		return $this->PerfilUsuario;
	}
}