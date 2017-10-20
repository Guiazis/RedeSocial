<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$c = false;
			$nome = $_POST['nome'];   
			$snome = $_POST['snome'];
			$email = $_POST['email'];
			$cemail = $_POST['cemail'];
			$username = $_POST['usernome'];
			$pass = $_POST['senha'];
			$cpass = $_POST['csenha'];
			$sexo = $_POST['sexo'];
			$data = $_POST['data'];
			$servidor = "localhost";
			$usuario = "root";
			$senha = "";
			$bddnome = "cadastros";
			header('Content-Type: text/html, charset-utf-8');
			$conexao = mysqli_connect($servidor,$usuario,$senha,$bddnome);
			
			if(!$conexao){
				echo "Sem conexao";
			}
			if($pass == $cpass && $email == $cemail){
				$select = mysqli_query ($conexao,'SELECT * FROM cadastro');
			
		
			
				while($linha = mysqli_fetch_array($select)){
					if($linha["usernome"] == $username){
						$c = true;
						break;
					}
				}
				if($c==false){
					$select = mysqli_query ($conexao,'SELECT max(id) FROM cadastro');
					$linha = mysqli_fetch_array($select);
					$novoId = $linha["max(id)"]+1;
					$pass = hash("sha512",$pass);
					var_dump(mysqli_query($conexao, "INSERT INTO cadastro(id,nome,sobrenome,usernome,senha,email,sexo) VALUES ($novoId,'$nome','$snome','$username','$pass','$email','$sexo')"));
					header ("Location: login.php");
				}
				else{
					echo "Usuário '". $username ."' já existe";
				}
			}
			else{
				echo "Confirmação de email ou senha incorreta";
			}
			
		}
	?>