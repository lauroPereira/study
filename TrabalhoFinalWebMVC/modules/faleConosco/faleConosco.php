<!DOCTYPE html>
<html>
    <head>
    <title>Trabalho 1 de programação Web</title>
    <meta charset="UTF-8">
    <meta name="description" content="Site da empresa imobiliaria">
    <meta name="author" content="Lauro Pereira">
    <link href="style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>
    <div id="barraSup">
        <form method="GET" action="" id="formLogin">
            <label>Login: </label><input type="text" name="login" />
            <label>Senha: </label><input type="password" name="senha" />
            <input type="submit" value="Acessar" />
        </form>
    </div>    
    <div id="corpo" >
        <div id="logo" >
            <img alt="logotipo" src="img/logo_default.png" />
            <ul id="menuTopo">
                <li><a href="#barraSup">Home</a></li>
                <li><a href="#destaques">Produtos</a></li>
                <li><a href="#cadastro">Cadastro</a></li>
                <li><a href="#contato">Fale conosco</a></li>
            </ul>
        </div>
        <hr />
        <div id="meio">
            <div id="carrinho">
                <a onclick="window.open('meu_carrinho.html');window.close()" href="#"><img alt="carrinho de compras" src="img/carrinho_grande.png" /></a>
                <pre>Carrinho</pre>
            </div>
            <div id="busca">
                <label>Buscar conte&uacute;do: </label>
                <input type="text" name="busca" /><button id="btnProc"><img alt="botao de consulta" src="img/lupa.png" /></button>
            </div>
        </div>
        <div id="destaques" class="central">
            <h2>Destaques</h2>
            <div id="tipoProd">
                <label>Tipo: </label>
                <select name="tipoProduto" >
                    <option value="0" selected >Selecione</option>
                    <option value="2" >Pares</option>
                    <option value="1" >Impares</option>
                </select>
            </div>
            <a href="#"><div onclick="window.open('produto1.html');window.close()" id="produto1" class="produto comFundo"><img alt="adiciona produto" src="img/carrinho_peq.png" class="add"/><img alt="produto1" src="img/produto_default.png" /><pre>Produto 1</pre></div></a>
            <a href="#"><div onclick="window.open('produto2.html');window.close()" id="produto2" class="produto comFundo"><img alt="adiciona produto" src="img/carrinho_peq.png" class="add"/><img alt="produto2" src="img/produto_default.png" /><pre>Produto 2</pre></div></a>
            <div id="produto3" class="produto comFundo"><img alt="adiciona produto" src="img/carrinho_peq.png" class="add"/><img alt="produto3" src="img/produto_default.png" /><pre>Produto 3</pre></div>
            <div id="produto4" class="produto comFundo"><img alt="adiciona produto" src="img/carrinho_peq.png" class="add"/><img alt="produto4" src="img/produto_default.png" /><pre>Produto 4</pre></div>
            <br />
            <div id="produto5" class="produto comFundo"><img alt="adiciona produto" src="img/carrinho_peq.png" class="add"/><img alt="produto5" src="img/produto_default.png" /><pre>Produto 5</pre></div>
            <div id="produto6" class="produto comFundo"><img alt="adiciona produto" src="img/carrinho_peq.png" class="add"/><img alt="produto6" src="img/produto_default.png" /><pre>Produto 6</pre></div>
            <div id="produto7" class="produto comFundo"><img alt="adiciona produto" src="img/carrinho_peq.png" class="add"/><img alt="produto7" src="img/produto_default.png" /><pre>Produto 7</pre></div>
            <div id="produto8" class="produto comFundo"><img alt="adiciona produto" src="img/carrinho_peq.png" class="add"/><img alt="produto8" src="img/produto_default.png" /><pre>Produto 8</pre></div>
        </div>
        <div class="central">
            <h2 id="cadastro">Cadastro</h2>
            <div class="comFundo formulario">
                <form method="GET" action="_top">
                    <div>
                        <label>Nome: </label><br/>
                        <label>Sobrenome: </label><br/>
                        <label>e-mail: </label><br/>
                        <label>senha: </label><br/>
                        <label>Confirme a senha: </label><br/>
                    </div>
                    <div>
                        <input type="text" name="nome" /><br/>
                        <input type="text" name="sobrenome" /><br/>
                        <input type="email" name="email" /><br/>
                        <input type="password" name="senha" /><br/>
                        <input type="password" name="senhaConf" /><br/>
                        <input type="submit" value="enviar" />
                        <input type="reset" value="limpar" />
                    </div>
                </form>
            </div>
        </div>
        <div class="central">
            <h2 id="contato">Contato</h2>
            <div class="comFundo formulario">
                <form method="GET" action="_top" id="formCadastro">
                    <div id="labelsForm">
                        <label>Nome: </label><br/>
                        <label>Sobrenome: </label><br/>
                        <label>e-mail: </label><br/>
                        <label>Telefone: </label><br/>
                        <label>Celular: </label><br/>
                        <label>Assunto: </label><br/>
                        <label>Texto: </label><br/>
                    </div>
                    <div id="inputForm">
                        <input type="text" name="nome" /><br/>
                        <input type="text" name="sobrenome" /><br/>
                        <input type="email" name="email" /><br/>
                        <input type="tel" name="telRes" /><br/>
                        <input type="tel" name="telCel" /><br/>
                        <input type="text" name="assunto" /><br/>
                    </div>
                    <textarea name="texto" cols="35" rows="5">
                    </textarea><br />
                        <input type="submit" value="enviar" />
                        <input type="reset" value="limpar" />
                </form>
            </div>
        </div>
    </div>
    <div id="rodape">
        <div class="central">
            <a href="https://maps.google.com.br/maps?ion=1&espv=2&um=1&ie=UTF-8&q=ifrs+canoas+endere%C3%A7o&fb=1&gl=br&hq=ifrs&hnear=0x95197aa8021e5571:0xd0de460f7518f586,Canoas+-+RS&cid=11785200915308219809&sa=X&ei=Qvo-VYi4J8OIsQS5m4DQCw&ved=0CCYQrwswAA">
            Endereço: Rua Doutora Maria Zélia Carneiro de Figueiredo, 870 A - Igara III
            <br />Canoas - RS, CEP:92412-240</a>
            Telefone:(51) 3415-8200
            <br />&copy;copyright 2015. All Rights Reserved
            <img alt="logotipo" src="img/logo_default.png" />
        </div>
    </div>
</body>
</html>