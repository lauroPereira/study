<?php

require_once("modules/db/connect.php");
require_once("Filme.php");

class FilmeDto{

	
	function select(){
		$link=new Connect();
		
		$query = "SELECT * FROM tbl_filmes";
		
		$result = $link->query($query);
		
		unset($link);
		
		return $result;
	}
	
	function qtd(){
		$link=new Connect();
		
		$query = "SELECT * FROM tbl_filmes";
		
		$result = $link->query($query);

		//unset($link);
		
		return $result->num_rows;
	}
	
	function insert(Filme $filme){
		$link=new Connect();
		
		$query = "insert into tbl_filmes (id_filme, titulo_filme, data_lancamento, preco_locacao, preco_desconto, id_protagonista, id_genero) values (".
		$filme->id.', '.
		'\''.$filme->titulo.'\', '.
		$filme->dataLancamento.', '.
		$filme->precoLocacao.', '.
		$filme->precoDesconto.', '.
		$filme->protagonista->getId().', '.
		$filme->genero->getId().'); ';
		
		$result = mysqli_query($link,$query) or die(mysqli_error($link));
		
		mysqli_close($link);
		
		return $result;
	}
}
?>