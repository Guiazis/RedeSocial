<?php
  $usuario = "root";
  $senha = "guilherme123";
  $servidor = "localhost";
  $bddnome = "socializer";
  header('Content-Type: text/html, charset-utf-8');
  $conexao = mysqli_connect($servidor,$usuario,$senha,$bddnome);

  if(!$conexao){
		echo "Sem conexao";
	}
?>
