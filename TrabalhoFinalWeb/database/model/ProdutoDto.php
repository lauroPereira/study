<?php
require_once 'Dto.php';
require_once 'database/Database.php';
require_once 'database/entity/Produto.php'; 
require_once 'TipoProdutoDto.php';
                
class ProdutoDto implements Dto{
    
    private $con;
    
    function __construct(){
        $db = new Database();
        $this->con = $db->getCon();
    }
    
    function selectAll(){
        $resultMap = array();
        $sql = "SELECT * FROM produto";
        
        $return = $this->con->query($sql);
        
        while($result = $return->fetch_assoc()){
            $produto = new Produto();
            $tipoDto = new TipoProdutoDto();
            
            $produto->setId($result["id_produto"]);
            $produto->setDsProduto($result["ds_produto"]);
            $produto->setPreco($result["preco"]);
            $produto->setLinkImage($result["link_image"]);
            $produto->setFlDestaque($result["fl_destaque"]);
            $produto->setTipoProduto($tipoDto->find($result["id_tipo"]));
            
            array_push($resultMap, $produto);
        }
        
        return $resultMap;
    }
    
    private function preparaSql($array){
        $sql = "SELECT * FROM produto WHERE 1 = 1 ";
        
        if(isset($array["ds_produto"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["ds_produto"]))){
            $sql .= "AND ds_produto like '%" . preg_replace('/[ \t\n\r\f\v]/i', '', $array["ds_produto"]) . "%' ";
        }
        
        if(isset($array["fl_destaque"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["fl_destaque"]))){
            $sql .= "AND fl_destaque like '%" . preg_replace('/[ \t\n\r\f\v]/i', '', $array["fl_destaque"]) . "%' ";
        }
        if(isset($array["preco_menor"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["preco_menor"]))){
            $sql .= "AND preco <= " . preg_replace('/[ \t\n\r\f\v]/i', '', $array["preco_menor"]) . " ";
        }
        if(isset($array["preco_maior"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["preco_maior"]))){
            $sql .= "AND preco >= " . preg_replace('/[ \t\n\r\f\v]/i', '', $array["preco_maior"]) . " ";
        }
        if(isset($array["id_tipo"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["id_tipo"]))){
            $sql .= "AND id_tipo = " . preg_replace('/[ \t\n\r\f\v]/i', '', $array["id_tipo"]) . " ";
        }
        
        return $sql;
    }
    
    function select($map){
        $resultMap = array();
        
        $sql = $this->preparaSql($map);
        $return = $this->con->query($sql);
        
        while($result = $return->fetch_assoc()){
            $produto = new Produto();
            $tipoDto = new TipoProdutoDto();
            
            $produto->setId($result["id_produto"]);
            $produto->setDsProduto($result["ds_produto"]);
            $produto->setPreco($result["preco"]);
            $produto->setLinkImage($result["link_image"]);
            $produto->setFlDestaque($result["fl_destaque"]);
            $produto->setTipoProduto($tipoDto->find($result["id_tipo"]));
            
            array_push($resultMap, $produto);
        }
        
        return $resultMap;
        
    }
    function count(){
        /*
         * @todo implementar metodo count
         */
    }
    function find($id){
        $sql = "SELECT * FROM produto WHERE id_produto = ". $id;
        
        $return = $this->con->query($sql);
        $result = $return->fetch_assoc();
        
        $produto = new Produto();
        $tipoDto = new TipoProdutoDto();
            
        $produto->setId($result["id_produto"]);
        $produto->setDsProduto($result["ds_produto"]);
        $produto->setPreco($result["preco"]);
        $produto->setLinkImage($result["link_image"]);
        $produto->setFlDestaque($result["fl_destaque"]);
        $produto->setTipoProduto($tipoDto->find($result["id_tipo"]));
            
        return $produto;
    }
    function update(){
        /*
         * @todo implementar metodo atualizar perfil
         */
    }
    function delete(){
        /*
         * @todo implementar metodo excluir perfil
         */
    }
    function insert(){
        /*
         * @todo implementar metodo criar novo perfil
         */
    }
}