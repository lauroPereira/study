<?php
require_once ('TipoProduto.php');

class Produto{
	private $id = int;
	private $dsProduto = string;
	private $TipoProduto = new TipoProduto();
	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	
	public function setDsProduto($dsProduto){
		$this->dsProduto = $dsProduto;
	}
	public function getDsProduto(){
		return $this->dsProduto;
	}
	
	public function setTipoProduto($TipoProduto){
		$this->TipoProduto = $TipoProduto;
	}
	public function getTipoProduto(){
		return $this->TipoProduto;
	}
}