<?php
//Verifica se o apelido e o id do usuario sao os mesmos, caso contrário volta para a oagina de login
if (!isset($_SESSION["apelido"]) && !isset($_SESSION["id_usuarios"])) {
  header("Location: login.php");
  exit();
}
?>
