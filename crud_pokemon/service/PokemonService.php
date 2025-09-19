<?php

require_once(__DIR__ . "/../model/Pokemon.php");

class PokemonService {

    public function validarPokemon(Pokemon $pokemon) {
        $erros = array();

        if (isset($_POST["nome"])) {
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $link = $_POST['link'];
            $evolucao = $_POST['evolucao'];
            $tipo1 = $_POST['tipo1'];
            $tipo2 = $_POST['tipo2'];

            //Validar os dados  

            $erros = array();
            if (! $nome) {
                array_push($erros, 'Informe um nome');
            } else {
                $sql = "SELECT id FROM pokemon WHERE nome = ?";
                $stm = $con->prepare($sql);
                $stm->execute([$nome]);
                $result = $stm->fetchAll();

                if (count($result) > 0) {
                    array_push($erros, "Já existe este pokémon!");
                }
            }
            if (! $descricao) {
                array_push($erros, 'Informe a Descrição!');
            }
            if (! $link) {
                array_push($erros, 'Informe o Link!');
            }
            if (! $evolucao) {
                array_push($erros, 'Informe a evolução!');
            }
            if (! $tipo1) {
                array_push($erros, 'Informe o tipo 1!');
            }
            if (! $tipo2) {
                array_push($erros, 'Informe o tipo 2!');
            }
            if (count($erros) == 0) {
                //Inserir as informações na base de dados
                $sql = "INSERT INTO pokemon (nome, descricao, link, evolucao, tipo1, tipo2) 
                VALUES (?, ?, ?, ?, ?, ?)";
                $stm = $con->prepare($sql);
                $stm->execute([$nome, $descricao, $link, $evolucao, $tipo1, $tipo2]);

                //Redirecionar para a mesma pagina a fim de limpar o buffer do navegador
                header("location: index.php");
            } else {
                $msgErro = implode("<br>", $erros);
            }
            $pokemon = new Pokemons(
                $_POST["nome"],
                $_POST["descricao"],
                $_POST["link"],
                $_POST["tipo1"],
                $_POST["tipo2"],
                $_POST["evolucao"]
            );
        }
    }
}