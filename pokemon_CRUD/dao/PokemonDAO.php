<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Pokemon.php");

class PokemonDAO {

    private PDO $conexao;

    public function __construct() {
        $this->conexao = Connection::getConnection();        
    }

public function listar() {
    $sql = "SELECT p.*, 
                   g.numero  AS numero_geracao, 
                   g.ano     AS ano_geracao,
                   g.jogo    AS jogo_geracao,
                   g.jogo2   AS jogo2_geracao,
                   g.anime   AS anime_geracao,
                   g.cidade  AS cidade_geracao
            FROM pokemon p
                 JOIN geracao g ON g.id = p.geracao_id
            ORDER BY p.nome";
    
    $stm = $this->conexao->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll();

    return $this->map($result);
}

public function buscarPorId(int $id) {
    $sql = "SELECT p.*, 
                   g.numero  AS numero_geracao, 
                   g.ano     AS ano_geracao,
                   g.jogo    AS jogo_geracao,
                   g.jogo2   AS jogo2_geracao,
                   g.anime   AS anime_geracao,
                   g.cidade  AS cidade_geracao
            FROM pokemon p
                 JOIN geracao g ON g.id = p.geracao_id
            WHERE p.id = ?";
    
    $stm = $this->conexao->prepare($sql);
    $stm->execute([$id]);
    $result = $stm->fetchAll();

    $pokemons = $this->map($result);

    if (count($pokemons) > 0)
        return $pokemons[0];
    else
        return NULL;
}


    public function inserir(Pokemon $pokemon) {
        try {
            $sql = "INSERT INTO pokemon (nome, descricao, link, tipo1, tipo2, evolucao, geracao_id)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stm = $this->conexao->prepare($sql);
            $stm->execute([$pokemon->getNome(), $pokemon->getDescricao(), 
                        $pokemon->getLink(),
                        $pokemon->getTipo1(),
                        $pokemon->getTipo2(),
                        $pokemon->getEvolucao(),
                        $pokemon->getGeracao()->getId()
                    ]);
            return NULL;
        } catch(PDOException $e) {
            return $e;
        }
    }

    public function alterar(Pokemon $pokemon) {
        try {
            $sql = "UPDATE pokemon SET nome = ?, descricao = ?,
                        link = ?, tipo1 = ?, tipo2 = ?, evolucao = ?, geracao_id = ?
                    WHERE id = ?";
            $stm = $this->conexao->prepare($sql);
            $stm->execute([
                $pokemon->getNome(), $pokemon->getDescricao(),
                $pokemon->getLink(), $pokemon->getTipo1(),
                $pokemon->getTipo2(), $pokemon->getEvolucao(),
                $pokemon->getGeracao()->getId(),
                $pokemon->getId()
            ]);
            return NULL;
        } catch(PDOException $e) {
            return $e;
        }
    }

    public function excluirPorId(int $id) {
        try {
            $sql = "DELETE FROM pokemon
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
            $pokemon->setNome($r["nome"]);
            $pokemon->setDescricao($r["descricao"]);
            $pokemon->setLink($r["link"]);
            $pokemon->setTipo1($r["tipo1"]);
            $pokemon->setTipo2($r["tipo2"]);
            $pokemon->setEvolucao($r["evolucao"]);

            $geracao = new Geracao();
            $geracao->setId($r["geracao_id"]);
            $geracao->setNumero($r["numero_geracao"]);
            $geracao->setAno($r["ano_geracao"]);
            $geracao->setJogo($r["jogo_geracao"]);
            $geracao->setJogo2($r["jogo2_geracao"]);
            $geracao->setAnime($r["anime_geracao"]);
            $geracao->setCidade($r["cidade_geracao"]);
            $pokemon->setGeracao($geracao);

            array_push($pokemons, $pokemon);

        }

        return $pokemons;
    }

}


