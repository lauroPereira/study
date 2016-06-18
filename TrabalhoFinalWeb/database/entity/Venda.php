<?php
require_once ('Usuario.php');
require_once ('Produto.php');
class Venda{
	private $id = int;
	private $preco = double;
	private $data = string;
	private $Usuario = Usuario;
	private $Produtos = array(Produto);
	
	function setId($id){
		$this->id = $id;
	}
	function getId(){
		return $this->id;
	}
	
	function setPreco($preco){
		$this->preco = $preco;
	}
	function getPreco(){
		return $this->preco;
	}
	
	function setData($data){
		$this->data = $data;
	}
	function getData(){
		return $this->data;
	}
	
	function setUsuario($Usuario){
		$this->Usuario = $Usuario;
	}
	function getUsuario(){
		return $this->Usuario;
	}
	
	function setProdutos($produtos){
		$this->Produtos = $produtos;
	}
	function getProdutos(){
		return $this->Produtos;
	}
}