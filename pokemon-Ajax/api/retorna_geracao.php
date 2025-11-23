<?php
//Mostrar erros do PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once(__DIR__ . "/../model/Geracao.php");
require_once(__DIR__ . "/../controller/GeracaoController.php");

$idGeracao = 0;
if(isset($_GET['idGeracao']))
    $idGeracao = $_GET['idGeracao'];

$geracaoCont = new GeracaoController();
$geracao = $geracaoCont->buscarPorId($idGeracao);
echo json_encode($geracao, 
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
