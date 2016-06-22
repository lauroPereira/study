<?php
require_once 'Dto.php';
require_once 'database/Database.php';
require_once 'database/entity/Usuario.php'; 
require_once 'PerfilUsuarioDto.php';
                
class UsuarioDto implements Dto{
    
    private $con;
    
    function __construct(){
        $db = new Database();
        $this->con = $db->getCon();
    }
    
    function selectAll(){
        $resultMap = array();
        $sql = "SELECT * FROM usuario";
        
        $return = $this->con->query($sql);
        
        while($result = $return->fetch_assoc()){
            $usuario = new Usuario();
            $perfilDto = new PerfilUsuarioDto();

            $usuario->setId($result["id_usuario"]);
            $usuario->setLogin($result["login"]);
            $usuario->setNomeCompleto($result["nome_completo"]);
            $usuario->setPerfilUsuario($perfilDto->find($result["id_perfil"]));
            $usuario->setSenha($result["senha"]);

            array_push($resultMap, $usuario);
        }
        
        return $resultMap;
    }
    
    private function preparaSql($array){
        $sql = "SELECT * FROM usuario WHERE 1 = 1 ";
        
        if(isset($array["login"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["login"]))){
            $sql .= "AND login like '%" . preg_replace('/[ \t\n\r\f\v]/i', '', $array["login"]) . "%' ";
        }
        if(isset($array["nome_completo"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["nome_completo"]))){
            $sql .= "AND nome_completo like '%" . preg_replace('/[ \t\n\r\f\v]/i', '', $array["nome_completo"]) . "%' ";
        }
        if(isset($array["senha"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["senha"]))){
            $sql .= "AND senha = " . preg_replace('/[ \t\n\r\f\v]/i', '', $array["senha"]) . " ";
        }
        if(isset($array["id_perfil"]) && !empty(preg_replace('/[ \t\n\r\f\v]/i', '', $array["id_perfil"]))){
            $sql .= "AND id_perfil = " . preg_replace('/[ \t\n\r\f\v]/i', '', $array["id_perfil"]) . " ";
        }
        
        return $sql;
    }
    
    function select($map){
        $resultMap = array();
        
        $sql = $this->preparaSql($map);
        $return = $this->con->query($sql);
        
        while($result = $return->fetch_assoc()){
            $usuario = new Usuario();
            $perfilDto = new PerfilUsuarioDto();

            $usuario->setId($result["id_usuario"]);
            $usuario->setLogin($result["login"]);
            $usuario->setNomeCompleto($result["nome_completo"]);
            $usuario->setPerfilUsuario($perfilDto->find($result["id_perfil"]));
            $usuario->setSenha($result["senha"]);

            array_push($resultMap, $usuario);
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