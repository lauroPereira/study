<?php
class PerfilUsuario{
	private $id = int;
	private $perfil = string;
	
	function setId($id){
		$this->id = $id;
	}
	function getId(){
		return $this->id;
	}
	
	function setPerfil($perfil){
		$this->perfil = $perfil;
	}
	function getPerfil(){
		return $this->perfil;
	}
}