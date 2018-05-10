<?php
session_start();
if(session_destroy()) // Destroe todas as sessoes
{
header("Location: login.php"); // redireciona para a pagina inicial de login
}
?>
