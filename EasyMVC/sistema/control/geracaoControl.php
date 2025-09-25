<?php
require_once("../model/geracao.php");
require_once("../dao/geracaoDao.php");
class GeracaoControl {
    private $geracao;
    private $acao;
    private $dao;
    public function __construct(){
       $this->geracao=new Geracao();
      $this->dao=new GeracaoDao();
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
        $this->geracao->setId($_POST['id']);
		$this->geracao->setNumero($_POST['numero']);
		$this->geracao->setAno($_POST['ano']);
		$this->geracao->setJogo($_POST['jogo']);
		$this->geracao->setAnime($_POST['anime']);
		$this->geracao->setCidade($_POST['cidade']);
		$this->geracao->setJogo2($_POST['jogo2']);
		
        $this->dao->inserir($this->geracao);
    }
    function excluir(){
        $this->dao->excluir($_REQUEST['id']);
    }
    function alterar(){}
    function buscarId(Geracao $geracao){}
    function buscaTodos(){}

}
new GeracaoControl();
?>