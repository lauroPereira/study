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
        $result = array();
        $return = $this->con->query("SELECT * FROM tipo");
        
        for($i=0;$i<$return->num_rows;$i++){
            $tipoProduto = new TipoProduto();
            
            $tipoProduto->setId($return->fetch_array()["id_tipo"]);
            $tipoProduto->setTipoProduto($return->fetch_array()["ds_tipo"]);
            
            array_push($result, array(
                $tipoProduto
            ));
        }
        
        return $result;
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
            
        $tipoProduto->setId($return->fetch_array()["id_tipo"]);
        $tipoProduto->setTipoProduto($return->fetch_array()["ds_tipo"]);
        echo 'teste ' . var_dump($sql) . '<br/>';    
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