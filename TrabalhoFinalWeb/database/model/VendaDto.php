<?php
require_once 'Dto.php';
require_once 'database/Database.php';
require_once 'database/entity/Venda.php'; 
require_once 'UsuarioDto.php';
                
class VendaDto implements Dto{
    
    private $con;
    
    function __construct(){
        $db = new Database();
        $this->con = $db->getCon();
    }
    
    function selectAll(){
        $resultMap = array();
        $sql = "SELECT * FROM venda";
        
        $return = $this->con->query($sql);
        
        while($result = $return->fetch_assoc()){
            $venda = new Venda();
            $usuarioDto = new UsuarioDto();

            $venda->setId($result["id_venda"]);
            $venda->setDataConclusao($result["dt_conclusao_venda"]);
            $venda->setUsuario($usuarioDto->find($result["id_usuario"]));
            
            array_push($resultMap, $venda);
        }
        
        return $resultMap;
    }
    
     private function preparaSql($array){
        $sql = "SELECT * FROM venda WHERE 1 = 1 ";
        
        if(isset($array["data_menor"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["data_menor"]))){
            $sql .= "AND dt_conclusao_venda <= " . preg_replace('/[ \t\n\r\f\v]/i', '', $array["data_menor"]) . " ";
        }
        if(isset($array["data_maior"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["data_maior"]))){
            $sql .= "AND dt_conclusao_venda >= " . preg_replace('/[ \t\n\r\f\v]/i', '', $array["data_maior"]) . " ";
        }
        if(isset($array["id_usuario"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["id_usuario"]))){
            $sql .= "AND id_usuario = " . preg_replace('/[ \t\n\r\f\v]/i', '', $array["id_usuario"]) . " ";
        }
        
        return $sql;
    }
    
    function select($map){
        $resultMap = array();
        
        $sql = $this->preparaSql($map);
        $return = $this->con->query($sql);
        
        while($result = $return->fetch_assoc()){
            $venda = new Venda();
            $usuarioDto = new UsuarioDto();

            $venda->setId($result["id_venda"]);
            $venda->setDataConclusao($result["dt_conclusao_venda"]);
            $venda->setUsuario($usuarioDto->find($result["id_usuario"]));
            
            array_push($resultMap, $venda);
        }
        
        return $resultMap;
        
    }
    function count(){
        /*
         * @todo implementar metodo count
         */
    }
    function find($id){
        $sql = "SELECT * FROM venda WHERE id_venda = ". $id;
        
        $return = $this->con->query($sql);
        $result = $return->fetch_assoc();
        
        $venda = new Venda();
        $usuarioDto = new UsuarioDto();
            
        $venda->setId($result["id_venda"]);
        $venda->setDataConclusao($result["dt_conclusao_venda"]);
        $venda->setUsuario($usuarioDto->find($result["id_usuario"]));
            
        return $venda;
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