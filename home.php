<?php
	$usuario = "root";
	//Computador do Samuel
	//$senha = "";
	//Computador do Guilherme
	$senha = "guilherme123";
	$servidor = "localhost";
	$bddnome = "cadastros";
	$conexao = mysqli_connect($servidor,$usuario,$senha,$bddnome);
	if(!$conexao){
		echo "Sem conexao";
	}

	session_start();
	if(isset($_SESSION['usuario'])){
		$id = $_SESSION['id'];
		$unome = $_SESSION['usuario'];
		$nome = mysqli_query ($conexao,"SELECT * FROM usuarios WHERE email = '$id'");
		$nome = mysqli_fetch_array($nome);
		$name= $nome["nome"];
		$sname = $nome["sobrenome"];

	}

	if($_SERVER['REQUEST_METHOD']=="POST"){
		$erro = false;
		if(!file_exists('.usuarios/'.$unome)){
			mkdir('.usuarios/'.$unome);
		}
		if(isset($_FILES['perfil'])){
			$nome_perfil= $_FILES['perfil']['name'];
			$nome_perfil="perfil.jpg";
			copy($_FILES['perfil']['tmp_name'],'./usuarios/'.$unome.'/'.$nome_perfil);
		}
		if(isset($_FILES['painel'])){
			$nome_painel= $_FILES['painel']['name'];
			$nome_painel="painel.jpg";
			copy($_FILES['painel']['tmp_name'],'./usuarios/'.$unome.'/'.$nome_painel);
		}
	}

	?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="./css/home.css"/>
		<script src="./js/jquery.min.js"></script>
		<script>
			$(function(){
				$(".perfil").attr("src","./usuarios/<?php echo $unome?>/perfil.jpg");
				$(".painel").attr("src","./usuarios/<?php echo $unome?>/painel.jpg");
				$(".aparecer").click(function(){
					$(".fotos").css("display","block");
				});
				$(".enviar").click(function(){
					$(".fotos").css("display","none");
					$("body :not(.exc)").css("filter","none");
				});
			})
		</script>
	</head>
	<body>
		<?php
		if(isset($_SESSION['usuario'])){
		?>
		<header>
			<!--<form method="POST" action="busca.php">
			  <input type="text" name="busca" size="20">
			  <input type="submit" value="Buscar" name="ok">
			</form>-->

			<a href="logout.php">Logout</a>

		</header>
		<img src="./usuarios/<?php echo $unome; ?>/painel.jpg" class="capa"/>
		<div class="info">
			<img src="./usuarios/<?php echo $unome; ?>/perfil.jpg" class="perfil"/>
			<h1 class="nome"><?php echo $name." ".$sname?></h1>
			<h4 class="nome"><?php echo $unome?></h4>

			<button class="aparecer"> Trocar imagens </button>
			<form action="home.php" method="post" enctype="multipart/form-data" class="fotos exc">
				Escolha a foto de perfil<input name="perfil" type="file" value="Escolha a foto de perfil" class="exc"/><br>
				Escolha o painel<input name="painel" type="file" value="Escolha a foto de painel" class="exc"/><br>
				<input type="submit" class="enviar exc"/>
			</form>
		<?php
			}
		else{
		?>
			<p> Você ainda não está logado </p>
			<a href="login.php"> Fazer login </a>

		<?php

		}
		?>

	</body>
</html>
