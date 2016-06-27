<?php
    require_once ('modules/produtos/produtosController.php');
//            require_once ('modules/cadastro/cadastroController.php');
//            require_once ('modules/carrinho/carrinhoController.php');
//            require_once ('modules/faleConosco/faleConoscoController.php');
    require_once ('modules/home/homeController.php');
    require_once ('modules/login/loginController.php');
    require_once ('Session.php');
    
    $dados = Session::getInstance();
    $dados->user = 0;
?>
<!DOCTYPE html5>
<html>
<head>
<title>Trabalho Final de programa&ccedil;&atilde;o Web</title>
<meta charset="UTF-8">
<meta name="description" content="Site de venda de motocicletas">
<meta name="author" content="Lauro Pereira">
<link href="css/style.css" rel="stylesheet">
<link
	href="http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext"
	rel='stylesheet' type='text/css'>
</head>
<body>
    <div onclick="darkerHide();" id="darker" class="darker_disabled"></div>
    <div id="barraSup">
        <?php 
            $log = new loginController();
        ?>
    </div>
    <div id="corpo">
        <div id="logo">
            <img alt="logotipo" src="img/logo_default.png" >
            <ul id="menuTopo">
                <li id="home"><a href="index.php?pg=1">Home</a></li>
                <li id="produtos"><a href="index.php?pg=2">Produtos</a></li>
                <li id="cadastro"><a href="index.php?pg=3">Cadastro</a></li>
                <li id="contato"><a href="index.php?pg=4">Fale conosco</a></li>
            </ul>
        </div>
        <hr >
        <div id="meio">
            <div id="carrinho">
                <a  onclick="window.open('meu_carrinho.html');window.close()" href="#">
                    <img alt="carrinho de compras" src="img/carrinho_grande.png" >
                </a>
                <pre>Carrinho</pre>
            </div>
            <div id="busca">
                <label>Buscar conte&uacute;do: </label> 
                <input type="text" name="busca" id="nmProduto">
                <button id="btProduto">
                    <img alt="botao de consulta" src="img/lupa.png" >
                </button>
            </div>
        </div>
    </div>
    <div id="conteudo">
        <?php
            $modulo = NULL;
            $page = filter_input ( INPUT_GET, 'pg' );

            if (!$page || is_null($page)) {
                $page = 1;
            }

            switch ($page) {
                case 1 :
                    $modulo = new homeController();
                    $modulo->display();
                    break;
                case 2 :                        
                    $modulo = new produtosController();
                    $modulo->actionFilter();
                    $modulo->display();
                    break;
                case 3 :
                    require_once ('modules/cadastro/cadastroView.phtml');
                    break;
                case 4 :
                    require_once ('modules/faleConosco/faleConoscoView.phtml');
                    break;
                default :
                    $modulo = new homeController();
                    $modulo->display();
                    break;
            }
        ?>
    </div>
    <div id="rodape">
        <div class="central">
            <a href="https://maps.google.com.br/maps?ion=1&espv=2&um=1&ie=UTF-8&q=ifrs+canoas+endere%C3%A7o&fb=1&gl=br&hq=ifrs&hnear=0x95197aa8021e5571:0xd0de460f7518f586,Canoas+-+RS&cid=11785200915308219809&sa=X&ei=Qvo-VYi4J8OIsQS5m4DQCw&ved=0CCYQrwswAA">
                Endere&ccedil;o: Rua Doutora Maria Z&eacute;lia Carneiro de
                Figueiredo, 870 A - Igara III 
                <br >Canoas - RS, CEP:92412-240
            </a>Telefone:(51) 3415-8200 <br >&copy;copyright 2015. All Rights
            Reserved 
            <img alt="logotipo" src="img/logo_default.png" >
        </div>
    </div>
</body>
<script src="js/script.js" lang="text/javascript"></script>
</html>