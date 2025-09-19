<?php

require_once(__DIR__ . "/../../model/Pokemon.php");
require_once(__DIR__ . "/../../controller/PokemonController.php");

$msgErro = "";
$pokemon = null;

//Receber os dados do formulário
if(isset($_POST['nome'])) {
    //Usuário já clicou no gravar
    $nome        = trim($_POST['nome']) ? trim($_POST['nome']) : NULL;
    $descricao       = ($_POST['descricao']) ? $_POST['descricao'] : NULL;
    $link   = ($_POST['link']) ? $_POST['link'] : NULL;
    $evolucao = is_numeric($_POST['evolucao']) ? ($_POST['evolucao']) : NULL;
    $tipo1     = ($_POST['tipo1']) ? $_POST['tipo1'] : NULL;
    $tipo2     = ($_POST['tipo2']);

    //Criar um objeto Pokemon para persistí-lo
    $pokemon = new Pokemon();
    $pokemon->setId(0);
    $pokemon->setNome($nome);
    $pokemon->setDescricao($descricao);
    $pokemon->setLink($link);
    $pokemon->setTipo1($tipo1);
    $pokemon->setTipo2($tipo2);
    $pokemon->setEvolucao($evolucao);

    //Chamar o DAO para salvar o objeto Pokemon
    $pokemonCont = new PokemonController();
    $erros = $pokemonInserir($pokemon);

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