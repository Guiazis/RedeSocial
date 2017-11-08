<!doctype html>  
<html>
	<head>
		<meta charset="utf-8"/>	
		<link rel="stylesheet" href="./css/cadastrar.css"/>
		<link href="https://fonts.googleapis.com/css?family=Quicksand|Raleway" rel="stylesheet">
		<script src="./js/jquery.min.js"></script>
		
	</head>
	<body>
		<h1> Cadastrar </h1>
		<div class="cadastro">
			<form method="post" action="registrar.php">
				<input name="nome" placeholder="Nome" type="text" required><br/>
				<input name="snome" placeholder="Sobrenome" type="text" required/><br/>
				<input name="email" placeholder="Email" type="email" required/><br/>
				<input name="cemail" placeholder="Confimação de email" type="email" required/><br/>
				<input name="usernome" placeholder="Username" type="text" maxlength="10" required/><br/>
				<input name="senha" placeholder="Senha" type="password" maxlength="20" required/><br/>
				<input name="csenha" placeholder="Confirmação de senha" type="password" maxlength="20" required/><br/>
				Masculino<input type="radio" name="sexo" value="M" required><br/>
				Feminino<input type="radio" name="sexo" value="F" required> <br/>
				Outro<br/><input type="radio" name="sexo" value="O" required> <br/>
				<input name="data" placeholder="Data de nascimento" type="date"/><br/>
				<input class="sub" type="submit" value="Cadastrar"/><br/>
				<a class="entrar-cadastrar" href="login.php"> Entrar </a>
			</form>
		</div>
	</body>
</html>