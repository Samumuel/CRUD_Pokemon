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
    $idade       = is_numeric($_POST['idade']) ? $_POST['idade'] : NULL;
    $estrangeiro = trim($_POST['estrang']) ? trim($_POST['estrang']) : NULL;
    $idCurso     = is_numeric($_POST['curso']) ? $_POST['curso'] : NULL;

    //Criar um objeto Pokemon para persistí-lo
    $pokemon = new Pokemon();
    $pokemon->setId($id);
    $pokemon->setNome($nome);
    $pokemon->setIdade($idade);
    $pokemon->setEstrangeiro($estrangeiro);

    if($idCurso) {
        $curso = new Curso();
        $curso->setId($idCurso);
        $pokemon->setCurso($curso);
    } else
        $pokemon->setCurso(NULL);

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
