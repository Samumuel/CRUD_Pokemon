<?php
class Pokemon {
	private $id;
	private $nome;
	private $descricao;
	private $link;
	private $tipo1;
	private $tipo2;
	private $evolucao;
	private $jogo2;

	function getId(){
		return $this->id;
	}
	function setId($id){
		$this->id=$id;
	}
	function getNome(){
		return $this->nome;
	}
	function setNome($nome){
		$this->nome=$nome;
	}
	function getDescricao(){
		return $this->descricao;
	}
	function setDescricao($descricao){
		$this->descricao=$descricao;
	}
	function getLink(){
		return $this->link;
	}
	function setLink($link){
		$this->link=$link;
	}
	function getTipo1(){
		return $this->tipo1;
	}
	function setTipo1($tipo1){
		$this->tipo1=$tipo1;
	}
	function getTipo2(){
		return $this->tipo2;
	}
	function setTipo2($tipo2){
		$this->tipo2=$tipo2;
	}
	function getEvolucao(){
		return $this->evolucao;
	}
	function setEvolucao($evolucao){
		$this->evolucao=$evolucao;
	}
	function getJogo2(){
		return $this->jogo2;
	}
	function setJogo2($jogo2){
		$this->jogo2=$jogo2;
	}

}
?>