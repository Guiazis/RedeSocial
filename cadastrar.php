<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>SOCIALIZE - cadastre-se</title>
		<link rel="stylesheet" type="text/css" href="cadastrar.css"/>
	</head>
	<body>
		<nav>
			<h1>SOCIALIZE</h1>
		</nav>
		<main>
			<form method="post" action="registrar.php">
				<input name="nome" placeholder="Nome" type="text"/>
				<input name="snome" placeholder="Sobrenome" type="text" /><br/>
				<input name="unome" placeholder="Usuário" type="text" minlength="5"/>
				<input name="email" placeholder="Email" type="email"/><br/>
				<input name="cemail" placeholder="Confimação de email" type="email" required /><br/>
				<input name="senha" placeholder="Senha" type="password"/>
				<input name="csenha" placeholder="Confirmação de senha" type="password"/><br/>
				<input name="data" placeholder="Data de nascimento" type="date"/><br/>
				<span class="sex">
					<input type="radio" name="sex" value="1">
					<label>Feminino</label>
				</span>
				<span class="sex">
					<input type="radio" name="sex" value="2">
					<label>Masculino</label>
				</span><br/>
				<button class="voltar"><a href="index1.html">Voltar</button>
				<input class="sub" type="submit" value="Cadastrar"/>
			</form>
		</main>
	</body>
</html>