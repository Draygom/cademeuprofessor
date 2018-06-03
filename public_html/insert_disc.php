<?php
$query = mysqli_query($con, "SELECT * FROM curso")
or die("<br>Erro: ".mysqli_error($con));

$status = "";
if(isset($_POST['new']) && $_POST['new']==1) {
  $curso_id_curso = $_REQUEST['id_curso'];
  $nome_disc = $_REQUEST['nome_disc'];
  $ins_query="insert into disciplina (curso_id_curso, nome_disc) VALUES ('$curso_id_curso', '$nome_disc')";
  mysqli_query($con, $ins_query) or die("<br> Erro: ".mysqli_error($con));
  $status = "Novo cadastro inserido com sucesso.";
}
?>
