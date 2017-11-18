<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$flag = array();
			//$flag = false;
			$nome = trim($_POST['nome']);
			$snome = trim($_POST['snome']);
			$email = trim($_POST['email']);
			$cemail = trim($_POST['cemail']);
			$username = trim($_POST['usernome']);
			$pass = trim($_POST['senha']);
			$cpass = trim($_POST['csenha']);
			$data = trim($_POST['data']);

			$servidor = "localhost";
			$usuario = "root";
			$senha = "guilherme123";
			$bddnome = "cadastros";

			// Conexão MySQL e confirmação
			$conexao = mysqli_connect($servidor,$usuario,$senha,$bddnome);
			if(!$conexao){
				echo "Sem conexao";
			}

			// Verficação de nome
			if ($nome == ''){
				$flag[0] = "true";
			}
			if ($snome == ""){
				$flag[1] = 'true';
			}
			if (filter_var($email,FILTER_VALIDATE_EMAIL) == false){
				$flag[2] = 'true';
			}
			if (filter_var($cemail,FILTER_VALIDATE_EMAIL) == false){
				$flag[3] = 'true';
			}
			if ($pass == '' and strlen($pass) >= 5 and strlen($pass) <= 20){
				$flag[5] = 'true';
			}
			if ($cpass == '' and strlen($pass) >= 5 and strlen($pass) <= 20) {
				$flag[6] = 'true';
			}
			if (isset($_POST['sexo'])){
				$sexo = $_POST['sexo'];
				} else {
				$flag[7] = "true";
			}


			// Verificação de senha e email, verficação de banco
			if($pass == $cpass && $email == $cemail){
				$select = mysqli_query ($conexao,'SELECT * FROM usuarios');
				while($linha = mysqli_fetch_array($select)){
					if($linha["usernome"] == $username){
						$flag[4] = "true";
						break;
					}
				}
				// Sem erro
				if($c == false){
					$linha = mysqli_fetch_array($select);
					$pass = hash("sha512",$pass);
					$sql ="INSERT INTO usuarios(email,nome,sobrenome,usernome,senha,sexo) VALUES ('$email','$nome','$snome','$username','$pass','$sexo')";
					if(mysqli_query($conexao, $sql)){
						header ("Location: home.php");
					}
					// Direciona para acessar a página
					else{
						echo "Erro!";?><br><?php
						echo "Conta já está cadastrada!";
						header ("Location: login.php");
					}
				}
				else{
					echo "Usuario '". $username ."' ja existe";
				}
			}
			else{
				echo "Confirmacao de email ou senha incorreta";
			}

		}
	?>
