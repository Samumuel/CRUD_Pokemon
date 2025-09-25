
<html>
    <head>
        <title>Lista de geracao</title>
        <link rel="stylesheet" href="../css/estilos.css">
    </head>
    <body>
      <?php
      require_once("../dao/geracaoDao.php");
   $dao=new geracaoDAO();
   $dados=$dao->listaGeral();
    echo "<table border=1>";
    foreach($dados as $dado){
        echo "<tr>";
       echo "<td>{$dado['id']}</td>";
echo "<td>{$dado['numero']}</td>";
echo "<td>{$dado['ano']}</td>";
echo "<td>{$dado['jogo']}</td>";
echo "<td>{$dado['anime']}</td>";
echo "<td>{$dado['cidade']}</td>";
echo "<td>{$dado['jogo2']}</td>";

       echo "<td>".
       "<a href='../control/geracaoControl.php?id={$dado['id']}&a=2'> Excluir</a>".
       "</td>";
       echo "<td>Alterar</td>";
       echo "</tr>";
    }
    echo "</table>";
     ?>  
    </body>
</html>