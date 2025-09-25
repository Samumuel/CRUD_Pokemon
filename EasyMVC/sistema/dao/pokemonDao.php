<?php
require_once("../model/conexao.php");
class PokemonDao {
    private $con;
    public function __construct(){
       $this->con=(new Conexao())->conectar();
    }
function inserir($obj) {
    $sql = "INSERT INTO pokemon (id, nome, descricao, link, tipo1, tipo2, evolucao, jogo2) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->con->prepare($sql);
    $id=$obj->getId();
    $nome=$obj->getNome();
    $descricao=$obj->getDescricao();
    $link=$obj->getLink();
    $tipo1=$obj->getTipo1();
    $tipo2=$obj->getTipo2();
    $evolucao=$obj->getEvolucao();
    $jogo2=$obj->getJogo2();

    $stmt->execute([$id,$nome,$descricao,$link,$tipo1,$tipo2,$evolucao,$jogo2]);
}
function listaGeral(){
    $sql = "select * from pokemon";
    $query = $this->con->query($sql);
    $dados = $query->fetchAll(PDO::FETCH_ASSOC);
    return $dados;
}
function excluir($id){
    $sql = "delete from pokemon where id=$id";
    $query = $this->con->query($sql);
    header("Location:../view/listaPokemon.php");
}
}
?>