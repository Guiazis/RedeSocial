<?php
$usuario = "root";
$senha = "guilherme123";
$servidor = "localhost";
$bd = "cadastros";

$con = mysql_connect($servidor,$usuario,$senha); // função de conexão

mysql_select_db($bd,$con) or print mysql_error(); // seleção do banco de dados

$sql = mysql_query("SELECT * FROM usuarios WHERE nome LIKE '%$busca%' OR sobrenome LIKE '%$busca%'");
// query para selecionar todos os campos da tabela usuários se $busca contiver na coluna nome ou na coluna email
// % antes e depois de $busca serve para indicar que $busca por ser apenas parte da palavra ou frase
// $busca é a variável que foi enviada pelo nosso formulário da página anterior

$count = mysql_num_rows($sql);
$uid = $linha["email"];

// conta quantos registros encontrados com a nossa especificação
if ($count == 0) {
    echo "Nenhum resultado!";
} else {
    // senão
    if ($count == 1) {
        echo "1 resultado encontrado!";
    }
    // se houver um resultado diz que existe um resultado
    if ($count > 1) {
        echo "$count resultados encontrados!";
    }
    // se houver mais de um resultado diz quantos resultados existem
    while ($dados = mysql_fetch_array($sql)) {
        // enquanto houverem resultados...
        echo "$dados[nome]." ".$dados[sobrenome]<br>";
        ("location: home.php?redirect = $uid")
        // exibir a coluna nome e a coluna email
    }
}
?>