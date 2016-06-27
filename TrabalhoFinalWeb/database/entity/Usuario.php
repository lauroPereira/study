<?php

class Usuario{
	private $id;
	private $login;
	private $nomeCompleto;
        private $email;
	private $senha;
	private $PerfilUsuario;
	
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
		return $this->nomeCompleto;
	}
        
        function setEmail($email){
		$this->email = $email;
	}
	function getEmail(){
		return $this->email;
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