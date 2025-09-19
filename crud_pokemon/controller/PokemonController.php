<?php

require_once(__DIR__ . "/../dao/PokemonDAO.php");
require_once(__DIR__ . "/../model/Pokemon.php");
require_once(__DIR__ . "/../service/PokemonService.php");

class pokemonController {

    private PokemonDAO $pokemonDAO;
    private PokemonService $pokemonService;

    public function __construct() {
        $this->pokemonDAO = new PokemonDAO();
        $this->pokemonService = new PokemonService();        
    }

    public function listar() {
        $lista = $this->PokemonDAO->listar();
        return $lista;
    }

    public function buscarPorId(int $id) {
        $pokemon = $this->pokemonDAO->buscarPorId($id);
        return $pokemon;
    }

    public function inserir(Pokemon $pokemon) {
        $erros = $this->pokemonService->validarPokemon($pokemon);
        if(count($erros) > 0) 
            return $erros;
        
        //Se não tiver erros, chama o DAO       
        $erro = $this->pokemonDAO->inserir($pokemon);
        if($erro) {
            array_push($erros, "Erro ao salvar o pokemon!");
            if(AMB_DEV)
                array_push($erros, $erro->getMessage());
        }

        return $erros;
    }

    public function alterar(Pokemon $pokemon) {
        $erros = $this->pokemonService->validarpokemon($pokemon);
        if(count($erros) > 0) 
            return $erros;

        //Se não deu erros, alterar o pokemon no banco de dados
        $erro = $this->pokemonDAO->alterar($pokemon);
        if($erro) {
            array_push($erros, "Erro ao atualizar o pokemon!");
            if(AMB_DEV)
                array_push($erros, $erro->getMessage());
        }

        return $erros;
    }

     public function excluirPorId(int $id) {
            $erros = array();
            
            $erro = $this->pokemonDAO->excluirPorId($id);
            if($erro) {
            array_push($erros, "Erro ao excluir o pokemon!");
            if(AMB_DEV)
                array_push($erros, $erro->getMessage());
        }
    }
    



}