<?php
require_once("../model/pokemon.php");
require_once("../dao/pokemonDao.php");
class PokemonControl {
    private $pokemon;
    private $acao;
    private $dao;
    public function __construct(){
       $this->pokemon=new Pokemon();
      $this->dao=new PokemonDao();
      $this->acao=$_GET["a"];
      $this->verificaAcao(); 
    }
    function verificaAcao(){
       switch($this->acao){
          case 1:
            $this->inserir();
          break;
          case 2:
            $this->excluir();
          break;
       }
    }
  
    function inserir(){
        $this->pokemon->setId($_POST['id']);
		$this->pokemon->setNome($_POST['nome']);
		$this->pokemon->setDescricao($_POST['descricao']);
		$this->pokemon->setLink($_POST['link']);
		$this->pokemon->setTipo1($_POST['tipo1']);
		$this->pokemon->setTipo2($_POST['tipo2']);
		$this->pokemon->setEvolucao($_POST['evolucao']);
		$this->pokemon->setJogo2($_POST['jogo2']);
		
        $this->dao->inserir($this->pokemon);
    }
    function excluir(){
        $this->dao->excluir($_REQUEST['id']);
    }
    function alterar(){}
    function buscarId(Pokemon $pokemon){}
    function buscaTodos(){}

}
new PokemonControl();
?>