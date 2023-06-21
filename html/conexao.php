<!-- conexao externa com o banco de dados -->
<?php
// conexao com o servitor mj
$local="localhost";
$user="u413309708_ozzy";
$senha="Kaue05052005";
$dtbase="u413309708_skate";

// conexao com o local
// $local = "localhost";
// $user = "root";
// $senha = "";
// $dtbase = "skate";

$mysql= new mysqli($local,$user,$senha,$dtbase);

if ($mysql->connect_error) {
  die("Erro ao conectar ao banco de dados: " . $mysql->connect_error);
}

?>
