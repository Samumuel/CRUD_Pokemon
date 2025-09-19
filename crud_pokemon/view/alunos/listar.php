<?php
    require_once(__DIR__ . "/../../controller/PokemonController.php");   

    //Chamar o controller para obter a lista de alunos
    $pokemonCont = new PokemonController();
    $lista = $pokemonCont->listar();

    //print_r($lista);


    //Incluir o header
    include_once(__DIR__ . "/../include/header.php");
?>

<h3>Lista de Pokémons</h3> 

<div>
    <a href="inserir.php">Inserir</a>
</div>

<table border="1">
    <!-- Cabeçalho -->
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Evolução</th>
        <th>Tipo 1</th>
        <th>Tipo 2</th>
        <th></th>
        <th></th>
    </tr>

    <!-- Dados -->
    <?php foreach($lista as $pokemon): ?>
        <tr>
            <td><?= $pokemon->getId() ?></td>
            <td><?= $pokemon->getNome() ?></td>
            <td><?= $pokemon->getDescricao() ?></td>
            <td><?= $pokemon->getEvolucao() ?></td>
            <td><?= $pokemon->getTipo1() ?></td>
            <td><?= $pokemon->getTipo2() ?></td>
            <td>
                <a href="alterar.php?id=<?= $aluno->getId() ?>">
                    <img src="../../img/btn_editar.png">
                </a> 
            </td>
            <td>
                <a href="excluir.php?id=<?= $pokemon->getId() ?>"
                    onclick="return confirm('Confirma a exclusão?');">
                    <img src="../../img/btn_excluir.png">
                </a>
            </td>
        </tr>
    <?php endforeach; ?>


</table>

<?php
    //Incluir o footer
    include_once(__DIR__ . "/../include/footer.php");   
?>
    
