<doctype html>
<html>
<head>
    <link rel="stylesheet" href="./css/people.css">
</head>
<body>
<?php
  include("db.php");

  $select = mysqli_query ($conexao,'SELECT user,id FROM usuario ORDER BY RAND() LIMIT 30');
  while($linha = mysqli_fetch_array($select)){
    $nome = $linha['user'];
    ?><div><a href="http://localhost/socializer/home.php?user=<?php echo $nome ?>"><?php echo  $nome;?></a></div><?php
  }
?>
</body>
</html>
