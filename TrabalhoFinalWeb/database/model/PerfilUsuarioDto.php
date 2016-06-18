<?php
class PerfilUsuarioDto implements Model{
	private $id = int;
	private $perfil = string;
	
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