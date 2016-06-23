<!DOCTYPE html>
<html>
<head>
<title>Trabalho Final de programa&ccedil;&atilde;o Web</title>
<meta charset="UTF-8">
<meta name="description" content="Site da empresa imobiliaria">
<meta name="author" content="Lauro Pereira">
<link href="css/style.css" rel="stylesheet">
<link
	href="http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext"
	rel='stylesheet' type='text/css'>
</head>
<body>
	<div id="darker"></div>
	<div id="barraSup">
		<form method="GET" action="" id="formLogin">
			<label>Login: </label><input type="text" name="login" /> <label>Senha:
			</label><input type="password" name="senha" /> <input type="submit"
				value="Acessar" />
		</form>
	</div>
	<div id="corpo">
		<div id="logo">
			<img alt="logotipo" src="img/logo_default.png" />
			<ul id="menuTopo">
				<li id="home"><a href="index.php?pg=1">Home</a></li>
				<li id="produtos"><a href="index.php?pg=2">Produtos</a></li>
				<li id="cadastro"><a href="index.php?pg=3">Cadastro</a></li>
				<li id="contato"><a href="index.php?pg=4">Fale conosco</a></li>
			</ul>
		</div>
		<hr />
		<div id="meio">
			<div id="carrinho">
				<a onclick="window.open('meu_carrinho.html');window.close()"
					href="#"><img alt="carrinho de compras"
					src="img/carrinho_grande.png" /></a>
				<pre>Carrinho</pre>
			</div>
			<div id="busca">
				<label>Buscar conte&uacute;do: </label> <input type="text"
					name="busca" />
				<button id="btnProc">
					<img alt="botao de consulta" src="img/lupa.png" />
				</button>
			</div>
		</div>
	</div>
        <?php
            require_once ('modules/produtos/produtosController.php');
//            require_once ('modules/cadastro/cadastroController.php');
//            require_once ('modules/carrinho/carrinhoController.php');
//            require_once ('modules/faleConosco/faleConoscoController.php');
//            require_once ('modules/home/homeController.php');
//            require_once ('modules/login/loginController.php');
        ?>
	<div id="conteudo">
		<?php
		$page = filter_input ( INPUT_GET, 'pg' );
		$page = (is_null ( $page )) ? false : $page;
		if (!$page)
			$page = 1;
		switch ($page) {
			case 1 :
                                unset($modulo);
				require_once ('modules/home/homeView.phtml');
				break;
			case 2 :
				//require_once ('modules/produtos/produtosView.phtml');
                                $modulo = new produtosController();
				break;
			case 3 :
				require_once ('modules/cadastro/cadastroView.phtml');
				break;
			case 4 :
				require_once ('modules/faleConosco/faleConoscoView.phtml');
				break;
			default :
				require_once ('modules/home/homeController.php');
				break;
		}
		?>
	</div>
	<div id="rodape">
		<div class="central">
			<a
				href="https://maps.google.com.br/maps?ion=1&espv=2&um=1&ie=UTF-8&q=ifrs+canoas+endere%C3%A7o&fb=1&gl=br&hq=ifrs&hnear=0x95197aa8021e5571:0xd0de460f7518f586,Canoas+-+RS&cid=11785200915308219809&sa=X&ei=Qvo-VYi4J8OIsQS5m4DQCw&ved=0CCYQrwswAA">
				Endere&ccedil;o: Rua Doutora Maria Z&eacute;lia Carneiro de
				Figueiredo, 870 A - Igara III <br />Canoas - RS, CEP:92412-240
			</a> Telefone:(51) 3415-8200 <br />&copy;copyright 2015. All Rights
			Reserved <img alt="logotipo" src="img/logo_default.png" />
		</div>
	</div>
</body>
<script src="js/script.js" lang'="text/javascript"></script>
</html>