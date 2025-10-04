<?php

require_once(__DIR__ . "/../dao/GeracaoDAO.php");

class GeracaoController {

    private GeracaoDAO $geracaoDAO;

    public function __construct() {
        $this->geracaoDAO = new GeracaoDAO;
    }

    public function listar() {
        return $this->geracaoDAO->listar();
    }

    public function listar2($id) {
        return $this->geracaoDAO->listar2($id);
    }

    function pegaIdPorAni($anime){
        return $this->geracaoDAO->pegaIdPorAni($anime);
    }

}