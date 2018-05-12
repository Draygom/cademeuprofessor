<?php
session_start();
if(session_destroy()) // Destroe todas as sessoes
{
  // Deleta o IS e o usuario dos cookies colocando uma data de expiração à uma hora atras
  setcookie('user_id', '', time() - 3600);
  setcookie('username', '', time() - 3600);
  header("Location: index.php"); // redireciona para a pagina inicial
}
?>
