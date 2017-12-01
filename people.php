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
    $user = $linha['user'];
    ?><div class="perfil"><a class="nome" href="http://localhost/socializer/home.php?user=<?php echo $user ?>"><img class="user" src="./usuarios/<?php echo $user?>/perfil.jpg"><?php echo  $user;?></a></div><?php
  }
?>
</body>
</html>
