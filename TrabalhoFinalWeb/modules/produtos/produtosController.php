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
    
    function actionFiltraPorTipo(){
        
        //instancia variaveis locais
        $tipoDto = new TipoProdutoDto();
        $prdDto = new ProdutoDto();

        //Captura COOKIE
        $dsTipo = filter_input ( INPUT_COOKIE, 'tp_prd', FILTER_SANITIZE_SPECIAL_CHARS );
	
        
        //Valida se existe conteudo no COOKIE
        if (!$dsTipo || $dsTipo == NULL){
            throw new Exception('Parametro não encontrado nos cookies.', 10001);
        }
        
        //Busca produtos pela descricao
        $tipos = $tipoDto->select(array("ds_tipo" => $dsTipo));

        if(count($tipos)> 1){
            throw new Exception('Mais de um tipo retornado para a mesma descricao.', 10002);
        }
        
        $produtos = $prdDto->select(array("id_tipo" => $tipos[0]->getId()));
        
        if(count($produtos) <= 0){
            throw new Exception('Não foram encontrados produtos com este filtro.', 10003);
        }
        
        return $produtos;

    }
    
    function display(){
        require_once $this->view;
    }

}