<?php
require("db.php"); //conecta com o banco de dados
include("menu.php"); //incliu o cabeçalho da pagina
//tratando os erros
error_reporting(E_ALL ^ E_NOTICE);
// coletando o nome do curso
$busca = mysqli_real_escape_string($con, trim($_GET["b"]));
//Verifica se a condição não está vazia
if (empty($busca)) {
  echo "<div class='alert alert-danger'>Não foi possivel realizar a busca. Digite o nome de um professor ou disciplina.</div>";
}else{
// executando a consulta no banco de dados:
$professor = mysqli_query($con, "SELECT * FROM qr_tabela WHERE professor LIKE '%$busca%' GROUP BY professor")
or die("<br>Erro: ".mysqli_error($con));
$disciplina = mysqli_query($con, "SELECT * FROM qr_tabela WHERE disciplina LIKE '%$busca%' GROUP BY disciplina")
or die("<br>Erro: ".mysqli_error($con));

    //cabeçalho
    ?><h5 style="text-align:center">Busca</h5>
    <?php
    //exibe os resultados
    while ($resultado = mysqli_fetch_array($professor)) {
        ?>
  <div class="btn-group-vertical col">
    <a href="exibe_sala.php?p=<?php echo $resultado["professor"]?>" class="btn btn-outline-light"  style="background-color:orange"><?php echo $resultado["professor"]?></a>
  </div>
  <?php
    } // fim while
    while ($resultado = mysqli_fetch_array($disciplina)) {
        ?>
  <div class="btn-group-vertical col">
    <a href="exibe_sala.php?d=<?php echo $resultado["disciplina"]?>" class="btn btn-outline-light"  style="background-color:orange"><?php echo $resultado["disciplina"]?></a>
  </div>
<?php
    } // fim while
    //armazena os resultados em uma variavel
    $row = mysqli_fetch_array($professor);
    $row2 = mysqli_fetch_array($disciplina);
    $num_results = mysqli_num_rows($professor);
    $num_results2 = mysqli_num_rows($disciplina);
    //verifica se as variaveis estão vazias e informa que não foi encontrado um resultado
    if ($num_results == 0 && $num_results2 == 0) {
            echo "<div class='alert alert-danger'>Não há resultado para a pesquisa: <b>$busca</b></div>";
        }
}
include("bottom.php");
?>
