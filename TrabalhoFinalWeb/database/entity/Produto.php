<?php
require_once ('TipoProduto.php');
class Produto{
	private $id;
	private $dsProduto;
        private $preco;
	private $TipoProduto;
	
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

	function setPreco($preco){
		$this->preco = $preco;
	}
	function getPreco(){
		return $this->preco;
	}
        
	function setTipoProduto($TipoProduto){
		$this->TipoProduto = $TipoProduto;
	}
	function getTipoProduto(){
		return $this->TipoProduto;
	}
}