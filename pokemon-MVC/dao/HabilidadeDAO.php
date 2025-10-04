<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Habilidade.php");

class HabilidadeDAO {

    private PDO $conexao;

    public function __construct() {
        $this->conexao = Connection::getConnection();        
    }
    
    public function listar() {
        $sql = "SELECT * FROM habilidade ORDER BY id";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        $resultado = $stm->fetchAll();

        $habilidades = $this->map($resultado);
        return $habilidades;
    }

    public function listar2($tipo) {
        $sql = "SELECT * FROM habilidade WHERE tipo = ?";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$tipo]);
        $resultado = $stm->fetchAll();

        $habilidades = $this->map($resultado);
        return $habilidades;
    }

    public function buscarPorTipo($tipo) {
        $sql = "SELECT * FROM habilidade WHERE tipo = ?";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$tipo]);
        $resultado = $stm->fetchAll();

        $habilidades = $this->map($resultado);

        if (count($habilidades) > 0)
            return $habilidades[0];
        else
            return NULL;
    }

    private function map($resultado) {
        $habilidades = array();
        foreach($resultado as $r) {
            $habilidade = new Habilidade();
            $habilidade->setId($r['id']);
            $habilidade->setTipo($r['tipo']);
            $habilidade->setVantagem($r['vantagem']);
            $habilidade->setDesvantagem($r['desvantagem']);

            array_push($habilidades, $habilidade);
        }

        return $habilidades;        
    }
}
