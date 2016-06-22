<?php
require_once 'Dto.php';
require_once 'database/Database.php';
require_once 'database/entity/TipoProduto.php'; 
                
class TipoProdutoDto implements Dto{
    
    private $con;
    
    function __construct(){
        $db = new Database();
        $this->con = $db->getCon();
    }
    
    function selectAll(){
        $resultMap = array();
        $sql = "SELECT * FROM tipo";

        $return = $this->con->query($sql);

        while($result = $return->fetch_assoc()){
            
            $tipoProduto = new TipoProduto();
            
            $tipoProduto->setId($result["id_tipo"]);
            $tipoProduto->setTipoProduto($result["ds_tipo"]);
            
            array_push($resultMap, $tipoProduto);
        }
        
        return $resultMap;
    }
    function select($map){
        /*
         * @todo implementar metodo select por campo
         */
    }
    function count(){
        /*
         * @todo implementar metodo count
         */
    }
    function find($id){
        $sql = "SELECT * FROM tipo WHERE id_tipo = ". $id;
        
        $return = $this->con->query($sql);
        
        $tipoProduto = new TipoProduto();
        $result = $return->fetch_assoc();
        
        $tipoProduto->setId($result["id_tipo"]);
        $tipoProduto->setTipoProduto($result["ds_tipo"]);
        
        return $tipoProduto;
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