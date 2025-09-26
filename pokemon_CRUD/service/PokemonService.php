<?php

require_once(__DIR__ . "/../model/Pokemon.php");

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

        if(! $pokemon->getEvolucao()) {
            array_push($erros, "Informe a fase evolutica do pokemon!");
        }

        if(! $pokemon->getGeracao()) {
            array_push($erros, "Informe a geração do pokemon!");
        }

        return $erros;
    }
}