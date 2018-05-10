<?php
// abre a conexão com o servidor de banco de dados
$con = mysqli_connect("localhost", "id5005369_admin", "suzi1986", "id5005369_qr_code");
// verifica a conexão
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
