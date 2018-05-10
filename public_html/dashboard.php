<?php
require('db.php'); //incliu o cabeçalho da pagina
include("auth.php"); //incluir o arquivo de autenticação em todas a paginas privadas
include("menu.php");
?>
<title>Dashboard</title>

<div class="container-fluid">
<p>Bem vindo ao seu painel de controle.</p>

<p><a href="user.php">Home</a><p>
<p><a href="insert.php">Inserir novo cadastro</a></p>
<p><a href="view.php">Visualisar cadastros</a><p>
<p><a href="insert_sala.php">Inserir novo cadastro de localização das salas</a></p>
<p><a href="view_sala.php">Visualisar cadastro de localização das salas</a><p>
<p><a href="logout.php">Sair</a></p>

</div>
<?php
include("bottom.php");
?>
