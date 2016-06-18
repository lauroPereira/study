<?php
require_once 'Dto.php';
require_once 'database/Database.php';
require_once 'database/entity/PerfilUsuario.php'; 
                
class PerfilUsuarioDto implements Dto{
    
    private $con = mysqli;
    
    function __construct(){
        $db = new Database();
        $this->con = $db->getCon();
    }
    
    function selectAll(){
        $result = array();
        $return = $this->con->query("SELECT * FROM perfil");
        
        for($i=0;$i<$return->num_rows;$i++){
            $perfil = new PerfilUsuario();
            
            $perfil->setId($return->fetch_array()["id_perfil"]);
            $perfil->setPerfil($return->fetch_array()["ds_perfil"]);
            
            array_push($result, array(
                $perfil
            ));
        }
        
        return $result;
    }
    function select(){
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
        $return = $this->con->query("SELECT * FROM perfil WHERE id = ". $id);
        
        $perfil = new PerfilUsuario();
            
        $perfil->setId($return->fetch_array()["id_perfil"]);
        $perfil->setPerfil($return->fetch_array()["ds_perfil"]);
            
        return $perfil;
    }
    function update(){}
    function delete(){}
    function insert(){}
}