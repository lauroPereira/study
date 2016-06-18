<?php
class TipoProduto{
	private $id = int;
	private $tipoProduto = string;
	
	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}
	
	public function setTipoProduto($tipoProduto){
		$this->tipoProduto = $tipoProduto;
	}
	public function getTipoProduto(){
		return $this->tipoProduto;
	}
}