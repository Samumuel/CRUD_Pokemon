<?php

include_once(__DIR__ . "/../include/header.php");
$tipos = array("Normal", "Fogo", "Agua", "Eletrico", "Grama", "Gelo", "Lutador", "Veneno", "Terra", "Psíquico", "Inseto", "Fada", "Dragão", "Metal", "Pedra", "Fantasma", "Escuridão", "")
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="text-center d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="container">
            <div class="row justify-content-center ">
                <h1>Listagem</h1>
                <table border="2" class="border-primary" style="background-color: white;">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Evolução</th>
                        <th>Tipo 1</th>
                        <th>Tipo 2</th>
                    </tr>

                    <?php foreach ($pokemons as $pk):   ?>
                        <tr>
                            <td><?= $pk["id"] ?></td>
                            <td><?= $pk["nome"] ?></td>
                            <td><?= $pk["descricao"] ?></td>
                            <td><?= $pk["evolucao"] ?></td>
                            <td><?= $pk["tipo1"] ?></td>
                            <td><?= $pk["tipo2"] ?></td>
                            <td><a href="excluir.php?excluir=<?= $pk["id"] ?>">Excluir</a></td>
                            <td><a href="excluir.php?excluir=<?= $pk["id"] ?>">Editar</a></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <br>
                <div class="col-md-6 col-lg-4">
                    <main class="form-signin w-100 m-auto text-center">

                        <img class="mb-3" src="https://www.freeiconspng.com/uploads/pokeball-pokemon-ball-picture-11.png" alt="Pokebola" width="72" height="72">
                        <h1 class="h3 mb-3 fw-normal border-primary">Cadastre o Pokémon</h1>
                        <form action="" method="POST">
                            <div class="mb-3 border-primary">
                                <input type="text" class="form-control" placeholder="Nome do Pokémon" name="nome" value=<?= $nome ?>>
                            </div>

                            <div class="mb-3 border-primary">
                                <input type="text" class="form-control" placeholder="Descrição do pokémon" name="descricao" value=<?= $descricao ?>>
                            </div>

                            <div class="mb-3 border-primary">
                                <input type="text" class="form-control" placeholder="Informe o link da imagem" name="link" value=<?= $link ?>>
                            </div>

                            <div class="mb-3 border-primary">
                                <input type="number" min="1" max="3" class="form-control" placeholder="Informe o estágio de evolução" name="evolucao" value=<?= $evolucao ?>>
                            </div>

                            <div class="mb-3 border-primary">
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
                                        <option value="Não Tem" <?php if ($tipo2 == "Não tem") {
                                                echo "selected";
                                            }; ?>>Não Tem</option>
                                </select>
                            </div>


                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Enviar</button>
                                <button type="submit" formaction="card.php" class="btn btn-primary">Ir para o Card</button>
                            </div>
                        </form>
                        <div id="erros" class="border-primary rounded-4 border border-2" style="background-color: white;">
                            <?=
                            $msgErro;
                            ?>
                        </div>
                        <script src="js/validacao.js">
                        </script>
                    </main>
                </div>
            </div>
        </div>


    </div>
</body>