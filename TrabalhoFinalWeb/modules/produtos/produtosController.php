<?php
require_once 'database/model/ProdutoDto.php';
require_once 'database/model/TipoProdutoDto.php';

class produtosController{

    private $view;
    private $params;
    private $filter;

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
    
    function preparaFilter(){
        //limpa filtro
        $this->filter = array();
        
        //Captura COOKIES
        $idTipo = filter_input( INPUT_COOKIE, 'tp_prd', FILTER_SANITIZE_SPECIAL_CHARS);
        $dsPrd  = filter_input( INPUT_COOKIE, 'ds_prd', FILTER_SANITIZE_SPECIAL_CHARS);

        //Valida se existe conteudo no COOKIE
        if (!(!$idTipo || $idTipo == NULL)){
            $this->filter["id_tipo"] = $idTipo;
        }
        
        if (!(!$dsPrd|| $dsPrd == NULL)){
            $this->filter["ds_produto"] = $dsPrd;
        }
        
        //echo var_dump($this->filter);
        
    }
    
    function actionFilter(){
        $this->preparaFilter();
        //instancia variaveis locais
        $prdDto = new ProdutoDto();

        $this->params["produtos"] = $prdDto->select($this->filter);
        
    }
    
    function display(){
        require_once $this->view;
    }
    
   function __destruct() {
        setcookie("cookie[tp_prd]", "");
        setcookie("cookie[tp_prd]", "");
   }

}