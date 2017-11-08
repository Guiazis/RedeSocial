<!doctype html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="./css/login.css"/>
		<link href="https://fonts.googleapis.com/css?family=Quicksand|Raleway" rel="stylesheet">
		<script src="./js/jquery.min.js"></script>
	</head>
	<body>
	<?php
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$c = false;
			$username=$_POST['usernome'];
			$passw=$_POST['senha'];

			$usuario = "root";
			$senha = "";
			$servidor = "localhost";
			$bddnome = "cadastros";
			header('Content-Type: text/html, charset-utf-8');
			$conexao = mysqli_connect($servidor,$usuario,$senha,$bddnome);

			if(!$conexao){
				echo "Sem conexao";
			}
			$select = mysqli_query ($conexao,'SELECT * FROM cadastro');
			$passw = hash("sha512",$passw);
				while($linha = mysqli_fetch_array($select)){
					if($linha["usernome"] == $username && $linha["senha"] == $passw){
						$c = true;
						$id = $linha["email"];
						$username = $linha["usernome"];
						break;
					}
				}
				if($c == true){
					if(isset($_SESSION['usuario'])){
						session_destroy();
						session_start();
						$_SESSION['id'] = $id;
						$_SESSION['usuario'] = $username;
						print_r($_SESSION['usuario[1]']);
						//header ("Location: home.php");
					}
					else{
						session_start();
						$_SESSION['id'] = $id;
						$_SESSION['usuario'] = $username;
						header ("Location: home.php");
					}
				}
				else{
					header ("Location: erro.php");
				}

		}
	?>
		<h1> Entrar </h1>

		<?php
			session_start();
			if(!isset($_SESSION['usuario'])){
		?>
		<div class="login">

				<form method="post" action="login.php">
					<input name='usernome' placeholder="Username" type="text"/><br/>
					<input name= 'senha' placeholder="Senha" type="password"/><br/>
					<input class="sub" type="submit" id="entrar" value="Entrar"/><br/>
				</form>
				<div class="botao">
					<a class="entrar-cadastrar"  href="cadastrar.php"> Cadastre-se </a>
				</div>

		</div>
		<?php
		}
		else{
			$usuario = $_SESSION['usuario'];
			echo "Você já está cadastrado como $usuario <br/>";
		?>
			<a class="back_perfil" href="home.php">Ir para o perfil</a>
		<?php
		}
		?>
	</body>
</html>
