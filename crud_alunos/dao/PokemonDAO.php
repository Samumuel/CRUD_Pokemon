<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Pokemon.php");

class PokemonDAO {

    private PDO $conexao;

    public function __construct() {
        $this->conexao = Connection::getConnection();        
    }

    public function listar() {
        $sql = "SELECT a.*, 
                    c.nome nome_curso, c.turno turno_curso 
                FROM pokemons a
                    JOIN cursos c ON (c.id = a.id_curso)
                ORDER BY a.nome";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->map($result);
    }

    public function buscarPorId(int $id) {
        $sql = "SELECT a.*, 
                    c.nome nome_curso, c.turno turno_curso 
                FROM pokemons a
                    JOIN cursos c ON (c.id = a.id_curso)
                WHERE a.id = ?";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $pokemons = $this->map($result);

        if(count($pokemons) > 0)
            return $pokemons[0];
        else
            return NULL;
    }

    public function inserir(Pokemon $pokemon) {
        try {
            $sql = "INSERT INTO pokemons (nome, idade, estrangeiro, id_curso)
                    VALUES (?, ?, ?, ?)";
            $stm = $this->conexao->prepare($sql);
            $stm->execute([$pokemon->getNome(), $pokemon->getIdade(), 
                        $pokemon->getEstrangeiro(),
                        $pokemon->getCurso()->getId()]);
            return NULL;
        } catch(PDOException $e) {
            return $e;
        }
    }

    public function alterar(Pokemon $pokemon) {
        try {
            $sql = "UPDATE pokemons SET nome = ?, idade = ?,
                        estrangeiro = ?, id_curso = ?
                    WHERE id = ?";
            $stm = $this->conexao->prepare($sql);
            $stm->execute([
                $pokemon->getNome(), $pokemon->getIdade(),
                $pokemon->getEstrangeiro(), $pokemon->getCurso()->getId(),
                $pokemon->getId()
            ]);
            return NULL;
        } catch(PDOException $e) {
            return $e;
        }
    }

    public function excluirPorId(int $id) {
        try {
            $sql = "DELETE FROM pokemons 
                    WHERE id = :id";
            $stm = $this->conexao->prepare($sql);
            $stm->bindValue("id", $id);
            $stm->execute();
            return NULL;
        } catch(PDOException $e) {
            return $e;
        }
    }

    private function map(array $result) {
        $pokemons = array();
        foreach($result as $r) {
            $pokemon = new Pokemon();
            $pokemon->setId($r["id"]);
            $pokemon->setNome($r['nome']);
            $pokemon->setIdade($r["idade"]);
            $pokemon->setEstrangeiro($r['estrangeiro']);
            
            $curso = new Curso();
            $curso->setId($r["id_curso"]);
            $curso->setNome($r["nome_curso"]);
            $curso->setTurno($r["turno_curso"]);
            $pokemon->setCurso($curso);

            array_push($pokemons, $pokemon);
        }
        return $pokemons;
    }

}