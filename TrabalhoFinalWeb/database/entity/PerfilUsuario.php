<?php
class PerfilUsuario{
	private $id;
	private $perfil;
	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	
	public function setPerfil($perfil){
		$this->perfil = $perfil;
	}
	public function getPerfil(){
		return $this->perfil;
	}
}