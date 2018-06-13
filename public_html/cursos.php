<?php
require('dbcon.php'); //faz a conexão com o banco de dados
include("menu.php"); //incliu o cabeçalho da pagina
include("auth.php"); //incluir o arquivo de autenticação em todas a paginas privadas
//tratando os erros
error_reporting(E_ALL ^ E_NOTICE);
// executando a consulta no banco de dados:
$query = mysqli_query($con, "SELECT * FROM curso ")
or die("<br>Erro: ".mysqli_error($con));
?>
<title>Cursos</title>

<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <h5 class="text-white">Cursos</h5>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link" href="regist_curso.php">Cadastrar/Editar</a>
          </div>
        </div>
      </nav>
      <?php
      // Colocando os dados retornados pela consulta em um vetor $resultado
      while ($resultado = mysqli_fetch_array($query)) {
        ?>
      <div class="list-group">
        <a href="profile_curso.php?c=<?php echo $resultado["nome_curso"]?>" class="list-group-item list-group-item-action rounded-0"><?php echo $resultado["nome_curso"]?></a>
      </div>
      <?php } ?>
    </div>
  </div>
</div>

<?php
include("bottom.php");
?>
