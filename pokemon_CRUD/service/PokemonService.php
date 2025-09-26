<?php

require_once(__DIR__ . "/../model/Pokemon.php");
require_once(__DIR__. "/../model/Geracao.php");

class PokemonService {

    public function validarPokemon(Pokemon $pokemon) {
        $erros = array();

        if(! $pokemon->getNome()) {
            array_push($erros, "Informe o nome do pokemon!");
        }

        if(! $pokemon->getDescricao()) {
            array_push($erros, "Informe a descrição do pokemon!");
        }

        if(! $pokemon->getLink()) {
            array_push($erros, "Informe o link da imagem!");
        }

        if(! $pokemon->getTipo1()) {
            array_push($erros, "Informe o tipo 1 do pokemon!");
        }

        if(! $pokemon->getTipo2()) {
            array_push($erros, "Informe o tipo 2 do pokemon!");
        }

        if(! $pokemon->getEvolucao() || $pokemon->getEvolucao() < 1 || $pokemon->getEvolucao() > 3) {
            array_push($erros, "Informe a fase evolutica do pokemon entre 1 e 3!");
        }

        $ger = $pokemon->getGeracao()->getId();
        if ($ger > 9 || $ger < 0) {
            array_push($erros, "Selecione uma geração válida(entre 1 e 9).");
        }

        return $erros;
    }
}