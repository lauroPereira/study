<?php

class Protagonista{
	private $id = 0;
	private $nome ='';
	
	function getId(){
		return $this->id;
	}
	
	function getNome(){
		return $this->nome;
	}
	
	function setId($id){
		$this->id = $id;
	}
	
	function setNome($nome){
		$this->nome = $nome;
	}
}