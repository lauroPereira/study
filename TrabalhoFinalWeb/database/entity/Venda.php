<?php

class Venda{
	private $id;
	private $dataConclusao;
	private $Usuario;
	
	function setId($id){
		$this->id = $id;
	}
	function getId(){
		return $this->id;
	}
	
	function setDataConclusao($dataConclusao){
		$this->dataConclusao = $dataConclusao;
	}
	function getDataConclusao(){
		return $this->dataConclusao;
	}
	
	function setUsuario($Usuario){
		$this->Usuario = $Usuario;
	}
	function getUsuario(){
		return $this->Usuario;
	}
}