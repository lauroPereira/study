<?php

class VendaItem{
	private $id;
	private $dataInclusao;
        private $preco;
        private $Venda;
	private $Produto;
	
	function setId($id){
		$this->id = $id;
	}
	function getId(){
		return $this->id;
	}
	
	function setDataInclusao($data){
		$this->dataInclusao = $data;
	}
	function getDataInclusao(){
		return $this->dataInclusao;
	}
	
        function setPreco($preco){
		$this->preco = $preco;
	}
	function getPreco(){
		return $this->preco;
	}
        
	function setVenda($Venda){
		$this->Venda = $Venda;
	}
	function getVenda(){
		return $this->Venda;
	}
        
        function setProduto($Produto){
		$this->Produto = $Produto;
	}
	function getProduto(){
		return $this->Produto;
	}
}