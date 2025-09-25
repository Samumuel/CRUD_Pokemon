<?php 
require_once("modelo/Cards.php");

$pokemon = new Cards();
$tipo1 = getTipo1();
$tipo2 = getTipo2();

$tipos = array("Normal", "Fogo", "Agua", "Eletrico", "Grama", "Gelo", "Lutador", "Veneno", "Terra", "Voador" ,"Psíquico", "Inseto", "Fada", "Dragão", "Metal", "Pedra", "Fantasma", "Escuridão")
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Pokémon</title>
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <main class="form-signin w-100 m-auto text-center">
                    <img class="mb-3" src="https://www.freeiconspng.com/uploads/pokeball-pokemon-ball-picture-11.png" alt="Pokebola" width="72" height="72">
                    <h1 class="h3 mb-3 fw-normal">Cadastre o Pokémon</h1>
                    <form action="card.php" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Nome do Pokémon" name="nome" >
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Descrição do pokémon" name="descricao" >
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Informe o link da imagem" name="link" >
                        </div>

                        <div class="mb-3">
                            <input type="number" min="1" max="3" class="form-control" placeholder="Informe o estágio de evolução" name="evolucao" >
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

                        <div class="mb-3">
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

                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
</body>

</html>

<style>
    @font-face {
        font-family: 'Pokemon Classic';
        src: url('fonts/Pokemon-Classic.ttf') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    body {
        font-family: 'Pokemon Classic', sans-serif;
        background-image: url("https://pokedle.net/img/Background.b373eb68.png");
        background-position: center top;
        background-attachment: fixed;
        background-size: cover;
    }
</style>