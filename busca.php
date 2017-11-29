<?php
//falta fazer
    include("db.php");

		$query = $_POST['query'];

		$min_length = 1;

		if (strlen($query) >= $min_length) {
			$query = htmlspecialchars($query);

			$select = "SELECT * FROM usuario WHERE ('nome' LIKE '%".$query."%')";
		    $result = $conexao->prepare($select);
		    $result->execute();
		    $count = $result->rowCount();
		    if ($count > 1) {
		    	echo '<h2>Foram encontrados '.$count.' resultados na sua pesquisa:</h2>';
		    }elseif($count == 1){
		    	echo '<h2>Foi encontrado apenas '.$count.' resultado na sua pesquisa:</h2>';
		    }

			if ($count > 0) {
				foreach($result as $results) {
					echo '<div class="pub">';
							if ($results["foto"]=="") {
								echo '<a href="home.php?id='.$results["id"].'" style="width: 80px; display: block; margin: auto;"><img src="img/perfil.png" id="profile2"></a>';
							}
              else{
								echo '<a href="home.php?id='.$results["id"].'" style="width: 80px; display: block; margin: auto;"></a>';
							}
						echo '<p><a href="home.php?id='.$results["id"].'" name="p"><p name="p"><span>'.$results["nome"].'</span></p></a></p><br />
					</div>';
				}
			}
      else{
				echo "<br /><h2>Nenhum resultado encontrado.</h2>";
			}
		}
    else{
			echo '<br /><h2>Escreva pelo menos uma letra.</h2>';
		}
?>
