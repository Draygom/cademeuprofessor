<?php
require("db.php"); //conecta com o banco de dados
include("menu.php"); //incliu o cabeçalho da pagina
?>
<title>Home</title>
<a href="index.php"> <img src="imagens/logo.png" class="img-fluid mx-auto d-block" alt="Logo"></a>
<?php
//tratando os erros
error_reporting(E_ALL ^ E_NOTICE);

$query = mysqli_query($con, "SELECT * FROM qr_tabela GROUP BY curso")
or die("<br>Erro: ".mysqli_error($con));
?>
   <div class="container-fluid">
    <h2 style="text-align:center;"><b>Escolha o seu curso</b></h2>
    <center>
    <div class="btn-group-vertical col">
    <?php
    // Colocando os dados retornados pela consulta em um vetor $resultado
    while ($resultado = mysqli_fetch_array($query)) {
      ?>
      <a href="curso_escolhido.php?c=<?php echo $resultado["curso"] ?>" class="btn btn-outline-light"  style="background-color:orange" ><?php echo $resultado["curso"] ?></a>
    <?php
  } // fim while
  ?>
</div>
    <p>
    </div>
  </center>
<?php
include("bottom.php");
?>
