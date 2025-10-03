<?php

require_once(__DIR__ . "/../dao/HabilidadeDAO.php");

class HabilidadeController {

    private HabilidadeDAO $habilidadeDAO;

    public function __construct() {
        $this->habilidadeDAO = new HabilidadeDAO;
    }

    public function listar() {
        return $this->habilidadeDAO->listar();
    }

    public function buscarPorTipo($tipo) {
        return $this->habilidadeDAO->buscarPorTipo($tipo);
    }

    public function listar2($tipo) {
        return $this->habilidadeDAO->listar2($tipo);
    }

}