<?php
class TipoProduto{
	private $id = int;
	private $tipoProduto = string;
	
	function setId($id){
		$this->id = $id;
	}
	function getId(){
		return $this->id;
	}
	
	function setTipoProduto($tipoProduto){
		$this->tipoProduto = $tipoProduto;
	}
	function getTipoProduto(){
		return $this->tipoProduto;
	}
}