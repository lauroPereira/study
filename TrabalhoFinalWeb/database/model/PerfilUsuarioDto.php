<?php
require_once 'Dto.php';
require_once 'database/Database.php';
require_once 'database/entity/PerfilUsuario.php'; 
                
class PerfilUsuarioDto implements Dto{
    
    private $con;
    
    function __construct(){
        $db = new Database();
        $this->con = $db->getCon();
    }
    
    function selectAll(){
        $resultMap = array();
        $return = $this->con->query("SELECT * FROM perfil");
        
        while($result = $return->fetch_assoc()){
            $perfil = new PerfilUsuario();
            
            $perfil->setId($result["id_perfil"]);
            $perfil->setPerfil($result["ds_perfil"]);
            
            array_push($result, $perfil);
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
        
        $sql = "SELECT * FROM perfil WHERE id_perfil = ". $id;
        
        $return = $this->con->query($sql);
        
        $result = $return->fetch_assoc();
        
        $perfil = new PerfilUsuario();
            
        $perfil->setId($result["id_perfil"]);
        $perfil->setPerfil($result["ds_perfil"]);
            
        return $perfil;
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