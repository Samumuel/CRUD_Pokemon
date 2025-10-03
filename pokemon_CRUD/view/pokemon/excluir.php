<?php

require_once(__DIR__ . "/../../controller/PokemonController.php");

//1- Receber o ID do pokemon (GET)
$id = 0;
if(isset($_GET['id']))
   $id = $_GET['id'];

//2- Chamar o controler para excluir
$pokemonCont = new PokemonController();
$pokemon = $pokemonCont->buscarPorId($id);
if($pokemon) {
   $erros = $pokemonCont->excluirPorId($pokemon->getId());

   //3- Verfica se deu erro
   if($erros) { 
      //3.1- SIM: exibe o erro na própria página
      $msgErros = implode("<br>", $erros);
      echo $msgErros;
   } else { 
      //3.2- NÃO (sucesso): redireciona para o LISTAR
      header("location: listar.php");
      exit;
   }

} else {
   echo "Pokemon não encontrado!<br>";
   echo "<a href='listar.php'>Voltar</a>";
}



