<?php 
    require_once(__DIR__ . "/../../controller/GeracaoController.php");   

    $id = $_GET['id'];

    //Chamar o controller para obter a lista de gerações
    $geracaoCont = new GeracaoController();
    $infoGera = $geracaoCont->listar2($id);

    //Incluir o header
    include_once(__DIR__ . "/../include/header.php");
?>

<!-- Botões na mesma linha -->
<div class="d-flex justify-content-between mb-2">
    <a href="inserir.php" class="btn btn-primary">Inserir</a>
    <a href="listar.php" class="btn btn-success">Lista</a>
</div>

<table class="table table-striped p-3 rounded-4 border border-5 border-primary bg-light">
    <!-- Cabeçalho -->
    <tr>
        <th>ID</th>
        <th>Numero</th>
        <th>Ano</th>
        <th>Jogo 1</th>
        <th>Jogo 2</th>
        <th>Anime</th>
        <th>Cidade</th>
    </tr>

    <!-- Dados -->
    <?php foreach($infoGera as $geracao): ?>
        <tr>
            <td><?= $geracao->getId() ?></td>
            <td><?= $geracao->getNumero() ?></td>
            <td><?= $geracao->getAno() ?></td>
            <td><?= $geracao->getJogo() ?></td>
            <td><?= $geracao->getJogo2() ?></td>
            <td><?= $geracao->getAnime() ?></td>
            <td><?= $geracao->getCidade() ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
    //Incluir o footer
    include_once(__DIR__ . "/../include/footer.php");
?>
