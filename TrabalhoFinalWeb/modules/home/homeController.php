<?php
require_once 'database/model/ProdutoDto.php';
require_once 'database/model/TipoProdutoDto.php';


class homeController{
    private $view;
    private $params;
    private $filter;

    function __construct() {
        $this->view = 'homeView.phtml';
        $this->filter['fl_destaque'] = 'S';
        
        $produtoDto = new ProdutoDto();
        $this->params = $produtoDto->select($this->filter);
        
        $this->display();
    }
    
    function display(){
        require_once $this->view;
    }
}