<?php

require_once(__DIR__ . "/../../model/Pokemon.php");
require_once(__DIR__ . "/../../controller/PokemonController.php");

$msgErro = "";
$pokemon = null;

//Teste se o usuário já clicou no gravar
if(isset($_POST['nome'])) {
    //Já clicou no gravar
    //1- Capturar os dados do formulário
    $id          = $_POST["id"]; //Chegar por POST
    $nome        = trim($_POST['nome']) ? trim($_POST['nome']) : NULL;
    $descricao       = $_POST['descricao'] ? $_POST['descricao'] : NULL;
    $link       = trim($_POST['link']) ? trim($_POST['link']) : NULL;
    $tipo1 = trim($_POST['tipo1']) ? trim($_POST['tipo1']) : NULL;
    $tipo2 = trim($_POST['tipo2']) ? trim($_POST['tipo2']) : NULL;
    $evolucao = is_numeric($_POST['evolucao']) ? $_POST['evolucao'] : NULL;
    $idGeracao = $_POST['geracao'];

    //Criar um objeto Pokemon para persistí-lo
    $pokemon = new Pokemon();
    $pokemon->setId($id);
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
    
    //2- Chamar o controller para alterar
    $pokemonCont = new PokemonController();
    $erros = $pokemonCont->alterar($pokemon);

    if(! $erros) {
        //Redirecionar para o listar
        header("location: listar.php");
    } else {
        //Converter o array de erros para string
        $msgErro = implode("<br>", $erros);
    }
} else {
    //Usuário abriu a página para ver o formulário
    $id = 0;
    if(isset($_GET["id"]))
        $id = $_GET["id"];

    $pokemonCont = new PokemonController();
    $pokemon = $pokemonCont->buscarPorId($id);

    if(! $pokemon) {
        echo "ID do pokemon é inválido!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}

include_once(__DIR__ . "/form.php");
