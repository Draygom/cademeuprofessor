<?php
// abre a conexão com o servidor de banco de dados
$con = mysqli_connect("localhost", "b15_22644913", "cademeuadmin", "b15_22644913_valhalla");
// verifica a conexão
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  if (!mysqli_set_charset($con, "utf8")) {
      printf("Error loading character set utf8: %s\n", mysqli_error($con));
      exit();
  }
?>
