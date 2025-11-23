<?php 

require_once(__DIR__ . "/../model/Pokemon.php");
require_once(__DIR__ . "/../controller/PokemonController.php");

$nome = "";
//Capturar os dados do formulário
$nome     =  trim($_POST['nome']) ? $_POST['nome'] : null;
$descricao     =  trim($_POST['descricao']) ? $_POST['descricao'] : null;
$tipo1     =  trim($_POST['tipo1']) ? $_POST['tipo1'] : null;
$tipo2     =  trim($_POST['tipo2']) ? $_POST['tipo2'] : null;
$link     =  trim($_POST['link']) ? $_POST['link'] : null;
$evolucao = is_numeric($_POST['evolucao']) ? $_POST['evolucao'] : null;
$geracao  = ($_POST['geracao']) ? $_POST['geracao'] : null;

//Criar o objeto
$pokemon = new Pokemon();
$pokemon->setNome($nome);
$pokemon->setDescricao($descricao);
$pokemon->setTipo1($tipo1);
$pokemon->setTipo2($tipo2);
$pokemon->setLink($link);
$pokemon->setEvolucao($evolucao);
$pokemon->setGeracao(new Geracao($geracao));

$pokemonCont = new PokemonController();
$erros = $pokemonCont->salvar($pokemon);

$msgErro = "";
if($erros)
    $msgErro = implode("<br>", $erros);

echo $msgErro;