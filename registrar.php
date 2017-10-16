<?php
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$c = false;
			$nome = $_POST['nome'];
			$snome = $_POST['snome'];
			$email = $_POST['email'];
			$cemail = $_POST['cemail'];
			$unome = $_POST['unome'];
			$passw = hash("sha512",$_POST['senha']);
			$cpassw = hash("sha512",$_POST['csenha']);
			$sexo = $_POST['sexo'];
			$data = $_POST['data'];
			$usuario = "root";
			$senha = "";
			$servidor = "localhost";
			$db = "cadastros";
			header('Content-Type: text/html, charset-utf-8');
			$conexao = mysqli_connect($servidor,$usuario,$senha,$db);
			
			if(!$conexao){
				echo "Sem conexao";
			}
			if($passw == $cpassw && $email == $cemail){
				$select = mysqli_query ($conexao,'SELECT * FROM cadastro');
			
		
			
				while($linha = mysqli_fetch_array($select)){
					if($linha["username"] == $unome){
						$c = true;
						break;
					}
				}
				if($c==false){
					$novoId = mysqli_num_rows($select);
					$novoId++;
					if($novoId==1){
						mysqli_query($conexao, "INSERT INTO cadastro(id,nome,sobrenome,username,senha,email,sexo,nasc) VALUES
						($novoId,'root','root','root','root','root@root.com','M','2017-10-06')") or die ("Erro ao cadastrar");
						$novoId++;
					}
					mysqli_query($conexao, "INSERT INTO cadastro(id,nome,sobrenome,username,senha,email,sexo,nasc) VALUES
					($novoId,'$nome','$snome','$unome','$passw','$email','$sexo','$data')") or die ("Erro ao cadastrar");
					header ("Location: index.php");
				}
				else{
					echo "Usuario '". $unome ."' ja existe";
				}
			}
			else{
				echo "Confirmação de emil ou senha incorreta";
			}
			
		}
	?>