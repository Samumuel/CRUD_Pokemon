<?php

require_once(__DIR__ . "/../../controller/GeracaoController.php");
require_once(__DIR__ . "/../../model/Pokemon.php");

$geracaoCont = new GeracaoController();
$geracaos = $geracaoCont->listar();
//print_r($geracaos);

$tipo1 = $pokemon ? $pokemon->getTipo1() : "";
$tipo2 = $pokemon ? $pokemon->getTipo2() : "";

$tipos = array("Normal", "Fogo", "Agua", "Eletrico", "Grama", "Gelo", "Lutador", "Veneno", "Terra", "Voador" ,"Psíquico", "Inseto", "Fada", "Dragão", "Metal", "Pedra", "Fantasma", "Escuridão");


include_once(__DIR__ . "/../include/header.php");
?>

<div class="row justify-content-center">
    <div class="col-md-6 col-lg-4">
        <main class="form-signin w-100 m-auto text-center">
            <img class="mb-3" src="https://www.freeiconspng.com/uploads/pokeball-pokemon-ball-picture-11.png" alt="Pokebola" width="72" height="72">
            <h3><?= $pokemon && $pokemon->getId() > 0 ? 'Alterar' : 'Inserir' ?> Pokémon</h3>
            <form method="POST" action="" border="1" class="p-3 rounded-4 border border-5 border-primary bg-light">

                <div class="mb-3 border-primary">
                    <input type="text" id="txtNome" name="nome"
                        placeholder="Informe o nome" class="form-control"
                        value="<?= $pokemon ? $pokemon->getNome() : '' ?>">
                </div>

                <div class="mb-3 border-primary">
                    <input type="text" id="txtDescricao" name="descricao"
                        placeholder="Informe a descrição" class="form-control"
                        value="<?= $pokemon ? $pokemon->getDescricao() : '' ?>">
                </div>

                <div class="mb-3 border-primary">
                    <input type="text" id="txtLink" class="form-control" placeholder="Informe o link da imagem" name="link" value="<?=$pokemon ? $pokemon->getLink() : ''?>">
                </div>

                <div class="mb-3">
                    <select class="form-select" name="tipo1">
                            <option value="">Selecione o Tipo</option>
                                <?php foreach($tipos as $tp): ?>
                                    <option value="<?= $tp?>" <?php if ($tipo1 == "$tp") {
                                        echo "selected";
                                    }; ?>><?php echo $tp; ?></option>
                                <?php endforeach; ?>
                        </select>
                </div>

                <div class="mb-3 border-primary">
                    <select class="form-select" name="tipo2">
                        <option value="">Selecione o Tipo</option>
                            <?php foreach($tipos as $tp): ?>
                                <option value="<?= $tp?>" <?php if ($tipo2 == "$tp") {
                                    echo "selected";
                                }; ?>><?php echo $tp; ?></option>
                        <?php endforeach; ?>
                        <option value="Não Tem" <?php if ($tipo2 == "Não Tem") {
                            echo "selected";
                        }; ?>>Não Tem</option>
                    </select>
                </div>

                <div class="mb-3 border-primary">
                    <input type="number" id="numEvolucao" name="evolucao"
                        placeholder="Informe a evolução" class="form-control "
                        value="<?= $pokemon ? $pokemon->getEvolucao() : '' ?>">
                </div>

                <div class="mb-3 border-primary">
                    <input type="number" id="idGeracao" name="geracao"
                        placeholder="Informe a geração" class="form-control"
                        value="<?= $pokemon ? $pokemon->getGeracao()->getId() : '' ?>">
                        Caso não saiba use 1 como padrão.
                </div>

                <input type="hidden" name="id"
                    value="<?= $pokemon ? $pokemon->getId() : 0 ?>">

                <br>

                <div class="mt-2">
                    <button type="submit" class="btn btn-primary">
                        Gravar
                    </button>
                </div>

                <div class="mt-2">
                    <a href="listar.php" class="btn btn-primary">Lista</a>
                </div>

            </form>
        </main>

        <div class="col-6">
            <?php if($msgErro): ?>
                <div class="alert alert-danger">
                    <?= $msgErro ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>



<?php
    include_once(__DIR__ . "/../include/footer.php");
?>