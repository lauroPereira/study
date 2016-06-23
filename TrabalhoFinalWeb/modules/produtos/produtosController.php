<?php
require_once 'database/model/ProdutoDto.php';
require_once 'database/model/TipoProdutoDto.php';

class produtosController{

    private $view;
    public $params;

    function __construct() {
        $this->params = array();
        $this->view = 'produtosView.phtml';
        
        $this->params["produtos"] = array();
        $produtoDto = new ProdutoDto();
        $this->params["produtos"] = $produtoDto->selectAll();
        
        $this->params["tipos"] = array();
        $tipoDto = new TipoProdutoDto();
        $this->params["tipos"] = $tipoDto->selectAll();
    }
    
    function display(){
        require_once $this->view;
    }

}