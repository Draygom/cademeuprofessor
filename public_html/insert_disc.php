<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1) {
  $curso_id_curso = $_REQUEST['id_curso'];
  $nome_disc = $_REQUEST['nome_disc'];
  $query = mysqli_query($con, "SELECT nome_disc, curso_id_curso FROM disciplina WHERE nome_disc = '$nome_disc' AND curso_id_curso = '$curso_id_curso'")
  or die("<br>Erro: ".mysqli_error($con));
  $resultado = mysqli_fetch_array($query);
  if ($curso_id_curso != $resultado['curso_id_curso'] && $nome_disc != $resultado['nome_disc']) {
    $ins_query="INSERT into disciplina (curso_id_curso, nome_disc) VALUES ('$curso_id_curso', '$nome_disc')";
    mysqli_query($con, $ins_query) or die("<br> Erro: ".mysqli_error($con));
    $status = "Novo cadastro inserido com sucesso.";
  } else {
    $status = "Esta disciplina já existe!";
  }
}
?>
