<?php

require_once(__DIR__ . "/../../model/Pokemon.php");
require_once(__DIR__ . "/../../controller/PokemonController.php");
require_once (__DIR__ . "/../../controller/HabilidadeController.php");

$msgErro = "";
$pokemon = null;


//Receber os dados do formulário
if(isset($_POST['nome'])) {
    //Usuário já clicou no gravar
    $nome        = trim($_POST['nome']) ? trim($_POST['nome']) : NULL;
    $descricao       = $_POST['descricao'] ? $_POST['descricao'] : NULL;
    $link       = trim($_POST['link']) ? trim($_POST['link']) : NULL;
    $tipo1 = trim($_POST['tipo1']) ? trim($_POST['tipo1']) : NULL;
    $tipo2 = trim($_POST['tipo2']) ? trim($_POST['tipo2']) : NULL;
    $evolucao = is_numeric($_POST['evolucao']) ? $_POST['evolucao'] : NULL;
    $idGeracao = $_POST['geracao'];

    //Criar um objeto Pokemon para persistí-lo
    $pokemon = new Pokemon();
    $pokemon->setId(0);
    $pokemon->setNome($nome);
    $pokemon->setDescricao($descricao);
    $pokemon->setLink($link);
    $pokemon->setTipo1($tipo1);
    $pokemon->setTipo2($tipo2);
    $pokemon->setEvolucao($evolucao);
    

    if($idGeracao) {
        $geracao = new Geracao();
        $geracao->setId($idGeracao);
        $pokemon->setGeracao($geracao);
    } else {
        $geracao = new Geracao();
        $geracao->setId('1');
        $pokemon->setGeracao($geracao);
    }

    $habilidadeCont = new HabilidadeController();
    $habilidade = $habilidadeCont->buscarPorTipo($tipo1);
    if($habilidade) {
        $pokemon->setHabilidade($habilidade);
    } else {
        $habilidade = new Habilidade();
        $habilidade->setId(1);
        $pokemon->setHabilidade($habilidade);
    }

    //Chamar o DAO para salvar o objeto Pokemon
    $pokemonCont = new PokemonController();
    $erros = $pokemonCont->inserir($pokemon);

    if(! $erros) {
        //Redirecionar para o listar
        header("location: listar.php");
    } else {
        //Converter o array de erros para string
        $msgErro = implode("<br>", $erros);
    }



}

include_once(__DIR__ . "/form.php");
?>