<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Geracao.php");

class GeracaoDAO {

    private PDO $conexao;

    public function __construct() {
        $this->conexao = Connection::getConnection();        
    }
    
    public function listar() {
        $sql = "SELECT * FROM geracaos ORDER BY nome";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        $resultado = $stm->fetchAll();

        $geracaos = $this->map($resultado);
        return $geracaos;
    }

    private function map($resultado) {
        $geracaos = array();
        foreach($resultado as $r) {
            $geracao = new Geracao();
            $geracao->setId($r['id']);
            $geracao->setNome($r['nome']);
            $geracao->setTurno($r['turno']);

            array_push($geracaos, $geracao);
        }

        return $geracaos;        
    }

}