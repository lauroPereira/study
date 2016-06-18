<?php
require_once ('TipoProduto.php');
class Produto{
	private $id = int;
	private $dsProduto = string;
	private $TipoProduto = TipoProduto;
	
	function setId($id){
		$this->id = $id;
	}
	function getId(){
		return $this->id;
	}
	
	function setDsProduto($dsProduto){
		$this->dsProduto = $dsProduto;
	}
	function getDsProduto(){
		return $this->dsProduto;
	}
	
	function setTipoProduto($TipoProduto){
		$this->TipoProduto = $TipoProduto;
	}
	function getTipoProduto(){
		return $this->TipoProduto;
	}
}