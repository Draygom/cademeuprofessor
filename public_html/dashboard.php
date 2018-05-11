<?php
require('db.php'); //incliu o cabeçalho da pagina
include("menu.php");
include("auth.php"); //incluir o arquivo de autenticação em todas a paginas privadas
?>
<title>Dashboard</title>

<div class="container-fluid">
<p>Bem vindo ao seu painel de controle.</p>

<p><a href="view.php">Cadastro de professores</a><p>
<p><a href="view_sala.php">Cadastro de sala</a><p>

</div>
<?php
include("bottom.php");
?>
