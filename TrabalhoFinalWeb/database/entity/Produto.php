<?php
class Produto{
	private $id;
	private $dsProduto;
        private $preco;
        private $flDestaque;
        private $linkImage;
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
        
        function setFlDestaque($flDestaque){
		$this->flDestaque = $flDestaque;
	}
	function getFlDestaque(){
		return $this->flDestaque;
	}
        
        function setLinkImage($linkImage){
		$this->linkImage = $linkImage;
	}
	function getLinkImage(){
		return $this->linkImage;
	}
        
	function setTipoProduto($TipoProduto){
		$this->TipoProduto = $TipoProduto;
	}
	function getTipoProduto(){
		return $this->TipoProduto;
	}
}