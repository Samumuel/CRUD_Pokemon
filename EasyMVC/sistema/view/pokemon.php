<html>
    <head>
        <title>Cadastro de pokemon</title>
        <link rel="stylesheet" href="../css/estilos.css">
    </head>
    <body>
        <form action="../control/pokemonControl.php?a=1" method="post">
        <h1>Cadastro de pokemon</h1>
            <label for='id'>id</label>
<input type='text' name='id'><br>
<label for='nome'>nome</label>
<input type='text' name='nome'><br>
<label for='descricao'>descricao</label>
<input type='text' name='descricao'><br>
<label for='link'>link</label>
<input type='text' name='link'><br>
<label for='tipo1'>tipo1</label>
<input type='text' name='tipo1'><br>
<label for='tipo2'>tipo2</label>
<input type='text' name='tipo2'><br>
<label for='evolucao'>evolucao</label>
<input type='text' name='evolucao'><br>
<label for='jogo2'>jogo2</label>
<input type='text' name='jogo2'><br>

             <button type="submit">Enviar</button>
        </form>
    </body>
</html>