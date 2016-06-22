<?php
require_once 'Dto.php';
require_once 'database/Database.php';
require_once 'database/entity/VendaItem.php'; 
require_once 'ProdutoDto.php';
require_once 'VendaDto.php';
                
class VendaItemDto implements Dto{
    
    private $con;
    
    function __construct(){
        $db = new Database();
        $this->con = $db->getCon();
    }
    
    function selectAll(){
        $resultMap = array();
        $sql = "SELECT * FROM venda_item";
        
        $return = $this->con->query($sql);
        
        while($result = $return->fetch_assoc()){
            $vendaItem = new VendaItem();
            $produtoDto = new ProdutoDto();
            $vendaDto = new VendaDto();

            $vendaItem->setId($result["id_venda_item"]);
            $vendaItem->setDataInclusao($result["dt_inclusao_item"]);
            $vendaItem->setPreco($result["preco_corrente"]);
            $vendaItem->setProduto($produtoDto->find($result["id_produto"]));
            $vendaItem->setVenda($vendaDto->find($result["id_venda"]));
            
            array_push($resultMap, $vendaItem);
        }
        
        return $resultMap;
    }
    
     private function preparaSql($array){
        $sql = "SELECT * FROM venda WHERE 1 = 1 ";
        
        if(isset($array["data_menor"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["data_menor"]))){
            $sql .= "AND dt_inclusao_item <= " . preg_replace('/[ \t\n\r\f\v]/i', '', $array["data_menor"]) . " ";
        }
        if(isset($array["data_maior"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["data_maior"]))){
            $sql .= "AND dt_inclusao_item >= " . preg_replace('/[ \t\n\r\f\v]/i', '', $array["data_maior"]) . " ";
        }
        
        if(isset($array["preco_menor"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["preco_menor"]))){
            $sql .= "AND preco_corrente <= " . preg_replace('/[ \t\n\r\f\v]/i', '', $array["data_menor"]) . " ";
        }
        if(isset($array["preco_maior"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["preco_maior"]))){
            $sql .= "AND preco_corrente >= " . preg_replace('/[ \t\n\r\f\v]/i', '', $array["data_maior"]) . " ";
        }
        
        if(isset($array["id_produto"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["id_produto"]))){
            $sql .= "AND id_produto = " . preg_replace('/[ \t\n\r\f\v]/i', '', $array["id_produto"]) . " ";
        }
        if(isset($array["id_venda"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["id_venda"]))){
            $sql .= "AND id_venda = " . preg_replace('/[ \t\n\r\f\v]/i', '', $array["id_venda"]) . " ";
        }
        
        return $sql;
    }
    
    function select($map){
        $resultMap = array();
        
        $sql = $this->preparaSql($map);
        $return = $this->con->query($sql);
        
        while($result = $return->fetch_assoc()){
            $vendaItem = new VendaItem();
            $produtoDto = new ProdutoDto();
            $vendaDto = new VendaDto();

            $vendaItem->setId($result["id_venda_item"]);
            $vendaItem->setDataInclusao($result["dt_inclusao_item"]);
            $vendaItem->setPreco($result["preco_corrente"]);
            $vendaItem->setProduto($produtoDto->find($result["id_produto"]));
            $vendaItem->setVenda($vendaDto->find($result["id_venda"]));
            
            array_push($resultMap, $vendaItem);
        }
        
        return $resultMap;
        
    }
    function count(){
        /*
         * @todo implementar metodo count
         */
    }
    function find($id){
        $sql = "SELECT * FROM venda_item WHERE id_venda_item = ". $id;
        
        $return = $this->con->query($sql);
        $result = $return->fetch_assoc();
        
        $vendaItem = new VendaItem();
        $produtoDto = new ProdutoDto();
        $vendaDto = new VendaDto();

        $vendaItem->setId($result["id_venda_item"]);
        $vendaItem->setDataInclusao($result["dt_inclusao_item"]);
        $vendaItem->setPreco($result["preco_corrente"]);
        $vendaItem->setProduto($produtoDto->find($result["id_produto"]));
        $vendaItem->setVenda($vendaDto->find($result["id_venda"]));
            
        return $vendaItem;
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