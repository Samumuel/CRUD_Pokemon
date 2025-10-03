<?php 
    require_once(__DIR__ . "/../../controller/PokemonController.php");   

    //Chamar o controller para obter a lista de pokemons
    $pokemonCont = new PokemonController();
    $lista = $pokemonCont->listar();

    //Incluir o header
    include_once(__DIR__ . "/../include/header.php");
?>

<!-- Botões na mesma linha -->
<div class="d-flex justify-content-between mb-2">
    <a href="inserir.php" class="btn btn-primary">Inserir</a>
    <a href="card.php" class="btn btn-success">Cards</a>
</div>

<table class="table table-striped p-3 rounded-4 border border-5 border-primary bg-light">
    <!-- Cabeçalho -->
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Tipo 1</th>
        <th>Tipo 2</th>
        <th>Evolução</th>
        <th>Geração</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>

    <!-- Dados -->
    <?php foreach($lista as $pokemon): ?>
        <tr>
            <td><?= $pokemon->getId() ?></td>
            <td><?= $pokemon->getNome() ?></td>
            <td><?= $pokemon->getDescricao() ?></td>
            <td><img src="<?= $pokemon->getVerificaTipo1() ?>" alt="Tipo1" width="50" height="50"> </td>
            <td><?php if($pokemon->getVerificaTipo2()): ?>
                <img src="<?= $pokemon->getVerificaTipo2() ?>" alt="Tipo2" width="50" height="50"> 
                <?php endif; ?></td>
            <td><?= $pokemon->getEvolucao()?></td>
            <td><?= $pokemon->getGeracao()->getNumero() ?></td>
            <td>
                <a href="alterar.php?id=<?= $pokemon->getId() ?>">
                    <img src="../../img/btn_editar.png">
                </a> 
            </td>
            <td>
                <a href="excluir.php?id=<?= $pokemon->getId() ?>"
                    onclick="return confirm('Confirma a exclusão?');">
                    <img src="../../img/btn_excluir.png">
                </a>
            </td>
            <td>
                <a href="geracao.php?id=<?= $pokemon->getGeracao()->getId() ?>" >
                    Ver Geração
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
    //Incluir o footer
    include_once(__DIR__ . "/../include/footer.php");   
?>
