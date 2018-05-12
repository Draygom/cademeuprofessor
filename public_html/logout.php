<?php
session_start();
if(session_destroy()) // Destroe todas as sessoes
{
header("Location: index.php"); // redireciona para a pagina inicial
}
?>
