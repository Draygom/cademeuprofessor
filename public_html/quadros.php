<?php
require('dbcon.php'); //faz a conexão com o banco de dados
include("menu.php"); //incliu o cabeçalho da pagina
include("auth.php"); //incluir o arquivo de autenticação em todas a paginas privadas

//seleciona todos os cursos cadastrados
$query = mysqli_query($con, "SELECT * FROM curso ORDER BY nome_curso")
 or die("<br>Erro: ".mysqli_error($con));
?>
<title>Quadro de horários</title>

<div class="container-fluid">
  <h5 style="text-align:center;">Quadro de Horário</h5>
  <br>
  <div class="card mb-3 mx-auto rounded-1 col-sm" style="align:center;">
    <div class="row" role="group" aria-label="Grupo do painel">
      <?php
      // Colocando os dados retornados pela consulta em um vetor $resultado
      while ($resultado = mysqli_fetch_array($query)) {
          ?>
      <a href="quadro_aula.php?c=<?php echo $resultado["nome_curso"] ?>" class="btn btn-secondary rounded-0 col-6 col-sm-3"><?php echo $resultado["nome_curso"] ?></a>
    <?php } ?>
    </div>
  </div>

</div>
<?php
include("bottom.php");
?>
