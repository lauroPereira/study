<?php

class Genero{
	private $id = 0;
	private $genero ='' ;
	
	function getId(){
		return $this->id;
	}
	function getGenero(){
		return $this->genero;
	}
	function setId($id){
		$this->id = $id;
	}
	function setGenero($genero){
		$this->genero = $genero;
	}
}