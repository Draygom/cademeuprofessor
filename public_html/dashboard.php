<?php
require('dbcon.php'); //faz a conexão com o banco de dados
include("menu.php"); //incliu o cabeçalho da pagina
include("auth.php"); //incluir o arquivo de autenticação em todas a paginas privadas
?>
<title>Dashboard</title>

<div class="container-fluid">
  <h5 style="text-align:center;">Bem vindo ao seu painel de controle!</h5>
  <br>
  <div class="card mb-3 mx-auto rounded-1 col-sm" style="align:center;">
    <div class="row" role="group" aria-label="Grupo do painel">
      <a href="professores.php" class="btn btn-success rounded-0 col-6 col-sm-3">PROFESSORES</a>
      <a href="quadros.php" class="btn btn-secondary rounded-0 col-6 col-sm-3">QUADRO</a>
      <a href="cursos.php" class="btn btn-primary rounded-0 col-6 col-sm-3">CURSOS</a>
      <a href="regist_disc_cursos.php" class="btn btn-info rounded-0 col-6 col-sm-3">DISCIPLINAS</a>
      <a href="regist_sala.php" class="btn btn-dark rounded-0 col-6 col-sm-3">SALAS</a>
    </div>
  </div>

</div>
<?php
include("bottom.php");
?>
