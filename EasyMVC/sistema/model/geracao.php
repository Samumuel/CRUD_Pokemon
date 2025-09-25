<?php
class Geracao {
	private $id;
	private $numero;
	private $ano;
	private $jogo;
	private $anime;
	private $cidade;
	private $jogo2;

	function getId(){
		return $this->id;
	}
	function setId($id){
		$this->id=$id;
	}
	function getNumero(){
		return $this->numero;
	}
	function setNumero($numero){
		$this->numero=$numero;
	}
	function getAno(){
		return $this->ano;
	}
	function setAno($ano){
		$this->ano=$ano;
	}
	function getJogo(){
		return $this->jogo;
	}
	function setJogo($jogo){
		$this->jogo=$jogo;
	}
	function getAnime(){
		return $this->anime;
	}
	function setAnime($anime){
		$this->anime=$anime;
	}
	function getCidade(){
		return $this->cidade;
	}
	function setCidade($cidade){
		$this->cidade=$cidade;
	}
	function getJogo2(){
		return $this->jogo2;
	}
	function setJogo2($jogo2){
		$this->jogo2=$jogo2;
	}

}
?>