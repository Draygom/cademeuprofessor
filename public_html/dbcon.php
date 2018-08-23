<?php
// abre a conexão com o servidor de banco de dados
$con = mysqli_connect("localhost", "cademeup_adm", "suzi@1986", "cademeup_valhalla");
// verifica a conexão
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
