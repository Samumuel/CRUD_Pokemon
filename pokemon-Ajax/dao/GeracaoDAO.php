<?php

require_once(__DIR__ . "/../util/Connection.php");
require_once(__DIR__ . "/../model/Geracao.php");

class GeracaoDAO {

    private PDO $conexao;

    public function __construct() {
        $this->conexao = Connection::getConnection();        
    }
    
    public function listar() {
        $sql = "SELECT * FROM geracao ORDER BY numero";
        $stm = $this->conexao->prepare($sql);
        $stm->execute();
        $resultado = $stm->fetchAll();

        $geracaos = $this->map($resultado);
        return $geracaos;
    }

    public function listar2($id) {
        $sql = "SELECT * FROM geracao WHERE id = ?";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
        $resultado = $stm->fetchAll();

        $geracaos = $this->map($resultado);
        return $geracaos;
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM geracao WHERE id = ?";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$id]);
        $resultado = $stm->fetchAll();

        $geracaos = $this->map($resultado);

        if(count($geracaos) > 0)
            return $geracaos[0];

        return null;
    }
    
    public function pegaIdPorAni($anime) {
        $sql = "SELECT id FROM geracao WHERE anime = ?";
        $stm = $this->conexao->prepare($sql);
        $stm->execute([$anime]);
        $resultado = $stm->fetch(PDO::FETCH_ASSOC);
;
        return $resultado ? $resultado['id'] : null;
    }

    private function map($resultado) {
        $geracaos = array();
        foreach($resultado as $r) {
            $geracao = new Geracao();
            $geracao->setId($r['id']);
            $geracao->setNumero($r['numero']);
            $geracao->setAno($r['ano']);
            $geracao->setJogo($r['jogo']);
            $geracao->setJogo2($r['jogo2']);
            $geracao->setAnime($r['anime']);
            $geracao->setCidade($r['cidade']);

            array_push($geracaos, $geracao);
        }

        return $geracaos;        
    }



}