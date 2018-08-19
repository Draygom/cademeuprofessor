<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1) {
  $nome_curso = $_REQUEST['nome_curso'];
  $query = mysqli_query($con, "SELECT nome_curso FROM curso WHERE nome_curso = '$nome_curso'")
  or die("<br>Erro: ".mysqli_error($con));
  $resultado = mysqli_fetch_array($query);
  if ($nome_curso != $resultado['nome_curso']) {
    $resultado = mysqli_fetch_array($query);
    $ins_query="insert into curso (nome_curso) VALUES ('$nome_curso')";
    mysqli_query($con, $ins_query) or die("<br> Erro: ".mysqli_error($con));
    $status = "Novo cadastro inserido com sucesso.";
  } else {
    $status = "Este curso já existe!";
  }
}
?>
