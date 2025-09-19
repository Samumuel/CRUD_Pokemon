<?php

require_once(__DIR__ . "/../dao/PokemonDAO.php");
require_once(__DIR__ . "/../model/Pokemon.php");
require_once(__DIR__ . "/../service/PokemonService.php");

class PokemonController {

    private PokemonDAO $alunoDAO;
    private PokemonService $alunoService;

    public function __construct() {
        $this->alunoDAO = new PokemonDAO();
        $this->alunoService = new PokemonService();        
    }

    public function listar() {
        $lista = $this->alunoDAO->listar();
        return $lista;
    }

    public function buscarPorId(int $id) {
        $aluno = $this->alunoDAO->buscarPorId($id);
        return $aluno;
    }

    public function inserir(Pokemon $aluno) {
        $erros = $this->alunoService->validarPokemon($aluno);
        if(count($erros) > 0) 
            return $erros;
        
        //Se não tiver erros, chama o DAO       
        $erro = $this->alunoDAO->inserir($aluno);
        if($erro) {
            array_push($erros, "Erro ao salvar o aluno!");
            if(AMB_DEV)
                array_push($erros, $erro->getMessage());
        }

        return $erros;
    }

    public function alterar(Pokemon $aluno) {
        $erros = $this->alunoService->validarPokemon($aluno);
        if(count($erros) > 0) 
            return $erros;

        //Se não deu erros, alterar o aluno no banco de dados
        $erro = $this->alunoDAO->alterar($aluno);
        if($erro) {
            array_push($erros, "Erro ao atualizar o aluno!");
            if(AMB_DEV)
                array_push($erros, $erro->getMessage());
        }

        return $erros;
    }

     public function excluirPorId(int $id) {
            $erros = array();
            
            $erro = $this->alunoDAO->excluirPorId($id);
            if($erro) {
            array_push($erros, "Erro ao excluir o aluno!");
            if(AMB_DEV)
                array_push($erros, $erro->getMessage());
        }
    }
    



}