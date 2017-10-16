<?php
		if($_SERVER['REQUEST_METHOD']=="POST"){
			$c = false;
			$usenome=$_POST['usernome'];
			$password=$_POST['senha'];
			$usuario = "root";
			$senha = "";
			$servidor = "localhost";
			$db = "cadastros";
			header('Content-Type: text/html, charset-utf-8');
			$conexao = mysqli_connect($servidor,$usuario,$senha,$db);
			
			if(!$conexao){
				echo "Sem conexao";
			}
			$select = mysqli_query ($conexao,'SELECT * FROM cadastro');
				while($linha = mysqli_fetch_array($select)){
				if($linha["username"] == $usenome){
					$e=1;
				if($linha["senha"] == hash("sha512",$password)){
					$c = true;
					$id = $linha["id"];
					$username = $linha["username"];
					$nome=$linha["nome"];
					$data=$lina["nasc"];
					break;
				}
				}
				}
				if($e!=1){
					header("Location:erro2.php");
				}
				else{
				if($c == true){
					if(isset($_SESSION['usuario'])){
						session_destroy();
						session_start();
						$_SESSION['id'] = $id;
						$_SESSION['usuario'] = $username;
						$_SESSION['nome'] = $nome;
						$_SESSION['data'] = $data;
						print_r($_SESSION['usuario[1]']);
					}
					else{
						session_start();
						$_SESSION['nome'] = $nome;
						$_SESSION['data'] = $data;
						$_SESSION['id'] = $id;
						$_SESSION['usuario'] = $username;
						header ("Location: home.php");
					}
				}
				else{
					header ("Location: erro.php");
				}	
		}
	}
	?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>SOCIALIZE - entre ou cadastre-se</title>
		<link rel="stylesheet" type="text/css" href="index.css"/>
		<link rel="icon" href="./img/icon.ico" type="image/x-icon" />
	</head>
	<body>
	<header>
		<nav class="cab">
			<h1>SOCIALIZE</h1>
		<?php
			session_start();
			if(!isset($_SESSION['usuario'])){
		?>
		
			<form>
				<input class="w" name='usenome' placeholder="Usuário" type="text" required><br/>
				<input class="w" name= 'senha' placeholder="Senha" type="password" required><br/>
				<button><a href="home.html">Entrar</a></button>
				<button><a href="cadastrar.html">Cadastrar</a></button>
			</form>
		
		<?php
		}
		else{
			$usuario = $_SESSION['usuario'];
			echo "<h2 class='error' >Você já está cadastrado como: $usuario</h2>";
		?>
			<a  class="perfil" href="home.php">Ir para o perfil</a>
		<?php
		}
		?>
		</nav>
	</header>
	<main>
		<h2 id="text">Não se esconda do mundo, comece a socializar. Com uma única palavra, você faz tudo melhorar.</h2>
		<img class=	"wel" src="./img/welcome.gif">
		<img class="img" src="./img/rede2.png">
	</main>
	<footer>
		
	</footer>
	</body>
</html>