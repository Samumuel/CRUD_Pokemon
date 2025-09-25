<?php
require_once("../model/conexao.php");
class GeracaoDao {
    private $con;
    public function __construct(){
       $this->con=(new Conexao())->conectar();
    }
function inserir($obj) {
    $sql = "INSERT INTO geracao (id, numero, ano, jogo, anime, cidade, jogo2) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->con->prepare($sql);
    $id=$obj->getId();
    $numero=$obj->getNumero();
    $ano=$obj->getAno();
    $jogo=$obj->getJogo();
    $anime=$obj->getAnime();
    $cidade=$obj->getCidade();
    $jogo2=$obj->getJogo2();

    $stmt->execute([$id,$numero,$ano,$jogo,$anime,$cidade,$jogo2]);
}
function listaGeral(){
    $sql = "select * from geracao";
    $query = $this->con->query($sql);
    $dados = $query->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
}
function excluir($id){
    $sql = "delete from geracao where id=$id";
    $query = $this->con->query($sql);
    header("Location:../view/listaGeracao.php");
}
}
?>