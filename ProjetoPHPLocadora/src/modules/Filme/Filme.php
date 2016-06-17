<?php

include "modules/Genero/Genero.php";
include "modules/Protagonista/Protagonista.php";

class Filme{
	private $id = 0;
	private $titulo = "";
	private $dataLancamento = 0;
	private $precoLocacao = 0.0;
	private $precoDesconto = 0.0;
	private $protagonista;
	private $genero;
	
	function getId(){
		return $this->id;
	}	
	function getTitulo(){
		return $this->titulo;
	}
	function getDataLancamento(){
		return $this->dataLancamento;
	}
	function getPrecoLocacao(){
		return $this->precoLocacao;
	}
	function getPrecoDesconto(){
		return $this->precoDesconto;
	}
	function getProtagonista(){
		return $this->Protagonista;
	}
	function getGenero(){
		return $this->genero;
	}
	
	function setId($id){
		$this->id = $id;
	}
	function setTitulo($titulo){
		$this->titulo = $titulo;
	}
	function setDataLancamento($dataLocacao){
		$this->dataLancamento = $dataLocacao;
	}
	function setPrecoLocacao($precoLocacao){
		$this->precoLocacao = $precoLocacao;
	}
	function setPrecoDesconto($precoDesconto){
		$this->precoDesconto = $precoDesconto;
	}
	function setProtagonista($protagonista){
		$this->Protagonista = $protagonista;
	}
	function setGenero($genero){
		$this->genero = $genero;
	}
}