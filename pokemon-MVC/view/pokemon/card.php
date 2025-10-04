<?php

require_once("../../util/Connection.php");
require_once("../../model/Pokemon.php");
require_once (__DIR__ . "/../../controller/HabilidadeController.php");

$con = Connection::getConnection();
$sql = "SELECT * FROM pokemon";
$stm = $con->prepare($sql);
$stm->execute();
$pokemons = $stm->fetchAll();


include_once(__DIR__ . "/../include/header.php");
?>


<body>
    <div class="container py-5">
        <div class="d-flex flex-wrap justify-content-center gap-4">
            <?php
            foreach ($pokemons as $pk) {
                $pokemon = new Pokemon();
                $pokemon->setNome($pk["nome"]);
                $pokemon->setDescricao($pk["descricao"]);
                $pokemon->setLink($pk["link"]);
                $pokemon->setEvolucao($pk["evolucao"]);
                $pokemon->setTipo1($pk["tipo1"]);
                $pokemon->setTipo2($pk["tipo2"]);

                $habilidadeCont = new HabilidadeController();
                $habilidade = $habilidadeCont->buscarPorTipo($pk['tipo1']);
                if($habilidade) {
                    $pokemon->setHabilidade($habilidade);
                } else {
                    $habilidade = new Habilidade();
                    $habilidade->setId(1);
                    $pokemon->setHabilidade($habilidade);
                }

                echo $pokemon->getGeraCard();
            }
            ?>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <a href='listar.php' class='btn btn-outline-dark btn-sm card rounded-4 border border-3 border-primary text-center' style='width: 12rem'>
                Lista de Pokémons
            </a>
        </div>
    </div>
<?php
    include_once(__DIR__ . "/../include/footer.php");
?>