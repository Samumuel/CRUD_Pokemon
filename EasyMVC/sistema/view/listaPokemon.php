
<html>
    <head>
        <title>Lista de pokemon</title>
        <link rel="stylesheet" href="../css/estilos.css">
    </head>
    <body>
      <?php
      require_once("../dao/pokemonDao.php");
   $dao=new pokemonDAO();
   $dados=$dao->listaGeral();
    echo "<table border=1>";
    foreach($dados as $dado){
        echo "<tr>";
       echo "<td>{$dado['id']}</td>";
echo "<td>{$dado['nome']}</td>";
echo "<td>{$dado['descricao']}</td>";
echo "<td>{$dado['link']}</td>";
echo "<td>{$dado['tipo1']}</td>";
echo "<td>{$dado['tipo2']}</td>";
echo "<td>{$dado['evolucao']}</td>";
echo "<td>{$dado['jogo2']}</td>";

       echo "<td>".
       "<a href='../control/pokemonControl.php?id={$dado['id']}&a=2'> Excluir</a>".
       "</td>";
       echo "<td>Alterar</td>";
       echo "</tr>";
    }
    echo "</table>";
     ?>  
    </body>
</html>