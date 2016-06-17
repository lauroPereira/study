<?php
	require_once 'modules/Filme/FilmeDto.php';
	$filmes = new FilmeDto();
	
	echo $filmes->qtd();
	var_dump($filmes);
?>