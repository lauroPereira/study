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
        $result = array();
        $return = $this->con->query("SELECT * FROM produto");
        
        for($i=0;$i<$return->num_rows;$i++){
            $produto = new Produto();
            $tipoDto = new TipoProdutoDto();
            
            $produto->setId($return->fetch_array()["id_produto"]);
            $produto->setDsProduto($return->fetch_array()["ds_produto"]);
            $produto->setPreco($return->fetch_array()["preco"]);
            $produto->setTipoProduto($tipoDto->find($return->fetch_array()["id_tipo"]));
            
            array_push($result, array(
                $produto
            ));
        }
        
        return $result;
    }
    
    private function preparaSql($array){
        $sql = "SELECT * FROM produto WHERE 1 = 1 ";
        
        if(isset($array["ds_produto"]) && !empty(preg_replace('/[^a-z0-9]/i', '', $array["ds_produto"]))){
            $sql .= "AND ds_produto like '%" . preg_replace('/[^a-z0-9]/i', '', $array["ds_produto"]) . "%' ";
        }
        if(isset($array["preco_menor"]) && !empty(preg_replace('/[^0-9]/i', '', $array["preco_menor"]))){
            $sql .= "AND preco <= " . preg_replace('/[^0-9]/i', '', $array["preco_menor"]) . " ";
        }
        if(isset($array["preco_maior"]) && !empty(preg_replace('/[^0-9]/i', '', $array["preco_maior"]))){
            $sql .= "AND preco >= " . preg_replace('/[^0-9]/i', '', $array["preco_maior"]) . " ";
        }
        if(isset($array["id_tipo"]) && !empty(preg_replace('/[^0-9]/i', '', $array["id_tipo"]))){
            $sql .= "AND id_tipo = " . preg_replace('/[^0-9]/i', '', $array["id_tipo"]) . " ";
        }
        
        return $sql;
    }
    
    function select($map){
        $result = array();
        
        $sql = $this->preparaSql($map);
        $return = $this->con->query($sql);
        
        while ($row = mysqli_fetch_assoc($return)) {
            $produto = new Produto();
            $tipoDto = new TipoProdutoDto();
            $tipo = new TipoProduto();
            
            $produto->setId($row["id_produto"]);
            $produto->setDsProduto($row["ds_produto"]);
            $produto->setPreco($row["preco"]);
            //$tipoDto->find($row["id_tipo"])
            $tipo = $tipoDto->find($row["id_tipo"]);
            $produto->setTipoProduto($tipo);
            
            array_push($result, array(
                $produto
            ));
        }
        
        for($i=0;$i<$return->num_rows;$i++){
            
        }
        
        return $result;
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