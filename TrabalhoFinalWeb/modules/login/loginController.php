<?php
require_once 'database/model/UsuarioDto.php';
require_once 'database/model/PerfilUsuarioDto.php';
require_once ('Session.php');

class loginController{
    private $view;
    private $params;
    private $filter;

    function __construct() {
        $usuarioDto = new UsuarioDto();
        $dados = Session::getInstance();
        $Usuario = new Usuario();
        
        $this->filter['login'] = filter_input( INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS);
        $this->filter['senha'] = md5(filter_input( INPUT_POST, 'login'));
        
        //Valida se esta logado
        if($dados->user <= 0){
            $this->view = 'loginFormView.phtml';
            
            //Valida se usuario informou o login
            if($this->filter['login'] != NULL && !empty($this->filter['login'])){
                $Usuario = $usuarioDto->select(array("login" =>$this->filter['login']));
                
                //Valida se login existe na base
                if(count($Usuario) <= 0){
                    $this->params["msg"] ="Login não cadastrado.";
                }else{
                    if($Usuario->getSenha() != $this->filter["senha"]){
                        $this->params["msg"] ="Senha incorreta.";
                    }else{
                        $dados->user = $Usuario->getId();
                    }
                }
            }
        }else{
            $Usuario = $usuarioDto->find($dados->user);
            $this->view = 'loginView.phtml';
        }
        
        $this->display();
    }
    
    function validaSessao(){
        $logged = filter_input( INPUT_SESSION, 'logged', FILTER_SANITIZE_NUMBER_INT);
        $this->params['logged'] = ($logged == 1)?true:false;
    }
    
    function display(){
        require_once $this->view;
    }
}