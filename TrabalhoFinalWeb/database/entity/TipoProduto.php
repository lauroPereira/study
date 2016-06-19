<?php
class TipoProduto{
	private $id;
	private $tipoProduto;
	
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