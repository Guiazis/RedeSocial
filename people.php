<doctype html>
<html>
<head>
</head>
<body>
<?php
  include("db.php");

  $select = mysqli_query ($conexao,'SELECT user,id FROM usuario ORDER BY RAND() LIMIT 30');
  while($linha = mysqli_fetch_array($select)){
    $nome = $linha['user'];
    echo  $nome;
  }
?>
</body>
</html>
